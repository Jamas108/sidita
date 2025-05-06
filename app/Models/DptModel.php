<?php

namespace App\Models;

use CodeIgniter\Model;

class DptModel extends Model
{
    protected $table = 'dpt';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        //administrasi
        'nama_pejabat_berwenang',
        'alamat_pejabat_berwenang',
        'no_identitas_pejabat_berwenang',
        'jenis_identitas_pejabat_berwenang',
        'jabatan_pejabat_berwenang',
        'file_bukti_pejabat_berwenang',
        'keterangan_file_formulir_keikutsertaan',
        'file_formulir_keikutsertaan',
        'keterangan_file_surat_pernyataan',
        'file_surat_pernyataan',
        'keterangan_file_pakta_integritas',
        'file_pakta_integritas',
        'keterangan_file_akta_pendirian_perusahaan',
        'file_akta_pendirian_perusahaan',
        'keterangan_file_surat_keterangan_domisili',
        'file_surat_keterangan_domisili',
        'keterangan_file_nib',
        'file_nib',
        'keterangan_file_siup',
        'file_siup',
        'keterangan_file_siujk',
        'file_siujk',
        'keterangan_file_sbu',
        'file_sbu',
        'keterangan_file_pendukung_kualifikasi',
        'file_pendukung_kualifikasi',
        'keterangan_file_pendukung_kualifikasi2',
        'file_pendukung_kualifikasi2',
        'keterangan_file_pendukung_kualifikasi3',
        'file_pendukung_kualifikasi3',
        //keuangan
        'keterangan_file_laporan_keuangan',
        'file_laporan_keuangan',
        'keterangan_file_rekening_koran_3_bulan',
        'file_rekening_koran_3_bulan',
        'keterangan_file_sppkp',
        'file_sppkp',
        'keterangan_file_npwp',
        'file_npwp',
        'keterangan_file_lapor_tahunan_pajak',
        'file_lapor_tahunan_pajak',
        //profil perusahaan
        'profil_perusahaan_id',
        'event_id',
        'status_dpt_id',
        'created_at',
        'updated_at',
    ];

    public function getAllDpt()
    {
        return $this->findAll();
    }
    public function getParticipantsWithProfileByEventId($eventId)
    {
        return $this->db->table($this->table)
            ->select('dpt.*, profil_perusahaan.nama_perusahaan, profil_perusahaan.nama_awal_perusahaan, profil_perusahaan.nama_akhir_perusahaan, status_dpt.status as status_name')
            ->join('profil_perusahaan', 'profil_perusahaan.profil_perusahaan_id = dpt.profil_perusahaan_id')
            ->join('status_dpt', 'status_dpt.id = dpt.status_dpt_id') // Join with status_dpt to get the status name
            ->where('event_id', $eventId)
            ->get()
            ->getResultArray();
    }

    public function getParticipantWithProfile($id)
    {
        return $this->db->table($this->table)
            ->select('dpt.*, profil_perusahaan.*')
            ->join('profil_perusahaan', 'profil_perusahaan.profil_perusahaan_id = dpt.profil_perusahaan_id')
            ->where('dpt.id', $id)
            ->get()
            ->getRowArray();
    }

    public function getDptWithProfileEmail()
    {
        return $this->db->table($this->table)
            ->select('dpt.*, profil_perusahaan.*')
            ->join('profil_perusahaan', 'profil_perusahaan.profil_perusahaan_id = dpt.profil_perusahaan_id')
            ->where('status_dpt_id', 1)
            ->get()
            ->getResultArray();
    }


    public function getParticipantsByEventId($eventId)
    {
        return $this->where('event_id', $eventId)->findAll();
    }

    public function getDptByStatus($statusId)
    {
        return $this->db->table('dpt')
            ->select('dpt.*, profil_perusahaan.*')  // Select fields from both dpt and profil_perusahaan
            ->join('profil_perusahaan', 'profil_perusahaan.profil_perusahaan_id = dpt.profil_perusahaan_id')  // Join with profil_perusahaan
            ->where('status_dpt_id', $statusId)  // Filter by status_dpt_id
            ->get()
            ->getResultArray();  // Fetch the result as an array
    }

    public function getDptStatus()
    {
        return $this->select('dpt.*, status_dpt.status')
            ->join('status_dpt', 'status_dpt.id = dpt.dpt_status_id')
            ->findAll();
    }

    public function getParticipantsWithProfileByEmail($profilPerusahaanId)
    {
        return $this->db->table($this->table)
            ->select('dpt.*, profil_perusahaan.*')
            ->join('profil_perusahaan', 'profil_perusahaan.profil_perusahaan_id = dpt.profil_perusahaan_id')
            ->where('dpt.profil_perusahaan_id', $profilPerusahaanId)
            ->get()
            ->getResultArray();
    }
}
