<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table = 'pekerjaan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'dpt_id',
        'tanggal_pembuatan',
        'tahun_anggaran',
        'ppk',
        'nama_paket_pengadaan',
        'lokasi_pekerjaan',
        'sumber_dana',
        'akun',
        'metode',
        'penyedia',
        'nilai_kontrak_ppn',
        'nomor_kontrak',
        'tanggal_kontrak',
        'akhir_kontrak',
        'tanggal_bast',
        'presentase_kemajuan',
        'keterangan',
        'dokumen_pendukung',
        'status_pekerjaan',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllDpt()
    {
        return $this->findAll();
    }

    public function getPekerjaanById($id)
    {
        return $this->find($id);
    }

    
    public function getPekerjaanByDptId($dpt_id)
    {
        return $this->where('dpt_id', $dpt_id)->findAll();
    }
}
