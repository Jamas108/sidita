<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianPekerjaanModel extends Model
{
    protected $table = 'penilaian_pekerjaan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pekerjaan_id',
        'nama_penilai',
        'nip_penilai',
        'posisi_penilai',
        'durasi',
        'skor_kinerja_kualitas_dan_kuantitas_pekerjaan',
        'nilai_kinerja_kualitas_dan_kuantitas_pekerjaan',
        'skor_kinerja_biaya',
        'nilai_kinerja_biaya',
        'skor_kinerja_waktu',
        'nilai_kinerja_waktu',
        'skor_kinerja_layanan',
        'nilai_kinerja_layanan',
        'nilai_total_kinerja',
        'catatan',
        'users_id',
    ];

    public function getAllPenilaianPekerjaan()
    {
        return $this->findAll();
    }
    public function getPenilaianDetail($penilaianId)
    {
        // Gunakan query builder untuk melakukan join antar tabel
        $builder = $this->db->table('penilaian_pekerjaan');
        $builder->select('penilaian_pekerjaan.*, pekerjaan.*, users.*');
        $builder->join('pekerjaan', 'pekerjaan.id = penilaian_pekerjaan.pekerjaan_id');
        $builder->join('users', 'users.id = penilaian_pekerjaan.users_id');
        $builder->where('penilaian_pekerjaan.id', $penilaianId);

        // Ambil data berdasarkan penilaian ID
        return $builder->get()->getRow();
    }

}
