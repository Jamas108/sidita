<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleUsersModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ManageUsersController extends ResourceController
{
    public function index()
    {
        $userModel = new UserModel();
        $dataUser = $userModel->getAllUser();
        return view('admin/manageusers/index', ['dataUser' => $dataUser]);
    }
    public function showAkunUsers($id)
    {
        $userModel = new UserModel();

        $user = $userModel->getUserById($id);
        return view('admin/manageusers/show', [
            'user' => $user
        ]);
    }
    public function ShowPasswordUsers($id)
    {
        $userModel = new UserModel();

        $user = $userModel->getUserById($id);
        return view('admin/manageusers/password', [
            'user' => $user
        ]);
    }

    public function updatePasswordUsers($id)
{
    $userModel = new UserModel();

    // Validasi input
    $password = $this->request->getPost('password');
    $confirmPassword = $this->request->getPost('confirm_password');

    if ($password !== $confirmPassword) {
        return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak cocok.');
    }

    // Update password pengguna
    $data = [
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    $userModel->update($id, $data);

    return redirect()->to('/manageusers')->with('success', 'Password berhasil direset.');
}


    public function create()
    {
        $roleModel = new RoleUsersModel();
        $roleUser = $roleModel->getAllRole();
        return view('admin/manageusers/create', ['roleUser' => $roleUser]);
    }

    public function store()
    {
        $validationRules = [
            'nama_penyedia' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'role_id' => 'required|integer',
            'password' => 'required|min_length[6]',
            'konfirmasi_password' => 'required|matches[password]',
        ];

        $validationMessages = [
            'nama_penyedia' => ['required' => 'Nama wajib diisi.'],
            'nip' => ['required' => 'NIP wajib diisi.'],
            'jabatan' => ['required' => 'Jabatan wajib diisi.'],
            'email' => [
                'required' => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
                'is_unique' => 'Email sudah terdaftar.',
            ],
            'role_id' => [
                'required' => 'Role wajib dipilih.',
                'integer' => 'Role harus berupa angka.',
            ],
            'password' => [
                'required' => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.',
            ],
            'konfirmasi_password' => [
                'required' => 'Konfirmasi password wajib diisi.',
                'matches' => 'password tidak cocok.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database
        $userModel = new UserModel();
        $data = [
            'nama_penyedia' => $this->request->getPost('nama_penyedia'),
            'nip' => $this->request->getPost('nip'),
            'jabatan' => $this->request->getPost('jabatan'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id' => $this->request->getPost('role_id'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $userModel->save($data);
        return redirect()->to('manageusers')->with('success', 'Akun berhasil ditambahkan.');
    }


    public function editAkun($id)
    {
        $userModel = new UserModel();
        $roleModel = new RoleUsersModel();

        $user = $userModel->find($id);
        $roleUser = $roleModel->getAllRole();

        return view('admin/manageusers/edit', [
            'user' => $user,
            'roleUser' => $roleUser
        ]);
    }

    public function updateAkun($id)
    {
        $userModel = new UserModel();

        // Check if user exists
        $user = $userModel->find($id);
        if (!$user) {
            session()->setFlashdata('error', 'User not found.');
            return redirect()->to('/manageusers');
        }

        // Get the updated data from the form
        $data = [
            'nama_penyedia' => $this->request->getPost('nama_penyedia'),
            'nip' => $this->request->getPost('nip'),
            'jabatan' => $this->request->getPost('jabatan'),
            'role_id' => $this->request->getPost('role_id'),
        ];

        // Update password only if provided
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Update the user record in the database
        if ($userModel->update($id, $data)) {
            return redirect()->to(base_url('manageusers'))->with('success', 'Akun berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui akun');
        }
    }


    public function deleteAkunUsers($id)
    {
        $userModel = new UserModel();

        // Cek apakah user dengan ID yang diberikan ada
        $user = $userModel->find($id);
        if (!$user) {
            return $this->failNotFound('User not found');
        }

        // Hapus user dari database
        if ($userModel->delete($id)) {
            return redirect()->to('/manageusers')->with('success', 'Akun berhasil dihapus.');
        } else {
            return redirect()->to('/manageusers')->with('error', 'Gagal menghapus akun.');
        }
    }
}
