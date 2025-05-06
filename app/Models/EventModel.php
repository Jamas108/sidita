<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'event_dpt';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_event', 'tanggal_mulai', 'tanggal_selesai', 'kualifikasi_usaha', 'status', 'dokumen','berita_acara', 'jenis_kualifikasi_id', 'jenis_spesifikasi_id'];

    public function getAllEvent()
    {
        return $this->findAll();
    }
    // Function to get event details with related qualification and specification
    public function getPenilaianByDptId($dpt_id)
    {
        return $this->select('penilaian_pekerjaan.*, pekerjaan.*') // Mengambil semua kolom dari penilaian_pekerjaan dan pekerjaan
            ->join('pekerjaan', 'pekerjaan.id = penilaian_pekerjaan.pekerjaan_id')
            ->where('pekerjaan.dpt_id', $dpt_id)
            ->findAll();
    }
}
