<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisKualifikasiModel extends Model
{
    protected $table = 'jenis_kualifikasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_kualifikasi', 'deskripsi'];

    // Fungsi untuk mengambil semua data
    public function getAllJenisKualifikasi()
    {
        return $this->findAll();
    }


    // Fungsi untuk mengambil jenis kualifikasi berdasarkan ID
    public function getKualifikasiById($id)
    {
        return $this->find($id);
    }
}
