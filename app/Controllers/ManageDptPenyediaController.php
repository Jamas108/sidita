<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DptModel;
use App\Models\PengalamanPerusahaanModel;
use App\Models\ProfilPerusahaanModel;
use CodeIgniter\HTTP\ResponseInterface;

class ManageDptPenyediaController extends BaseController
{
    public function index()
    {
        // Ambil email perusahaan yang sedang login
        $email = session()->get('email');

        // Load model ProfilPerusahaan
        $profilPerusahaanModel = new ProfilPerusahaanModel();
        $profilPerusahaan = $profilPerusahaanModel->where('email', $email)->first();

        if (!$profilPerusahaan) {
            // Jika profil perusahaan tidak ditemukan, tampilkan pesan error atau redirect
            return redirect()->to('/login')->with('error', 'Profil perusahaan tidak ditemukan.');
        }

        // Ambil ID profil perusahaan
        $profilPerusahaanId = $profilPerusahaan['profil_perusahaan_id'];

        // Load model Dpt
        $DPTModel = new DptModel();

        // Ambil satu data DPT berdasarkan profil_perusahaan_id
        $dptData = $DPTModel->where('profil_perusahaan_id', $profilPerusahaanId)->first();

        if (empty($dptData)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data DPT tidak ditemukan untuk perusahaan ini.');
        }

        // Load model PengalamanPerusahaan
        $pengalamanModel = new PengalamanPerusahaanModel();

        // Ambil data pengalaman berdasarkan profil_perusahaan_id
        $experiences = $pengalamanModel->where('profil_perusahaan_id', $profilPerusahaanId)->findAll();

        // Kirim data DPT dan pengalaman ke view
        return view('penyedia_tetap/managedpt/index', [
            'dptData' => $dptData,
            'profilPerusahaan' => $profilPerusahaan,
            'experiences' => $experiences
        ]);
    }
    public function detailPenyedia($id)
    {
        $dptModel = new DptModel();
        $pengalamanModel = new PengalamanPerusahaanModel();

        // Get participant data along with company profile
        $data['participant'] = $dptModel->getParticipantWithProfile($id);

        if (!$data['participant']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Peserta tidak ditemukan');
        }

        // Retrieve profil_perusahaan_id from participant data
        $profilPerusahaanId = $data['participant']['profil_perusahaan_id'];

        // Get experiences related to the company profile
        $data['experiences'] = $pengalamanModel->getExperiencesByProfileId($profilPerusahaanId);

        return view('penyedia_tetap/managedpt/detailpendaftar', $data);
    }

    public function editDataPenyedia($profil_perusahaan_id)
    {
        // Instansiasi model ProfilPerusahaanModel
        $profilPerusahaanModel = new ProfilPerusahaanModel();

        // Ambil data profil perusahaan berdasarkan ID
        $data['profilPerusahaan'] = $profilPerusahaanModel->find($profil_perusahaan_id);

        // Jika profil perusahaan tidak ditemukan, tampilkan error
        if (!$data['profilPerusahaan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Profil perusahaan tidak ditemukan');
        }

        // Kirimkan data ke view
        return view('penyedia_tetap/managedpt/edit', ['data' => $data]);
    }
    public function updateDataPenyedia($id)
    {
        // Load model ProfilPerusahaanModel
        $ProfilPerusahaanModel = new ProfilPerusahaanModel();

        // Ambil data yang dikirim dari form
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

        // Update profil perusahaan
        if ($ProfilPerusahaanModel->update($id, $profilData)) {
            // Jika berhasil update, redirect ke halaman detail profil perusahaan
            return redirect()->to(base_url('managedptpenyedia'))->with('success', 'Profil perusahaan berhasil diperbarui');
        } else {
            // Jika gagal update, redirect kembali dengan error
            return redirect()->back()->with('error', 'Gagal memperbarui profil perusahaan');
        }
    }
}
