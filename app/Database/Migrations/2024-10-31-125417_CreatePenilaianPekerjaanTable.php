<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenilaianPekerjaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pekerjaan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'nama_penilai' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'nip_penilai' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'posisi_penilai' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'skor_kinerja_kualitas_dan_kuantitas_pekerjaan' => [
                'type'       => 'int',
                'constraint' => '1',
                'null'       => false,
            ],
            'nilai_kinerja_kualitas_dan_kuantitas_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'skor_kinerja_biaya' => [
                'type'       => 'int',
                'constraint' => '1',
                'null'       => false,
            ],
            'nilai_kinerja_biaya' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'skor_kinerja_waktu' => [
                'type'       => 'int',
                'constraint' => '1',
                'null'       => false,
            ],
            'nilai_kinerja_waktu' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'skor_kinerja_layanan' => [
                'type'       => 'int',
                'constraint' => '1',
                'null'       => false,
            ],
            'nilai_kinerja_layanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'nilai_total_kinerja' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'catatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penilaian_pekerjaan');
        $this->forge->addForeignKey('pekerjaan_id', 'pekerjaan', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('penilaian_pekerjaan');
    }
}
