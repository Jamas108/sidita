<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisKualifikasiModel;
use App\Models\JenisSpesifikasiModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;


class ManageSpesifikasiController extends BaseController
{
    public function index()
    {
        // Load the model
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();

        // Fetch all specifications along with qualification names
        $spesifikasiData = $jenisSpesifikasiModel->getSpesifikasiWithKualifikasi();

        // Send the data to the view
        return view('admin/managespesifikasi/index', [
            'spesifikasiData' => $spesifikasiData,
        ]);
    }


    public function DetailSpesifikasi($id)
    {
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();

        $spesifikasi = $jenisSpesifikasiModel->getSpesifikasiWithDetails($id);

        return view('admin/managespesifikasi/show', [
            'spesifikasi' => $spesifikasi
        ]);
    }

    public function create()
    {
        // Memanggil model
        $jenisSpesifikasiModel = new JenisKualifikasiModel();

        // Mengambil data jenis spesifikasi dari model
        $jenisSpesifikasi = $jenisSpesifikasiModel->getAllJenisKualifikasi();

        // Mengirim data ke view
        return view('admin/managespesifikasi/create', [
            'jenisSpesifikasi' => $jenisSpesifikasi
        ]);
    }

    public function store()
    {
        // Load the model
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();

        // Get the validation service
        $validation = \Config\Services::validation();

        // Set validation rules with custom messages
        $validation->setRules([
            'jenis_kualifikasi_id' => [
                'rules' => 'required',
                'label' => 'Jenis Kualifikasi Pengadaan',
                'errors' => [
                    'required' => 'Pilih jenis kualifikasi pengadaan terlebih dahulu.'
                ]
            ],
            'jenis_spesifikasi' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Jenis Spesifikasi',
                'errors' => [
                    'required' => 'Jenis spesifikasi wajib diisi.',
                    'min_length' => 'Jenis spesifikasi harus lebih dari 3 karakter.'
                ]
            ],
        ]);

        // Run the validation
        if (!$validation->run($this->request->getPost())) {
            // If validation fails, redirect back with errors
            return redirect()->to('createspesifikasi')->withInput()->with('errors', $validation->getErrors());
        }

        // Prepare data to be saved
        $data = [
            'jenis_kualifikasi_id' => $this->request->getPost('jenis_kualifikasi_id'),
            'nama_jenis_spesifikasi' => $this->request->getPost('jenis_spesifikasi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'created_at' => date('Y-m-d H:i:s'), // Current timestamp
        ];

        // Insert the data into the database
        if ($jenisSpesifikasiModel->save($data)) {
            // Redirect to the index page with a success message
            return redirect()->to('managespesifikasi')->with('success', 'Data spesifikasi berhasil ditambahkan.');
        } else {
            // Redirect back with an error message
            return redirect()->to('createspesifikasi')->with('error', 'Gagal menambahkan data spesifikasi.');
        }
    }







    public function editSpesifikasi($id)
    {
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();
        $jenisKualifikasiModel = new JenisKualifikasiModel();

        // Mengambil data jenis spesifikasi dari model

        $spesifikasi = $jenisSpesifikasiModel->getSpesifikasiWithDetails($id);
        $jenisKualifikasi = $jenisKualifikasiModel->getAllJenisKualifikasi();

        // Mengirim data ke view
        return view('admin/managespesifikasi/edit', [
            'spesifikasi' => $spesifikasi,
            'jenisKualifikasi' => $jenisKualifikasi,
        ]);
    }

    public function updateSpesifikasi($id)
    {
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();
        $jenisKualifikasiModel = new JenisKualifikasiModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'jenis_kualifikasi_id' => 'required',
            'jenis_spesifikasi' => 'required',
            'deskripsi' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Redirect kembali ke form edit dengan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'jenis_kualifikasi_id' => $this->request->getPost('jenis_kualifikasi_id'),
            'nama_jenis_spesifikasi' => $this->request->getPost('jenis_spesifikasi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if ($jenisSpesifikasiModel->update($id, $data)) {
            return redirect()->to(base_url('managespesifikasi'))->with('success', 'Spesifikasi berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui spesifikasi');
        }
    }




    public function deleteSpesifikasi($id)
    {
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();

        // Cek apakah data ada sebelum dihapus
        $data = $jenisSpesifikasiModel->find($id);

        if ($data) {
            // Hapus data spesifikasi
            if ($jenisSpesifikasiModel->delete($id)) {
                // Redirect dengan pesan sukses
                return redirect()->to(base_url('managespesifikasi'))->with('success', 'Data spesifikasi berhasil dihapus.');
            } else {
                // Redirect dengan pesan error jika gagal
                return redirect()->to(base_url('managespesifikasi'))->with('error', 'Gagal menghapus data spesifikasi.');
            }
        } else {
            // Jika data tidak ditemukan
            return redirect()->to(base_url('managespesifikasi'))->with('error', 'Data spesifikasi tidak ditemukan.');
        }
    }
}
