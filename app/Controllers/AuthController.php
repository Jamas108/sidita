<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        // Menampilkan form login
        return view('auth/login');
    }

    public function loginProcess()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Load UserModel
        $userModel = new UserModel();

        // Cek apakah email ada di database
        $user = $userModel->where('email', $email)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            $namaLengkap =  $user['nama_awal_penyedia']  . ' ' .  $user['nama_penyedia']  . ' ' .  $user['nama_akhir_penyedia'];
            // Set session
            session()->set('logged_in', true);
            session()->set('user_id', $user['id']);
            session()->set('email', $user['email']);
            session()->set('role_id', $user['role_id']); // Simpan role_id di session
            session()->set('name', $namaLengkap);

            // Redirect ke halaman berdasarkan role_id
            switch ($user['role_id']) {
                case '1':
                    return redirect()->to('/managedpt');
                case '2':
                    return redirect()->to('/operatordashboard');
                case '3':
                    return redirect()->to('/ppkdashboard');
                case '4':
                    return redirect()->to('/penyediadashboard');
                default:
                    return redirect()->to('/');
            }
        } else {
            // Set flashdata untuk menampilkan pesan kesalahan
            session()->setFlashdata('error', 'Email atau password salah.');
            return redirect()->to('/login'); // Redirect kembali ke halaman login
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }

    public function register()
    {
        // Menampilkan form registrasi
        return view('auth/daftar', ['title' => 'Register']);
    }

    public function registerProcess()
    {
        // Mengambil data dari form
        $nama_awal_penyedia = $this->request->getPost('nama_awal_penyedia');
        $nama_penyedia = $this->request->getPost('nama_penyedia');
        $nama_akhir_penyedia = $this->request->getPost('nama_akhir_penyedia');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $role_id = $this->request->getPost('role_id');

        // Load UserModel
        $userModel = new UserModel();

        // Cek apakah email sudah ada
        if ($userModel->where('email', $email)->first()) {
            session()->setFlashdata('error', 'Email sudah terdaftar.');
            return redirect()->to('/register');
        }

        // Simpan data ke database
        $userModel->save([
            'nama_awal_penyedia' => $nama_awal_penyedia,
            'nama_penyedia' => $nama_penyedia,
            'nama_akhir_penyedia' => $nama_akhir_penyedia,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Registrasi berhasil. Silakan login.');
        return redirect()->to('/login');
    }
}
