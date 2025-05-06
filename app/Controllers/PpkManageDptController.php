<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DptModel;
use App\Models\PengalamanPerusahaanModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class PpkManageDptController extends ResourceController
{
    public function index()
    {
        // Inisialisasi model DPT
        $dptModel = new DptModel();

        // Ambil data dengan status_dpt_id 1
        $dptData = $dptModel->getDptWithProfileEmail();

        // Kirim data ke view
        return view('ppk/managedpt/index', ['dptData' => $dptData]);
    }
    public function DetailDpt($id)
    {
        $dptModel = new DptModel();
        $pengalamanModel = new PengalamanPerusahaanModel();

        $dptDetail = $dptModel->getParticipantWithProfile($id);

        $profilPerusahaanId = $dptDetail['profil_perusahaan_id'];
        $dptDetail['experiences'] = $pengalamanModel->getExperiencesByProfileId($profilPerusahaanId);

        // Send data to the view
        return view('ppk/managedpt/show', ['dptDetail' => $dptDetail]);
    }
}
