<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnnouncementModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ManageAnnounceController extends ResourceController
{
    public function index()
    {
        $announcementModel = new AnnouncementModel();
        $data['announcements'] = $announcementModel->findAll();  // Get all announcements
        return view('admin/manageannounce/index', $data);  // Pass the data to the view
    }
    public function showAnnouncement($id)
    {
        $announcementModel = new AnnouncementModel();

        $announcement = $announcementModel->getAnnouncementById($id);

        return view('admin/manageannounce/show', [
            'announcement' => $announcement
        ]);
    }

    public function create()
    {
        return view('admin/manageannounce/create', ['user' => 'Superadmin']);
    }
    public function store()
    {
        $validationRules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'deskripsi' => 'required|min_length[3]',
        ];

        $validationMessages = [
            'judul' => [
                'required' => 'Judul wajib diisi.',
                'min_length' => 'Judul minimal berisi 3 huruf.',
                'max_length' => 'Judul maximal berisi 255 huruf.',
            ],
            'deskripsi' => [
                'required' => 'Deskripsi wajib diisi.',
                'min_length' => 'deskripsi minimal berisi 3 huruf.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        // Process the file upload
        $file = $this->request->getFile('dokumen');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Generate a random file name
            $newName = $file->getRandomName();

            // Move the file to the 'pengumuman' directory
            $file->move(FCPATH . 'uploads/pengumuman', $newName);

            // Store the file path
            $filePath = '/uploads/pengumuman/' . $newName;
        } else {
            // Handle case where no file is uploaded or an error occurs
            $filePath = null;
        }
        // Save the announcement data
        $announcementModel = new AnnouncementModel();
        $announcementModel->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'dokumen' => $filePath,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Redirect with success message
        return redirect()->to('manageannouncement')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function editAnnouncement($id)
    {
        // Load the model to fetch data from the database
        $announcementModel = new \App\Models\AnnouncementModel();

        // Fetch the announcement based on the ID
        $announcement = $announcementModel->find($id);

        // If the announcement doesn't exist, redirect or show an error
        if (!$announcement) {
            return redirect()->to('/manageannouncement')->with('error', 'Pengumuman tidak ditemukan!');
        }

        // Pass the announcement data to the view
        return view('admin/manageannounce/edit', ['announcement' => $announcement]);
    }

    public function updateAnnouncement($id)
    {
        // Load the model to update data
        $announcementModel = new \App\Models\AnnouncementModel();

        // Retrieve the existing announcement data
        $existingAnnouncement = $announcementModel->find($id);

        if (!$existingAnnouncement) {
            return redirect()->to('/manageannouncement')->with('error', 'Pengumuman tidak ditemukan.');
        }

        // Validation rules and messages
        $validationRules = [
            'judul' => 'required|min_length[3]|max_length[255]',
            'deskripsi' => 'required|min_length[3]',
        ];

        $validationMessages = [
            'judul' => [
                'required' => 'Judul wajib diisi.',
                'min_length' => 'Judul minimal berisi 3 huruf.',
                'max_length' => 'Judul maksimal berisi 255 huruf.',
            ],
            'deskripsi' => [
                'required' => 'Deskripsi wajib diisi.',
                'min_length' => 'Deskripsi minimal berisi 3 huruf.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get form data
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        // Process the file upload
        $file = $this->request->getFile('dokumen');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Generate a new random file name
            $newName = $file->getRandomName();

            // Move the file to the 'pengumuman' directory
            $file->move(FCPATH . 'uploads/pengumuman', $newName);

            // Store the new file path
            $filePath = '/uploads/pengumuman/' . $newName;

            // Delete the old file if it exists
            if (!empty($existingAnnouncement['dokumen']) && file_exists(FCPATH . $existingAnnouncement['dokumen'])) {
                unlink(FCPATH . $existingAnnouncement['dokumen']);
            }

            // Update the file path in the data array
            $data['dokumen'] = $filePath;
        }

        // Update the record in the database
        $announcementModel->update($id, $data);

        // Redirect back to the announcements list with a success message
        return redirect()->to('/manageannouncement')->with('success', 'Pengumuman berhasil diperbarui!');
    }



    public function deleteAnnouncement($id)
    {
        // Check if the ID is valid
        if ($id === null) {
            return redirect()->to('/manageannouncement')->with('error', 'ID Pengumuman tidak ditemukan!');
        }

        // Load the model
        $announcementModel = new \App\Models\AnnouncementModel();

        // Check if the announcement exists
        $announcement = $announcementModel->find($id);
        if (!$announcement) {
            return redirect()->to('/manageannouncement')->with('error', 'Pengumuman tidak ditemukan!');
        }

        // Delete the announcement
        if ($announcementModel->delete($id)) {
            // Redirect to the announcements list with success message
            return redirect()->to('/manageannouncement')->with('success', 'Pengumuman berhasil dihapus!');
        } else {
            // If deletion fails, show an error message
            return redirect()->to('/manageannouncement')->with('error', 'Gagal menghapus pengumuman!');
        }
    }
}
