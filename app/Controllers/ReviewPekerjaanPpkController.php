<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DptModel;
use App\Models\PekerjaanModel;
use App\Models\PenilaianPekerjaanModel;
use App\Models\ProfilPerusahaanModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\HTTP\ResponseInterface;

class ReviewPekerjaanPpkController extends BaseController
{
    public function index()
    {
        $pekerjaanModel = new PekerjaanModel();
        $penilaianModel = new PenilaianPekerjaanModel();
        $userModel = new UserModel(); // Add this line to use the UserModel
        $userId = session()->get('user_id');

        // Get the current user's details
        $currentUser = $userModel->find($userId);

        // Get the PPK name from nama_penyedia field
        $ppkName = $currentUser['nama_penyedia'];

        // Fetch only jobs where ppk field matches the current user's nama_penyedia
        $dataPekerkjaan = $pekerjaanModel->where('ppk', $ppkName)->findAll();

        // Check if the user has rated each job
        foreach ($dataPekerkjaan as &$data) {
            $hasRated = $penilaianModel
                ->where('users_id', $userId)
                ->where('pekerjaan_id', $data['id'])
                ->first();

            $data['hasRated'] = !empty($hasRated);
        }

        return view('ppk/reviewpekerjaan/index', ['dataPekerkjaan' => $dataPekerkjaan]);
    }

    public function editPekerjaanPpk($id)
    {
        $pekerjaanModel = new PekerjaanModel();
        $dptModel = new DptModel();

        // Ambil data pekerjaan berdasarkan ID
        $pekerjaan = $pekerjaanModel->find($id);
        // Ambil data dengan status_dpt_id 1
        $dptData = $dptModel->getDptWithProfileEmail();

        // Periksa apakah data pekerjaan ditemukan
        if (!$pekerjaan) {
            return redirect()->to('managepekerjaan')->with('error', 'Data pekerjaan tidak ditemukan.');
        }

        return view('ppk/reviewpekerjaan/edit', [
            'pekerjaan' => $pekerjaan,
            'dptData' => $dptData,

        ]);
    }

    public function updatePekerjaanPpk($id)
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
        return redirect()->to('managereviewpekerjaan')->with('success', 'Data pekerjaan berhasil diperbarui.');
    }



    public function nilaiPekerjaan($id)
    {
        $user_id = session()->get('user_id');

        $pekerjaanModel = new PekerjaanModel();
        $dptModel = new DptModel();
        $userModel = new UserModel();
        // Perlu menambahkan model profil perusahaan
        $profilPerusahaanModel = new ProfilPerusahaanModel();

        // Ambil data pekerjaan berdasarkan ID
        $pekerjaan = $pekerjaanModel->find($id);
        $user = $userModel->find($user_id);

        // Ambil data dpt spesifik berdasarkan dpt_id dari pekerjaan
        $dpt = $dptModel->find($pekerjaan['dpt_id']);

        // Ambil data profil perusahaan berdasarkan profil_perusahaan_id dari dpt
        $profilPerusahaan = null;
        if ($dpt) {
            $profilPerusahaan = $profilPerusahaanModel->find($dpt['profil_perusahaan_id']);
        }

        // Ambil data dengan status_dpt_id 1 (tetap pertahankan jika diperlukan di tempat lain)
        $dptData = $dptModel->getDptWithProfileEmail();

        if (!$pekerjaan) {
            return redirect()->to('managereviewpekerjaan')->with('error', 'Data pekerjaan tidak ditemukan.');
        }

        // Menghitung selisih tanggal
        $tanggalKontrak = Time::parse($pekerjaan['tanggal_kontrak']);
        $akhirKontrak = Time::parse($pekerjaan['akhir_kontrak']);

        // Menghitung selisih bulan dan hari
        $selisih = $tanggalKontrak->difference($akhirKontrak);
        $selisihBulan = $selisih->getMonths();
        $sisaHari = $selisih->getDays() % 30;

        // Format hasil
        $jangkaWaktu = "";
        if ($selisihBulan > 0) {
            $jangkaWaktu .= $selisihBulan . " bulan";
        }
        if ($sisaHari > 0) {
            $jangkaWaktu .= ($jangkaWaktu ? " " : "") . $sisaHari . " hari";
        }

        return view('ppk/reviewpekerjaan/nilai', [
            'pekerjaan' => $pekerjaan,
            'dptData' => $dptData,
            'profilPerusahaan' => $profilPerusahaan,
            'jangkaWaktu' => $jangkaWaktu,
            'user' => $user
        ]);
    }

    public function store($id)
    {
        // Inisialisasi model
        $pekerjaanModel = new PekerjaanModel();
        $penilaianPekerjaanModel = new PenilaianPekerjaanModel();

        // Ambil data pekerjaan berdasarkan ID
        $pekerjaan = $pekerjaanModel->find($id);
        if (!$pekerjaan) {
            return redirect()->to('managereviewpekerjaan')->with('error', 'Data pekerjaan tidak ditemukan.');
        }

        $data = [
            'pekerjaan_id' => $id,
            'nama_penilai' => $this->request->getPost('nama_penilai'),
            'nip_penilai' => $this->request->getPost('nip_penilai'),
            'posisi_penilai' => $this->request->getPost('posisi_penilai'),
            'durasi' => $this->request->getPost('durasi'),
            'skor_kinerja_kualitas_dan_kuantitas_pekerjaan' => $this->request->getPost('skor_kinerja_kualitas_dan_kuantitas_pekerjaan'),
            'nilai_kinerja_kualitas_dan_kuantitas_pekerjaan' => $this->request->getPost('nilai_kinerja_kualitas_dan_kuantitas_pekerjaan'),
            'skor_kinerja_biaya' => $this->request->getPost('skor_kinerja_biaya'),
            'nilai_kinerja_biaya' => $this->request->getPost('nilai_kinerja_biaya'),
            'skor_kinerja_waktu' => $this->request->getPost('skor_kinerja_waktu'),
            'nilai_kinerja_waktu' => $this->request->getPost('nilai_kinerja_waktu'),
            'skor_kinerja_layanan' => $this->request->getPost('skor_kinerja_layanan'),
            'nilai_kinerja_layanan' => $this->request->getPost('nilai_kinerja_layanan'),
            'nilai_total_kinerja' => $this->request->getPost('nilai_total_kinerja'),
            'catatan' => $this->request->getPost('catatan'),
            'users_id' => $this->request->getPost('users_id'),
        ];

        if ($penilaianPekerjaanModel->insert($data)) {
            return redirect()->to('managereviewpekerjaan')->with('success', 'Penilaian pekerjaan berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan penilaian pekerjaan.')->withInput();
        }
    }

    public function downloadPdf($id, $userId)
    {
        // Pastikan session sudah terambil
        $sessionUserId = session()->get('user_id');



        // Jika $userId tidak sama dengan user yang login, beri pesan error
        if ($sessionUserId != $userId) {
            return redirect()->to('managereviewpekerjaan')->with('error', 'Anda tidak memiliki akses untuk mengunduh PDF ini.');
        }

        // Inisialisasi model
        $pekerjaanModel = new PekerjaanModel();
        $penilaianModel = new PenilaianPekerjaanModel();
        $dptModel = new DptModel();
        $dptData = $dptModel->getDptWithProfileEmail();
        $profilPerusahaanModel = new ProfilPerusahaanModel();

        // Ambil data pekerjaan berdasarkan ID
        $pekerjaan = $pekerjaanModel->find($id);
        if (!$pekerjaan) {
            return redirect()->to('managereviewpekerjaan')->with('error', 'Data pekerjaan tidak ditemukan.');
        }

        $dpt = $dptModel->find($pekerjaan['dpt_id']);

        $profilPerusahaan = null;
        if ($dpt) {
            $profilPerusahaan = $profilPerusahaanModel->find($dpt['profil_perusahaan_id']);
        }

        // Ambil penilaian berdasarkan pekerjaan_id dan users_id
        $penilaian = $penilaianModel
            ->where('pekerjaan_id', $id)    // Filter berdasarkan pekerjaan_id
            ->where('users_id', $userId)    // Filter berdasarkan users_id
            ->first(); // Ambil penilaian yang pertama ditemukan

        // Jika penilaian tidak ditemukan, beri pesan error
        if (!$penilaian) {
            return redirect()->to('managereviewpekerjaan')->with('error', 'Penilaian pekerjaan belum dilakukan oleh Anda.');
        }

        // Calculate the duration if start and end dates are available
        if (!empty($pekerjaan['tanggal_kontrak']) && !empty($pekerjaan['akhir_kontrak'])) {
            // Convert to DateTime objects
            $startDate = new \DateTime($pekerjaan['tanggal_kontrak']);
            $endDate = new \DateTime($pekerjaan['akhir_kontrak']);

            // Calculate the difference
            $interval = $startDate->diff($endDate);

            // Format the duration as needed, e.g., days
            $durasi = $interval->format('%a Hari'); // You can also use other formats like %y for years, %m for months, etc.
        } else {
            $durasi = 'Tunggu data tanggal'; // Handle the case when start or end date is missing
        }


        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Footlight MT');
        $dompdf = new Dompdf($options);

        // Render view 'hasilpenilaianpdf.php' dengan data pekerjaan dan penilaian
        $html = view('ppk/reviewpekerjaan/hasilpenilaianpdf', [
            'pekerjaan' => $pekerjaan,
            'penilaian' => $penilaian, // Penilaian dari pengguna yang sedang login
            'dptData' => $dptData,
            'durasi' => $durasi,
            'profilPerusahaan' => $profilPerusahaan,
        ]);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Unduh PDF dengan nama file yang sesuai
        $dompdf->stream("Laporan_Pekerjaan_{$pekerjaan['id']}_{$userId}.pdf", ["Attachment" => 1]);
    }
}
