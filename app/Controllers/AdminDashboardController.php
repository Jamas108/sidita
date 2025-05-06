<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminDashboardController extends BaseController
{
    public function index()
    {
        $eventModel = new \App\Models\EventModel();
        $userModel = new \App\Models\UserModel();
        $pengumumanModel = new \App\Models\AnnouncementModel();
        $spesifikasiModel = new \App\Models\JenisSpesifikasiModel();
        $kualifikasiModel = new \App\Models\JenisKualifikasiModel();
        $dptModel = new \App\Models\DptModel();

        $jumlahEvent = $eventModel->countAll(); // Hitung semua event
        $jumlahEventBerjalan = $eventModel->where('status', 'berjalan')->countAllResults(); // Event dengan status berjalan
        $jumlahAkun = $userModel->countAll();
        $jumlahPengumuman = $pengumumanModel->countAll();
        $jumlahSpesifikasi = $spesifikasiModel->countAll();
        $jumlahKualifikasi = $spesifikasiModel->countAll();
        $jumlahPenyedia = $dptModel->where('status_dpt_id', 1)->countAllResults();
        $jumlahPenyediaPending = $dptModel->where('status_dpt_id', 3)->countAllResults();

        return view('admin/dashboard', compact(
            'jumlahEvent',
            'jumlahEventBerjalan', // Tambahkan ke view
            'jumlahAkun',
            'jumlahPengumuman',
            'jumlahSpesifikasi',
            'jumlahKualifikasi',
            'jumlahPenyedia',
            'jumlahPenyediaPending',
        ));
    }

    public function profilSuperadmin()
    {
        // Get the session object
        $session = session();

        // Get the current user's ID from the session
        $user_id = $session->get('user_id');  // Assuming the 'user_id' is saved during login

        // If the user is not logged in, redirect them to login page or show an error
        if (!$user_id) {
            return redirect()->to('/login'); // or show an error message
        }

        // Load the UserModel
        $userModel = new UserModel();

        // Fetch the user data from the database
        $user = $userModel->getUserById($user_id);

        // If the user does not exist, redirect or show an error
        if (!$user) {
            return redirect()->to('/login');
        }

        // Pass the user data to the view
        return view('admin/profil', [
            'user' => $user
        ]);
    }
    public function editPasswordSuperadmin()
    {
        // Get the session object
        $session = session();
        $user_id = $session->get('user_id');  // Get user ID from session

        // Validate input
        $currentPassword = $this->request->getPost('currentPassword');
        $newPassword = $this->request->getPost('newPassword');
        $confirmPassword = $this->request->getPost('confirmPassword');

        // Check if the new password matches the confirmation password
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Password baru tidak cocok dengan konfirmasi password.');
        }

        // Get the user data
        $userModel = new UserModel();
        $user = $userModel->find($user_id);

        // Check if the current password is correct
        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Password lama tidak valid.');
        }

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update the password in the database
        $userModel->update($user_id, ['password' => $hashedPassword]);

        // Redirect with success message
        return redirect()->to('/profilsuperadmin')->with('success', 'Password berhasil diperbarui.');
    }
    public function logout()
    {
        // Destroy the session (logout user)
        session()->destroy();

        // Redirect to the login page or homepage
        return redirect()->to(base_url('login'));
    }
}
