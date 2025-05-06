<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BroadcastModel;
use CodeIgniter\HTTP\ResponseInterface;

class BroadcastController extends BaseController
{
    public function index()
    {
        $broadcastModel = new BroadcastModel();
        $data['broadcast'] = $broadcastModel->findAll();  // Get all announcements
        return view('admin/managebroadcast/index', $data);
    }

    public function updateBroadcast($id)
    {
        // Validasi data input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'pesan' => 'required|max_length[255]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->with('error', 'Pesan tidak boleh kosong dan maksimal 255 karakter.');
        }

        // Ambil data yang diterima dari form
        $pesan = $this->request->getPost('pesan');

        // Inisialisasi model
        $broadcastModel = new BroadcastModel();

        // Update data ke database
        $updateData = [
            'pesan' => $pesan,
        ];

        if ($broadcastModel->update($id, $updateData)) {
            return redirect()->to('managebroadcast')->with('success', 'Broadcast berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui broadcast.');
        }
    }


    public function store()
    {
        $validationRules = [
            'pesan' => 'required|min_length[3]|max_length[255]',
        ];

        $validationMessages = [
            'pesan' => [
                'required' => 'Judul wajib diisi.',
                'min_length' => 'Judul minimal berisi 3 huruf.',
                'max_length' => 'Judul maximal berisi 255 huruf.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the announcement data
        $broadcastModel = new BroadcastModel();
        $broadcastModel->save([
            'pesan' => $this->request->getPost('pesan'),
        ]);

        // Redirect with success message
        return redirect()->to('managebroadcast')->with('success', 'Broadcast berhasil diperbarui.');
    }
}
