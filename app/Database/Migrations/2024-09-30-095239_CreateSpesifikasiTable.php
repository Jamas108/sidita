<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSpesifikasiTable extends Migration
{
    public function up()
    {
        // Tabel 'spesifikasi'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_kualifikasi_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'nama_jenis_spesifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false, // Bisa null jika tidak ada deskripsi
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

        // Set Foreign Key, hubungan ke tabel 'jenis_spesifikasi'
        $this->forge->addForeignKey('jenis_kualifikasi_id', 'jenis_kualifikasi', 'id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('jenis_spesifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_spesifikasi');
    }
}
