<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function login()
    {
        return view('auth/login', ['title'=>'Login']);
    }

    public function daftar()
    {
        return view('auth/daftar', ['title'=>'Daftar DPT']);
    }

    public function dashboard()
    {
        return view('admin/dashboard', ['user'=>'Superadmin']);
    }
}