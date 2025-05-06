<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class APIMataUangController extends BaseController
{
    public function showForm()
    {
        // URL API untuk mendapatkan daftar mata uang
        $apiUrl = "https://api.exchangerate-api.com/v4/latest/USD"; // Ganti dengan API yang Anda gunakan

        // Ambil data dari API
        $response = file_get_contents($apiUrl);

        // Decode JSON dari API
        $data = json_decode($response, true);

        // Ambil daftar kode mata uang, jika data berhasil diambil
        $currencies = isset($data['rates']) ? array_keys($data['rates']) : [];

        // Kirim data ke view
        return view('pengguna/pendaftarandpt/create', ['currencies' => $currencies]);
    }
}
