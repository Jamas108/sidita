<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePekerjaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal_pembuatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tahun_anggaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ppk' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_paket_pengadaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'lokasi_pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'sumber_dana' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'akun' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'metode' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penyedia' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nilai_kontrak_ppn' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nomor_kontrak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_kontrak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'akhir_kontrak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_bast' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'presentase_kemajuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'dokumen_pendukung' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pekerjaan');
    }

    public function down()
    {
        $this->forge->dropTable('pekerjaan');
    }
}
