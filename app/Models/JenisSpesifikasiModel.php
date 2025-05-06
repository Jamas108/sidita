<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSpesifikasiModel extends Model
{
    protected $table = 'jenis_spesifikasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_kualifikasi_id', 'nama_jenis_spesifikasi', 'deskripsi', 'created_at', 'updated_at'];

    public function getAllJenisSpesifikasi()
    {
        return $this->findAll();
    }

    // Fungsi untuk mengambil spesifikasi berdasarkan ID
    public function getSpesifikasiById($id)
    {
        return $this->find($id);
    }

    public function getSpesifikasiWithKualifikasi()
    {
        return $this->select('jenis_spesifikasi.*, jenis_kualifikasi.jenis_kualifikasi')
            ->join('jenis_kualifikasi', 'jenis_kualifikasi.id = jenis_spesifikasi.jenis_kualifikasi_id', 'left')
            ->findAll();
    }

    public function getSpesifikasiWithDetails($id)
    {
        return $this->select('jenis_spesifikasi.*, jenis_kualifikasi.jenis_kualifikasi')
            ->join('jenis_kualifikasi', 'jenis_spesifikasi.jenis_kualifikasi_id = jenis_kualifikasi.id', 'left')
            ->where('jenis_spesifikasi.id', $id)
            ->first();
    }
}
