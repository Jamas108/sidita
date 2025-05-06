<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdministrasiDptModel;
use App\Models\DptModel;
use App\Models\EventModel;
use App\Models\JenisKualifikasiModel;
use App\Models\JenisSpesifikasiModel;
use App\Models\KeuanganDptModel;
use App\Models\PengalamanDptModel;
use App\Models\PengalamanPerusahaanModel;
use App\Models\ProfilePerusahaanDpt;
use App\Models\ProfilePerusahaanDptModel;
use App\Models\ProfilPerusahaanModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class PenggunaDptController extends ResourceController
{
    public function index()
    {
        return view('pengguna/index', ['user' => 'Pengguna']);
    }
    public function create()
    {
        // Load the models
        $jenisKualifikasiModel = new JenisKualifikasiModel();
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();

        // URL API untuk mendapatkan daftar mata uang
        $apiUrl = "https://api.exchangerate-api.com/v4/latest/USD"; // Sesuaikan dengan API yang Anda gunakan

        // Mengambil data dari API
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        // Mendapatkan daftar mata uang
        $currencies = isset($data['rates']) ? array_keys($data['rates']) : [];

        // Mengambil parameter dari URL
        $eventId = $this->request->getGet('event_id');
        $kualifikasiUsaha = $this->request->getGet('kualifikasi_usaha');
        $jenisKualifikasiId = $this->request->getGet('jenis_kualifikasi_id');
        $jenisSpesifikasiId = $this->request->getGet('jenis_spesifikasi_id');

        // Fetch the names based on the IDs
        $kualifikasi = $jenisKualifikasiModel->getKualifikasiById($jenisKualifikasiId);
        $spesifikasi = $jenisSpesifikasiModel->getSpesifikasiById($jenisSpesifikasiId);

        // Prepare the names to pass to the view
        $jenisKualifikasiNama = isset($kualifikasi) ? $kualifikasi['jenis_kualifikasi'] : ''; // Use the correct field name
        $jenisSpesifikasiNama = isset($spesifikasi) ? $spesifikasi['nama_jenis_spesifikasi'] : ''; // Use the correct field name

        // Kirim data ke view
        return view('pengguna/pendaftarandpt/create', [
            'currencies' => $currencies,
            'eventId' => $eventId,
            'kualifikasiUsaha' => $kualifikasiUsaha,
            'jenisKualifikasiNama' => $jenisKualifikasiNama, // Pass the name instead of ID
            'jenisSpesifikasiNama' => $jenisSpesifikasiNama  // Pass the name instead of ID
        ]);
    }
    public function store()
    {
        // Load the model
        $ProfilPerusahaanModel = new ProfilPerusahaanModel();
        $PengalamanPerusahaanModel = new PengalamanPerusahaanModel();
        $DptModel = new DptModel();

        $validationRules = [
            'nama_awal_perusahaan' => 'required',
            'nama_perusahaan' => 'required',
            'tanggal_berdiri_perusahaan' => 'required',
            'kualifikasi_usaha' => 'required',
            'jenis_kualifikasi_pengadaan' => 'required',
            'jenis_spesifikasi_pengadaan' => 'required',
            'nama_pemilik_perusahaan' => 'required',
            'no_identitas_pemilik_perusahaan' => 'required|numeric',
            'jenis_identitas_pemilik_perusahaan' => 'required',
            'kepemilikan' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kode_pos' => 'required|numeric',
            'nama_bank' => 'required',
            'no_rekening' => 'required|numeric',
            'mata_uang_bank' => 'required',
            'email' => 'required',
            'no_telepon_kantor' => 'required|numeric',
            'no_hp_kantor' => 'required|numeric',
            // 'file_formulir_keikutsertaan' => 'required|',
            // 'file_surat_pernyataan' => 'required|',
        ];

        $validationMessages = [
            'nama_awal_perusahaan' => [
                'required' => 'Nama Awal Perusahaan wajib diisi.',
            ],
            'nama_perusahaan' => [
                'required' => 'Nama Perusahaan wajib diisi.',
            ],
            'tanggal_berdiri_perusahaan' => [
                'required' => 'Tanggal Berdiri Perusahaan wajib diisi.',
            ],
            'kualifikasi_usaha' => [
                'required' => 'Kualifikasi Usaha wajib diisi.',
            ],
            'jenis_kualifikasi_pengadaan' => [
                'required' => 'Jenis Kualifikasi Pengadaan wajib diisi.',
            ],
            'jenis_spesifikasi_pengadaan' => [
                'required' => 'Jenis Spesifikasi Pengadaan wajib diisi.',
            ],
            'nama_pemilik_perusahaan' => [
                'required' => 'Nama Pemilik Perusahaan wajib diisi.',
            ],
            'no_identitas_pemilik_perusahaan' => [
                'required' => 'No Identitas Pemilik Perusahaan wajib diisi.',
                'numeric' => 'No Identitas harus berupa angka'
            ],
            'jenis_identitas_pemilik_perusahaan' => [
                'required' => 'Jenis Identitas Pemilik Perusahaan wajib diisi.',
            ],
            'kepemilikan' => [
                'required' => 'Kepemilikan wajib diisi.',
            ],
            'alamat' => [
                'required' => 'Alamat wajib diisi.',
            ],
            'latitude' => [
                'required' => 'Latitude wajib diisi.',
            ],
            'longitude' => [
                'required' => 'Longitude wajib diisi.',
            ],
            'provinsi' => [
                'required' => 'Provinsi wajib diisi.',
            ],
            'kabupaten' => [
                'required' => 'Kabupaten wajib diisi.',
            ],
            'kode_pos' => [
                'required' => 'Kode Pos wajib diisi.',
                'numeric' => 'Kode Pos harus berupa angka'
            ],
            'nama_bank' => [
                'required' => 'Nama Bank wajib diisi.',
            ],
            'no_rekening' => [
                'required' => 'No Rekening wajib diisi.',
                'numeric' => 'No Rekening harus berupa angka'
            ],
            'mata_uang_bank' => [
                'required' => 'Mata Uang Bank wajib diisi.',
            ],
            'email' => [
                'required' => 'Email wajib diisi.',
            ],
            'no_telepon_kantor' => [
                'required' => 'No Telepon Kantor wajib diisi.',
                'numeric' => 'No Telepon Kantor harus berupa angka'
            ],
            'no_hp_kantor' => [
                'required' => 'No Hp Kantor wajib diisi.',
                'numeric' => 'No Hp Kantor harus berupa angka'
            ],


        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $profilData = [
            'nama_awal_perusahaan' => $this->request->getPost('nama_awal_perusahaan'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'nama_akhir_perusahaan' => $this->request->getPost('nama_akhir_perusahaan'),
            'tanggal_berdiri_perusahaan' => $this->request->getPost('tanggal_berdiri_perusahaan'),
            'kualifikasi_usaha' => $this->request->getPost('kualifikasi_usaha'),
            'jenis_kualifikasi_pengadaan' => $this->request->getPost('jenis_kualifikasi_pengadaan'),
            'jenis_spesifikasi_pengadaan' => $this->request->getPost('jenis_spesifikasi_pengadaan'),
            'no_pkp' => $this->request->getPost('no_pkp'),
            'no_npwp' => $this->request->getPost('no_npwp'),
            'nama_pemilik_perusahaan' => $this->request->getPost('nama_pemilik_perusahaan'),
            'no_identitas_pemilik_perusahaan' => $this->request->getPost('no_identitas_pemilik_perusahaan'),
            'jenis_identitas_pemilik_perusahaan' => $this->request->getPost('jenis_identitas_pemilik_perusahaan'),
            'kepemilikan' => $this->request->getPost('kepemilikan'),
            'alamat' => $this->request->getPost('alamat'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'nama_bank' => $this->request->getPost('nama_bank'),
            'no_rekening' => $this->request->getPost('no_rekening'),
            'mata_uang_bank' => $this->request->getPost('mata_uang_bank'),
            'email' => $this->request->getPost('email'),
            'website' => $this->request->getPost('website'),
            'no_telepon_kantor' => $this->request->getPost('no_telepon_kantor'),
            'no_hp_kantor' => $this->request->getPost('no_hp_kantor'),
            'no_fax_kantor' => $this->request->getPost('no_fax_kantor'),
        ];
        $ProfilPerusahaanModel->insert($profilData);
        $profilId = $ProfilPerusahaanModel->insertID();


        $pengalamanDataList = $this->request->getPost('pengalaman');
        foreach ($pengalamanDataList as $index => $pengalaman) {
            $pengalamanData = [
                'profil_perusahaan_id' => $profilId,
                'no_kontrak' => $pengalaman['no_kontrak'],
                'nama_pekerjaan' => $pengalaman['nama_pekerjaan'],
                'bidang_pekerjaan' => $pengalaman['bidang_pekerjaan'],
                'pemilik_pekerjaan' => $pengalaman['pemilik_pekerjaan'],
                'alamat_pekerjaan' => $pengalaman['alamat_pekerjaan'],
                'no_telp_pekerjaan' => $pengalaman['no_telp_pekerjaan'],
                'lokasi_pekerjaan' => $pengalaman['lokasi_pekerjaan'],
                'nilai_proyek' => $pengalaman['nilai_proyek'],
                'tanggal_bast' => $pengalaman['tanggal_bast'],
            ];

            // File Upload Handling for Bukti Pengalaman
            $fileField = "file_bukti_pengalaman_" . $index; // Sesuaikan dengan penamaan dari frontend
            $file = $this->request->getFile($fileField);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads/pengalaman', $newName);
                $pengalamanData['file_bukti_pengalaman'] = '/uploads/pengalaman/' . $newName;
            } else {
                $pengalamanData['file_bukti_pengalaman'] = null;
            }

            // Simpan Pengalaman
            $PengalamanPerusahaanModel->insert($pengalamanData);
        }
        // Prepare data to be saved
        $data = [
            'nama_pejabat_berwenang' => $this->request->getPost('nama_pejabat_berwenang'),
            'alamat_pejabat_berwenang' => $this->request->getPost('alamat_pejabat_berwenang'),
            'no_identitas_pejabat_berwenang' => $this->request->getPost('no_identitas_pejabat_berwenang'),
            'jenis_identitas_pejabat_berwenang' => $this->request->getPost('jenis_identitas_pejabat_berwenang'),
            'jabatan_pejabat_berwenang' => $this->request->getPost('jabatan_pejabat_berwenang'),
            'keterangan_file_formulir_keikutsertaan' => $this->request->getPost('keterangan_file_formulir_keikutsertaan'),
            'keterangan_file_surat_pernyataan' => $this->request->getPost('keterangan_file_surat_pernyataan'),
            'keterangan_file_pakta_integritas' => $this->request->getPost('keterangan_file_pakta_integritas'),
            'keterangan_file_akta_pendirian_perusahaan' => $this->request->getPost('keterangan_file_akta_pendirian_perusahaan'),
            'keterangan_file_surat_keterangan_domisili' => $this->request->getPost('keterangan_file_surat_keterangan_domisili'),
            'keterangan_file_nib' => $this->request->getPost('keterangan_file_nib'),
            'keterangan_file_siup' => $this->request->getPost('keterangan_file_siup'),
            'keterangan_file_siujk' => $this->request->getPost('keterangan_file_siujk'),
            'keterangan_file_sbu' => $this->request->getPost('keterangan_file_sbu'),
            'keterangan_file_pendukung_kualifikasi' => $this->request->getPost('keterangan_file_pendukung_kualifikasi'),
            'keterangan_file_pendukung_kualifikasi2' => $this->request->getPost('keterangan_file_pendukung_kualifikasi2'),
            'keterangan_file_pendukung_kualifikasi3' => $this->request->getPost('keterangan_file_pendukung_kualifikasi3'),
            'keterangan_file_laporan_keuangan' => $this->request->getPost('keterangan_file_laporan_keuangan'),
            'keterangan_file_rekening_koran_3_bulan' => $this->request->getPost('keterangan_file_rekening_koran_3_bulan'),
            'keterangan_file_sppkp' => $this->request->getPost('keterangan_file_sppkp'),
            'keterangan_file_npwp' => $this->request->getPost('keterangan_file_npwp'),
            'keterangan_file_lapor_tahunan_pajak' => $this->request->getPost('keterangan_file_lapor_tahunan_pajak'),
            'event_id' => $this->request->getPost('event_id'),
            'status_dpt_id' => $this->request->getPost('status_dpt_id'),
            'profil_perusahaan_id' => $profilId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'), // Current timestamp
        ];
        // Tambahkan pemeriksaan jika file sudah di-upload sebelumnya, dan simpan pathnya
        $fileFields = [
            'file_bukti_pejabat_berwenang',
            'file_formulir_keikutsertaan',
            'file_surat_pernyataan',
            'file_pakta_integritas',
            'file_akta_pendirian_perusahaan',
            'file_surat_keterangan_domisili',
            'file_nib',
            'file_siup',
            'file_siujk',
            'file_sbu',
            'file_pendukung_kualifikasi',
            'file_pendukung_kualifikasi2',
            'file_pendukung_kualifikasi3',
            'file_laporan_keuangan',
            'file_rekening_koran_3_bulan',
            'file_sppkp',
            'file_npwp',
            'file_lapor_tahunan_pajak',
        ];

        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Define upload path in the public directory
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads/filedpt', $newName); // Ganti WRITEPATH dengan FCPATH

                // Save file path in $data array
                $data[$field] = '/uploads/filedpt/' . $newName; // Simpan path relatif
            } else {
                // Jika file gagal diupload atau tidak ada, gunakan nilai path file lama
                $data[$field] = $this->request->getPost($field); // Menggunakan nilai lama
            }
        }


        // Insert the data into the database
        if ($DptModel->save($data)) {
            // Redirect to the index page with a success message
            return redirect()->to('/')->with('success', 'Data spesifikasi berhasil ditambahkan.');
        } else {
            // Redirect back with an error message
            return redirect()->to('pendaftarandptpengguna')->with('error', 'Gagal menambahkan data spesifikasi.');
        }
    }
}
