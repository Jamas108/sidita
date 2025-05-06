<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfilPerusahaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_awal_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_akhir_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_berdiri_perusahaan' => [
                'type' => 'DATE',
            ],
            'kualifikasi_usaha' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis_kualifikasi_pengadaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_spesifikasi_pengadaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_pkp' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'no_npwp' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_pemilik_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_identitas_pemilik_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis_identitas_pemilik_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'kepemilikan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'latitude' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'longitude' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'provinsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kabupaten' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kode_pos' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'nama_bank' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_rekening' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'mata_uang_bank' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_telepon_kantor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_hp_kantor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_fax_kantor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profil_perusahaan');
    }

    public function down()
    {
        $this->forge->dropTable('profil_perusahaan');
    }
}
