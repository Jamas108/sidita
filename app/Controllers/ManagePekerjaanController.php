<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DptModel;
use App\Models\PekerjaanModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ManagePekerjaanController extends ResourceController
{
    public function index()
    {
        $pekerjaanModel = new PekerjaanModel();
        $dataPekerkjaan = $pekerjaanModel->findAll();

        return view('admin/managepekerjaan/index', ['dataPekerkjaan' => $dataPekerkjaan]);
    }
    public function create()
    {
        $dptModel = new DptModel();
        $userModel = new UserModel();

        // Ambil data DPT
        $dptData = $dptModel->getDptWithProfileEmail();

        // Ambil data ppk
        $ppkData = $userModel->getUsersByRoleId(3);

        return view('admin/managepekerjaan/create', [
            'dptData' => $dptData,
            'ppkData' => $ppkData
        ]);
    }

    public function store()
    {
        $validationRules = [
            'nama_paket_pengadaan' => 'required',
            'lokasi_pekerjaan' => 'required',
            'penyedia' => 'required',
            'nomor_kontrak' => 'required',
            'tanggal_kontrak' => 'required',
            'akhir_kontrak' => 'required',

        ];

        $validationMessages = [
            'nama_paket_pengadaan' => [
                'required' => 'Nama Paket Pengadaan wajib diisi.',
            ],
            'lokasi_pekerjaan' => [
                'required' => 'Lokasi Pekerjaan wajib diisi.',
            ],
            'ppk' => [
                'required' => 'PPK wajib diisi.',
            ],
            'penyedia' => [
                'required' => 'Penyedia wajib diisi.',
            ],
            'nomor_kontrak' => [
                'required' => 'Nomor Kontrak wajib diisi.',
            ],
            'tanggal_kontrak' => [
                'required' => 'Tanggal Kontrak wajib diisi.',
            ],
            'akhir_kontrak' => [
                'required' => 'Akhir Kontrak wajib diisi.',
            ],

        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Collect data
        $data = [
            'tahun_anggaran' => $this->request->getPost('tahun_anggaran'),
            'nama_paket_pengadaan' => $this->request->getPost('nama_paket_pengadaan'),
            'lokasi_pekerjaan' => $this->request->getPost('lokasi_pekerjaan'),
            'sumber_dana' => $this->request->getPost('sumber_dana'),
            'akun' => $this->request->getPost('akun'),
            'ppk' => $this->request->getPost('ppk'),
            'metode' => $this->request->getPost('metode'),
            'penyedia' => $this->request->getPost('penyedia'),
            'nilai_kontrak_ppn' => $this->request->getPost('nilai_kontrak_ppn'),
            'nomor_kontrak' => $this->request->getPost('nomor_kontrak'),
            'tanggal_kontrak' => $this->request->getPost('tanggal_kontrak'),
            'akhir_kontrak' => $this->request->getPost('akhir_kontrak'),
            'tanggal_bast' => $this->request->getPost('tanggal_bast'),
            'presentase_kemajuan' => $this->request->getPost('presentase_kemajuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status_pekerjaan' => $this->request->getPost('status_pekerjaan'),
            'tanggal_pembuatan' => date('Y-m-d'), // assuming this is auto-filled on store
            'dpt_id' => $this->request->getPost('dpt_id'),
        ];

        // Handle file upload
        if ($this->request->getFile('dokumen_pendukung')->isValid()) {
            $file = $this->request->getFile('dokumen_pendukung');
            $fileName = $file->getRandomName(); // Menghasilkan nama file acak
            $file->move('uploads/DokumenPekerjaan', $fileName); // Mengupload file ke folder uploads
            $data['dokumen_pendukung'] = $fileName; // Simpan nama file ke data
        }

        // Insert data into the database (assuming a model exists for this)
        $pekerjaanModel = new \App\Models\PekerjaanModel();
        $pekerjaanModel->insert($data);

        // Redirect with success message
        return redirect()->to('adminmanagepekerjaan')->with('success', 'Data pekerjaan berhasil disimpan.');
    }
    public function DetailPekerjaan($id)
    {
        $pekerjaanModel = new PekerjaanModel();

        $detailPekerjaan = $pekerjaanModel->getPekerjaanById($id);

        return view('admin/managepekerjaan/show', ['detailPekerjaan' => $detailPekerjaan]);
    }
    public function editPekerjaan($id)
{
    $pekerjaanModel = new PekerjaanModel();
    $dptModel = new DptModel();
    $userModel = new UserModel();
    
    // Get job data by ID - contains the current PPK name 
    $pekerjaan = $pekerjaanModel->find($id);
    
    if (!$pekerjaan) {
        return redirect()->to('adminmanagepekerjaan')->with('error', 'Data pekerjaan tidak ditemukan.');
    }
    
    // Get current PPK name from pekerjaan table
    $currentPpkName = $pekerjaan['ppk'];
    
    // Get all PPK users from users table (role_id = 3)
    $ppkData = $userModel->getUsersByRoleId(3);
    
    // Get DPT data
    $dptData = $dptModel->getDptWithProfileEmail();

    return view('admin/managepekerjaan/edit', [
        'pekerjaan' => $pekerjaan,
        'dptData' => $dptData,
        'ppkData' => $ppkData,
        'currentPpkName' => $currentPpkName, // Pass the current PPK name explicitly
    ]);
}

    public function updatePekerjaan($id)
    {
        $pekerjaanModel = new PekerjaanModel();
        // Ambil data dari request
        $data = [
            'tahun_anggaran' => $this->request->getPost('tahun_anggaran'),
            'nama_paket_pengadaan' => $this->request->getPost('nama_paket_pengadaan'),
            'lokasi_pekerjaan' => $this->request->getPost('lokasi_pekerjaan'),
            'sumber_dana' => $this->request->getPost('sumber_dana'),
            'akun' => $this->request->getPost('akun'),
            'ppk' => $this->request->getPost('ppk'),
            'metode' => $this->request->getPost('metode'),
            'penyedia' => $this->request->getPost('penyedia'),
            'nilai_kontrak_ppn' => $this->request->getPost('nilai_kontrak_ppn'),
            'nomor_kontrak' => $this->request->getPost('nomor_kontrak'),
            'tanggal_kontrak' => $this->request->getPost('tanggal_kontrak'),
            'akhir_kontrak' => $this->request->getPost('akhir_kontrak'),
            'tanggal_bast' => $this->request->getPost('tanggal_bast'),
            'presentase_kemajuan' => $this->request->getPost('presentase_kemajuan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'dpt_id' => $this->request->getPost('dpt_id'),
        ];

        // Cek dan pindahkan file dokumen pendukung jika diunggah
        $dokumenPendukung = $this->request->getFile('dokumen_pendukung');
        if ($dokumenPendukung && $dokumenPendukung->isValid() && !$dokumenPendukung->hasMoved()) {
            $fileName = $dokumenPendukung->getRandomName();
            $dokumenPendukung->move('uploads/DokumenPekerjaan', $fileName);
            $data['dokumen_pendukung'] = $fileName;

            // Hapus file lama jika ada
            $existingFile = $pekerjaanModel->find($id)['dokumen_pendukung'];
            if ($existingFile && file_exists('uploads/DokumenPekerjaan/' . $existingFile)) {
                unlink('uploads/DokumenPekerjaan/' . $existingFile);
            }
        }

        // Update data ke database
        $pekerjaanModel->update($id, $data);

        // Redirect dengan pesan sukses
        return redirect()->to('adminmanagepekerjaan')->with('success', 'Data pekerjaan berhasil diperbarui.');
    }

    public function updateStatusPekerjaan($id)
    {
        $status = $this->request->getPost('status_pekerjaan');

        if (!in_array($status, ['berjalan', 'selesai'])) {
            return redirect()->to('/adminmanagepekerjaan')->with('error', 'Status tidak valid.');
        }

        $pekerjaanModel = new PekerjaanModel();
        $pekerjaanModel->update($id, ['status_pekerjaan' => $status]);

        return redirect()->to('adminmanagepekerjaan')->with('success', 'Status Pekerjaan berhasil diperbarui.');
    }


    public function deletePekerjaan($id)
    {
        $pekerjaanModel = new PekerjaanModel();

        // Find the pekerjaan record by ID
        $pekerjaan = $pekerjaanModel->find($id);

        // Check if pekerjaan exists
        if (!$pekerjaan) {
            return redirect()->to('adminmanagepekerjaan')->with('error', 'Data pekerjaan tidak ditemukan.');
        }

        // Get the existing file path
        $existingFile = $pekerjaan['dokumen_pendukung'];
        if ($existingFile && file_exists('uploads/DokumenPekerjaan/' . $existingFile)) {
            // Delete the file from the server
            unlink('uploads/DokumenPekerjaan/' . $existingFile);
        }

        // Delete the pekerjaan record from the database
        $pekerjaanModel->delete($id);

        // Redirect with success message
        return redirect()->to('adminmanagepekerjaan')->with('success', 'Data pekerjaan berhasil dihapus.');
    }
}
