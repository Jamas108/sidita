<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;
use App\Models\EventModel;
use App\Models\JenisKualifikasiModel;
use App\Models\JenisSpesifikasiModel;

class Home extends BaseController
{
    public function index(): string
    {
        // Load the model
        $eventModel = new EventModel();
        $pengumumanModel = new AnnouncementModel();
        $jenisKualifikasiModel = new JenisKualifikasiModel();
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();
    
        // Get current date
        $currentDate = date('Y-m-d');
    
        // Fetch events where status is not 'pending'
        $eventData = $eventModel->where('status !=', 'pending')->findAll();
        
        // Update event status if needed
        foreach ($eventData as $key => $event) {
            // If current date is after start date and event is not already completed
            if (strtotime($currentDate) > strtotime($event['tanggal_mulai']) && $event['status'] != 'Selesai') {
                // Update status to "Berjalan" in the database
                $eventModel->update($event['id'], ['status' => 'Berjalan']);
                
                // Also update it in our current dataset
                $eventData[$key]['status'] = 'Berjalan';
            }
        }
        
        $pengumumanData = $pengumumanModel->findAll();
    
        // Fetch all qualifications and specifications
        $data['jenisKualifikasi'] = $jenisKualifikasiModel->findAll();
        $data['jenisSpesifikasi'] = $jenisSpesifikasiModel->findAll();
    
        // Create associative arrays for mapping
        $kualifikasiMap = [];
        foreach ($data['jenisKualifikasi'] as $kualifikasi) {
            $kualifikasiMap[$kualifikasi['id']] = $kualifikasi['jenis_kualifikasi'];
        }
    
        $spesifikasiMap = [];
        foreach ($data['jenisSpesifikasi'] as $spesifikasi) {
            $spesifikasiMap[$spesifikasi['id']] = $spesifikasi['nama_jenis_spesifikasi'];
        }
    
        // Send the data to the view
        return view('welcome_page', [
            'eventData' => $eventData,
            'pengumumanData' => $pengumumanData,
            'kualifikasiMap' => $kualifikasiMap,
            'spesifikasiMap' => $spesifikasiMap,
        ]);
    }


    // public function login()
    // {
    //     return view('auth/login', ['title'=>'Login']);
    // }

    // public function daftar()
    // {
    //     return view('auth/daftar', ['title'=>'Daftar DPT']);
    // }

    // public function dashboard()
    // {
    //     return view('admin/dashboard', ['user'=>'Superadmin']);
    // }
}
