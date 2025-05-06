<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEventDptTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_event' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'tanggal_mulai' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'tanggal_selesai' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'kualifikasi_usaha' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'dokumen' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,  // Tambahkan constraint panjang untuk VARCHAR
                'null'       => false,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,  // Tambahkan constraint panjang untuk VARCHAR
                'null'       => false,
            ],
            'jenis_kualifikasi_id' => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],
            'jenis_spesifikasi_id' => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],

        ]);
        $this->forge->addKey('id', true);

        // Set Foreign Key, hubungan ke tabel 'jenis_spesifikasi'
        $this->forge->addForeignKey('jenis_spesifikasi_id', 'jenis_spesifikasi', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addForeignKey('jenis_kualifikasi_id', 'jenis_kualifikasi', 'id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('event_dpt');
    }

    public function down()
    {
        $this->forge->dropTable('event_dpt');
    }
}
