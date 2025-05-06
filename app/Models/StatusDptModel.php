<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusDptModel extends Model
{
    protected $table = 'status_dpt';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'status',
        'deskripsi',
    ];

    public function getAllStatusDpt()
    {
        return $this->findAll();
    }
}
