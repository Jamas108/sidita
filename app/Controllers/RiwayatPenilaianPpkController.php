<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DptModel;
use App\Models\PekerjaanModel;
use App\Models\PenilaianPekerjaanModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

class RiwayatPenilaianPpkController extends BaseController
{
    public function index()
    {
        $pekerjaanModel = new PekerjaanModel();
        $penilaianModel = new PenilaianPekerjaanModel(); // Model for penilaian_pekerjaan table
        $userId = session()->get('user_id'); // Get the current user's ID

        // Fetch all jobs where the user has rated
        $dataPenilaian = $penilaianModel
            ->join('pekerjaan', 'pekerjaan.id = penilaian_pekerjaan.pekerjaan_id') // Join pekerjaan table to get job data
            ->where('penilaian_pekerjaan.users_id', $userId) // Filter by the current logged-in user's ID
            ->findAll(); // Retrieve all the data for this user

        // If no data found, you may want to handle this scenario
        if (empty($dataPenilaian)) {
            // Handle if no ratings are found for this user
            $dataPenilaian = [];
        }

        return view('ppk/riwayatpenilaian/index', ['dataPenilaian' => $dataPenilaian]);
    }

    public function detailPenilaian($penilaianId)
    {
        $penilaianModel = new PenilaianPekerjaanModel();

        // Ambil data penilaian berdasarkan id penilaian
        $dataPenilaian = $penilaianModel->getPenilaianDetail($penilaianId);

        // Jika data tidak ditemukan
        if (!$dataPenilaian) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Penilaian dengan id $penilaianId tidak ditemukan.");
        }

        // Kirim data ke view
        return view('ppk/riwayatpenilaian/show', ['dataPenilaian' => $dataPenilaian]);
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

        // Ambil data pekerjaan berdasarkan ID
        $pekerjaan = $pekerjaanModel->find($id);
        if (!$pekerjaan) {
            return redirect()->to('managereviewpekerjaan')->with('error', 'Data pekerjaan tidak ditemukan.');
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

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Footlight MT');
        $dompdf = new Dompdf($options);

        // Render view 'hasilpenilaianpdf.php' dengan data pekerjaan dan penilaian
        $html = view('ppk/reviewpekerjaan/hasilpenilaianpdf', [
            'pekerjaan' => $pekerjaan,
            'penilaian' => $penilaian, // Penilaian dari pengguna yang sedang login
            'dptData' => $dptData,
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
