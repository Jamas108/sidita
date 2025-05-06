<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisSpesifikasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_kualifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_kualifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_kualifikasi');
    }
}
