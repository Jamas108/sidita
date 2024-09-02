<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Cont_admin extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }
}
