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

        // Fetch events where status is not 'pending'
        $eventData = $eventModel->where('status !=', 'pending')->findAll();
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

        // Map event data to include names instead of IDs
        foreach ($eventData as &$event) {
            $event['jenis_kualifikasi'] = isset($kualifikasiMap[$event['jenis_kualifikasi_id']]) ? $kualifikasiMap[$event['jenis_kualifikasi_id']] : 'Tidak Diketahui';
            $event['jenis_spesifikasi'] = isset($spesifikasiMap[$event['jenis_spesifikasi_id']]) ? $spesifikasiMap[$event['jenis_spesifikasi_id']] : 'Tidak Diketahui';
        }

        // Send the data to the view
        return view('welcome_page', [
            'eventData' => $eventData,
            'pengumumanData' => $pengumumanData, // Pass the data to the view
            'kualifikasiMap' => $kualifikasiMap, // Send kualifikasiMap to the view
            'spesifikasiMap' => $spesifikasiMap, // Send spesifikasiMap to the view
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
