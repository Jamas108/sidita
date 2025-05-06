<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfilPenyediaController extends BaseController
{
    public function index()
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
        return view('penyedia_tetap/profil/index', [
            'user' => $user
        ]);
    }

    public function ganti_password()
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
        return redirect()->to('/manageprofilepenyedia')->with('success', 'Password berhasil diperbarui.');
    }

    public function superadminLogout()
    {
        // Destroy the session (logout user)
        session()->destroy();

        // Redirect to the login page or homepage
        return redirect()->to(base_url('login'));
    }
}
