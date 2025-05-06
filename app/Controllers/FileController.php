<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FileController extends BaseController
{
    // public function show($filename)
    // {
    //     // Tentukan jalur ke file
    //     $path = FCPATH . 'uploads/' . $filename;

    //     // Periksa apakah file ada
    //     if (file_exists($path)) {
    //         return $this->response->setHeader('Content-Type', 'application/pdf')
    //             ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
    //             ->setBody(readfile($path));
    //     } else {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found: ' . $filename);
    //     }
    // }

    public function show($filename)
    {
        // Tentukan jalur ke file
        $path = FCPATH . 'uploads/' . $filename;

        // Periksa apakah file ada
        if (file_exists($path)) {
            return $this->response->setHeader('Content-Type', 'application/pdf')
                ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                ->setBody(readfile($path));
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found: ' . $filename);
        }
    }

    public function showDokumenPekerjaan($filename)
    {
        // Tentukan jalur ke file
        $path = FCPATH . 'uploads/DokumenPekerjaan' . $filename;

        // Periksa apakah file ada
        if (file_exists($path)) {
            return $this->response->setHeader('Content-Type', 'application/pdf')
                ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                ->setBody(readfile($path));
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found: ' . $filename);
        }
    }
}
