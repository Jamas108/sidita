<?php

namespace App\Models;

use CodeIgniter\Model;

class BroadcastModel extends Model
{
    protected $table = 'broadcast';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pesan'];

    // Fungsi untuk mengambil semua data
    public function getAllJenisKualifikasi()
    {
        return $this->findAll();
    }
}
