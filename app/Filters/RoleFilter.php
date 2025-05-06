<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login'); // Redirect ke halaman login jika belum login
        }

        // Cek role pengguna
        $roleId = session()->get('role_id');

        // Jika role pengguna tidak sesuai dengan role yang diizinkan, arahkan kembali
        if (!in_array($roleId, $arguments)) {
            return redirect()->to('/'); // Arahkan ke halaman default jika role tidak sesuai
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Aksi yang bisa dilakukan setelah request
        // Misalnya, logging atau membersihkan resource

        // Contoh: Melakukan logging user activity
        log_message('info', 'User ID ' . session()->get('user_id') . ' mengakses halaman ' . current_url());
    }
}
