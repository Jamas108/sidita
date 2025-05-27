<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'event_dpt';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_event', 'tanggal_mulai', 'tanggal_selesai', 'kualifikasi_usaha', 'status', 'dokumen', 'berita_acara', 'jenis_kualifikasi_id', 'jenis_spesifikasi_id'];

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
    public function getEventWithDetails($id)
    {
        return $this->select('event_dpt.*, jenis_kualifikasi.jenis_kualifikasi AS jenis_kualifikasi, jenis_spesifikasi.nama_jenis_spesifikasi AS nama_jenis_spesifikasi')
            ->join('jenis_kualifikasi', 'jenis_kualifikasi.id = event_dpt.jenis_kualifikasi_id', 'left')
            ->join('jenis_spesifikasi', 'jenis_spesifikasi.id = event_dpt.jenis_spesifikasi_id', 'left')
            ->where('event_dpt.id', $id)
            ->first();
    }
}    
