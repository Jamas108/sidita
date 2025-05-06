<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanPerusahaanModel extends Model
{
    protected $table = 'pengalaman_dpt';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'profil_perusahaan_id',
        'no_kontrak',
        'nama_pekerjaan',
        'bidang_pekerjaan',
        'pemilik_pekerjaan',
        'alamat_pekerjaan',
        'no_telp_pekerjaan',
        'lokasi_pekerjaan',
        'nilai_proyek',
        'tanggal_bast',
        'file_bukti_pengalaman',
    ];

    // Fungsi untuk mengambil semua data
    public function getAllPengalamanPerusahaan()
    {
        return $this->findAll();
    }
    public function getExperiencesByProfileId($profilPerusahaanId)
    {
        return $this->where('profil_perusahaan_id', $profilPerusahaanId)->findAll();
    }

    // Fungsi untuk mengambil jenis kualifikasi berdasarkan ID
    // public function getKualifikasiById($id)
    // {
    //     return $this->find($id);
    // }
}
