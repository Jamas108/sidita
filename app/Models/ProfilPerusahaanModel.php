<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilPerusahaanModel extends Model
{
    protected $table = 'profil_perusahaan';
    protected $primaryKey = 'profil_perusahaan_id';
    protected $allowedFields = [
        'nama_awal_perusahaan',
        'nama_perusahaan',
        'nama_akhir_perusahaan',
        'tanggal_berdiri_perusahaan',
        'kualifikasi_usaha',
        'jenis_kualifikasi_pengadaan',
        'jenis_kualifikasi_pengadaan2',
        'jenis_kualifikasi_pengadaan3',
        'jenis_spesifikasi_pengadaan',
        'jenis_spesifikasi_pengadaan2',
        'jenis_spesifikasi_pengadaan3',
        'no_pkp',
        'no_npwp',
        'nama_pemilik_perusahaan',
        'no_identitas_pemilik_perusahaan',
        'jenis_identitas_pemilik_perusahaan',
        'kepemilikan',
        'alamat',
        'latitude',
        'longitude',
        'provinsi',
        'kabupaten',
        'kode_pos',
        'nama_bank',
        'no_rekening',
        'mata_uang_bank',
        'email',
        'website',
        'no_telepon_kantor',
        'no_hp_kantor',
        'no_fax_kantor',
    ];

    // Fungsi untuk mengambil semua data
    public function getAllProfilPerusahaan()
    {
        return $this->findAll();
    }

    // Fungsi untuk mengambil profil perusahaan berdasarkan ID
    public function getProfilPerusahaanById($id)
    {
        return $this->find($id);
    }
}
