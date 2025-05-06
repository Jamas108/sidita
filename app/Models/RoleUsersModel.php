<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleUsersModel extends Model
{
    protected $table = 'role_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['role', 'deskripsi',];

    public function getAllRole()
    {
        return $this->findAll();
    }
}
