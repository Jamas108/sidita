<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DptModel;
use App\Models\PekerjaanModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class OperatorController extends ResourceController
{
    public function index()
    {
        $pekerjaanModel = new \App\Models\PekerjaanModel();
        $dptModel = new \App\Models\DptModel();

        $jumlahPekerjaan = $pekerjaanModel->countAll(); // Hitung semua pekerjaan
        $jumlahPenyedia = $dptModel->countAll(); // Hitung semua penyedia

        return view('operator/index', compact('jumlahPekerjaan', 'jumlahPenyedia'));
    }

    public function create()
    {
        return view('operator/create');
    }

    public function operatorProfil()
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
        return view('operator/profil', [
            'user' => $user
        ]);
    }

    public function operatorUpdatePassword()
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
        return redirect()->to('/operatorprofil')->with('success', 'Password berhasil diperbarui.');
    }
}
