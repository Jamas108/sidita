<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnnouncementModel;
use App\Models\BroadcastModel;
use CodeIgniter\HTTP\ResponseInterface;

class PenyediaController extends BaseController
{
    public function index()
    {
        $broadcastModel = new BroadcastModel();
        $data['broadcast'] = $broadcastModel->findAll();
        return view('penyedia_tetap/dashboard', $data);
    }
}
