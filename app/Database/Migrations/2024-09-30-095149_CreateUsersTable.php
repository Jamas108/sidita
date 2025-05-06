<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Tabel 'users'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_awal_penyedia' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_penyedia' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_akhir_penyedia' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true, // Bisa null jika tidak ada nama akhir
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'unique'     => true, // Email harus unik
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'reset_password_token' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'reset_password_expires_at' => [
                'type'    => 'DATETIME',
                'null'    => true, 
            ],
            'role_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        // Set Primary Key
        $this->forge->addKey('id', true);

        // Set Foreign Key, hubungan ke tabel 'role_users'
        $this->forge->addForeignKey('role_id', 'role_users', 'id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('users');
    }

    public function down()
    {
        // Drop tabel jika rollback
        $this->forge->dropTable('users');
    }
}
