<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengalamanDptTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'profil_perusahaan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'no_kontrak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'nama_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'bidang_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'pemilik_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'alamat_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'no_telp_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => false,
            ],
            'lokasi_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'nilai_proyek' => [
                'type'       => 'DECIMAL',
                'constraint' => '20,2',
                'null'       => false,
            ],
            'tanggal_bast' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'file_bukti_pengalaman' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true, // Bisa null jika tidak wajib
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('profil_perusahaan_id', 'profil_perusahaan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengalaman_dpt');
    }

    public function down()
    {
        $this->forge->dropTable('pengalaman_dpt');
    }
}
