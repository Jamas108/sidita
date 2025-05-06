<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul',
        'deskripsi',
        'dokumen',
        'created_at',
        'updated_at',
    ];

    public function getAnnouncementById($id)
    {
        return $this->find($id);
    }
}
