<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_awal_penyedia', 'nama_penyedia', 'nip', 'jabatan', 'nama_akhir_penyedia', 'email', 'password', 'role_id', 'created_at', 'updated_at'];

    public function getAllUser()
    {
        return $this->select('users.*, role_users.role')
            ->join('role_users', 'role_users.id = users.role_id')
            ->findAll();
    }

    public function getUserById($id)
    {
        return $this->select('users.*, role_users.role')
            ->join('role_users', 'role_users.id = users.role_id')
            ->where('users.id', $id)
            ->first();
    }

    public function decryptPassword($encryptedPassword)
    {
        $encryptionKey = 'your-secret-key'; // Kunci enkripsi Anda
        $cipher = 'AES-256-CBC'; // Metode enkripsi
        $iv = substr($encryptedPassword, 0, 16); // Ambil IV (16 byte pertama)
        $ciphertext = substr($encryptedPassword, 16); // Sisanya adalah ciphertext

        return openssl_decrypt($ciphertext, $cipher, $encryptionKey, 0, $iv);
    }

    public function getUsersByRoleId($role_id)
{
    return $this->select('users.*, role_users.role')
        ->join('role_users', 'role_users.id = users.role_id')
        ->where('users.role_id', $role_id)
        ->findAll();
}

}
