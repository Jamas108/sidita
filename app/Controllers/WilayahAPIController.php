<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class WilayahAPIController extends Controller
{
    public function getProvinces()
    {
        $apiUrl = 'https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json';
        $response = file_get_contents($apiUrl);
        return $this->response->setJSON(json_decode($response));
    }

    public function getKabupaten($provinsiId)
    {
        $apiUrl = "https://emsifa.github.io/api-wilayah-indonesia/api/regencies/$provinsiId.json";
        $response = file_get_contents($apiUrl);
        return $this->response->setJSON(json_decode($response));
    }
}
