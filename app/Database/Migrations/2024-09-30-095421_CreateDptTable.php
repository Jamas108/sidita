<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDptTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            //ADMINISTRASI
            'nama_pejabat_berwenang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_pejabat_berwenang' => [
                'type'       => 'TEXT',
            ],
            'no_identitas_pejabat_berwenang' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis_identitas_pejabat_berwenang' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jabatan_pejabat_berwenang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'file_bukti_pejabat_berwenang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],

            // Dokumen yang diunggah
            'keterangan_file_formulir_keikutsertaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_formulir_keikutsertaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_surat_pernyataan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_surat_pernyataan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_pakta_integritas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_pakta_integritas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_akta_pendirian_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_akta_pendirian_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_surat_keterangan_domisili' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_surat_keterangan_domisili' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_nib' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_nib' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_siup' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_siup' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_siujk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_siujk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_sbu' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_sbu' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_pendukung_kualifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_pendukung_kualifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_pendukung_kualifikasi2' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_pendukung_kualifikasi2' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'keterangan_file_pendukung_kualifikasi3' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'file_pendukung_kualifikasi3' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],

            //KEUANGAN
            'keterangan_file_laporan_keuangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_laporan_keuangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan_file_rekening_koran_3_bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_rekening_koran_3_bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan_file_sppkp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_sppkp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan_file_npwp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_npwp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan_file_lapor_tahunan_pajak' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_lapor_tahunan_pajak' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            //PENGALAMAN
            'profil_perusahaan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'event_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'status_dpt_id' => [
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

        // Set Foreign Key, hubungan ke tabel 'perusahaan dpt'
        $this->forge->addForeignKey('profil_perusahaan_id', 'profil_perusahaan', 'id', 'CASCADE', 'CASCADE');
        // Set Foreign Key, hubungan ke tabel 'status dpt'
        $this->forge->addForeignKey('status_dpt_id', 'status_dpt', 'id', 'CASCADE', 'CASCADE');
        // Set Foreign Key, hubungan ke tabel 'event dpt'
        $this->forge->addForeignKey('event_id', 'event_dpt', 'id', 'CASCADE', 'CASCADE');



        //membuat tabel
        $this->forge->createTable('dpt');
    }

    public function down()
    {
        // Drop tabel jika rollback
        $this->forge->dropTable('dpt');
    }
}
