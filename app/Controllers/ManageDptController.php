<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdministrasiDptModel;
use App\Models\DptModel;
use App\Models\EventModel;
use App\Models\KeuanganDptModel;
use App\Models\PekerjaanModel;
use App\Models\PengalamanDptModel;
use App\Models\PengalamanPerusahaanModel;
use App\Models\PenilaianPekerjaanModel;
use App\Models\ProfilePerusahaanDpt;
use App\Models\ProfilPerusahaanModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ManageDptController extends ResourceController
{
    public function index()
    {
        // Inisialisasi model DPT
        $dptModel = new DptModel();

        // Fetch data where status_dpt_id is 1 and join with profil_perusahaan
        $dptData = $dptModel->getDptByStatus(1);

        // Kirim data ke view
        return view('admin/managedpt/index', ['dptData' => $dptData]);
    }



    public function DetailDpt($id)
    {
        $dptModel = new DptModel();
        $pengalamanModel = new PengalamanPerusahaanModel();
        $pekerjaanModel = new PekerjaanModel();
        $penilaianModel = new PenilaianPekerjaanModel();

        // Mendapatkan detail DPT
        $dptDetail = $dptModel->getParticipantWithProfile($id);
        $profilPerusahaanId = $dptDetail['profil_perusahaan_id'];

        // Mendapatkan pengalaman perusahaan
        $dptDetail['experiences'] = $pengalamanModel->getExperiencesByProfileId($profilPerusahaanId);

        // Mendapatkan semua pekerjaan berdasarkan dpt_id
        $pekerjaanData = $pekerjaanModel->getPekerjaanByDptId($id);

        // Mendapatkan semua penilaian untuk setiap pekerjaan dan menyimpannya dalam pekerjaanData
        foreach ($pekerjaanData as &$pekerjaan) {
            $pekerjaanId = $pekerjaan['id'];
            // Ambil semua penilaian berdasarkan pekerjaan_id
            $pekerjaan['penilaian'] = $penilaianModel->where('pekerjaan_id', $pekerjaanId)->findAll();
        }

        // Menyimpan data pekerjaan beserta penilaiannya dalam dptDetail
        $dptDetail['pekerjaan'] = $pekerjaanData;

        // Mengirim data ke view
        return view('admin/managedpt/show', ['dptDetail' => $dptDetail]);
    }

    public function editProfilPerusahaan($profil_perusahaan_id)
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
        return view('admin/managedpt/edit/profilperusahaan', ['data' => $data]);
    }


    public function updateProfilPerusahaan($profilId)
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
        if ($ProfilPerusahaanModel->update($profilId, $profilData)) {
            // Jika berhasil update, redirect ke halaman detail profil perusahaan
            return redirect()->to(base_url('managedpt'))->with('success', 'Profil perusahaan berhasil diperbarui');
        } else {
            // Jika gagal update, redirect kembali dengan error
            return redirect()->back()->with('error', 'Gagal memperbarui profil perusahaan');
        }
    }

    public function editAdministrasiPerusahaan($id)
    {
        // Instansiasi model DPT untuk mengambil data DPT
        $dptModel = new DPTModel();

        // Ambil data DPT berdasarkan ID yang diberikan
        $data = $dptModel->find($id); // Mengambil data DPT berdasarkan id

        // Jika data DPT tidak ditemukan, tampilkan error
        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Peserta tidak ditemukan');
        }

        // Kirimkan data ke view
        return view('admin/managedpt/edit/administrasiPerusahaan', ['data' => $data]);
    }

    public function updateAdministrasiPerusahaan($id)
    {
        // Memuat model AdministrasiPerusahaanModel
        $administrasiModel = new DptModel();


        // Ambil data yang dikirim dari form
        $data = [
            'nama_pejabat_berwenang' => $this->request->getPost('nama_pejabat_berwenang'),
            'alamat_pejabat_berwenang' => $this->request->getPost('alamat_pejabat_berwenang'),
            'no_identitas_pejabat_berwenang' => $this->request->getPost('no_identitas_pejabat_berwenang'),
            'jenis_identitas_pejabat_berwenang' => $this->request->getPost('jenis_identitas_pejabat_berwenang'),
            'jabatan_pejabat_berwenang' => $this->request->getPost('jabatan_pejabat_berwenang'),
            'keterangan_file_formulir_keikutsertaan' => $this->request->getPost('keterangan_file_formulir_keikutsertaan'),
            'keterangan_file_surat_pernyataan' => $this->request->getPost('keterangan_file_surat_pernyataan'),
            'keterangan_file_pakta_integritas' => $this->request->getPost('keterangan_file_pakta_integritas'),
            'keterangan_file_akta_pendirian_perusahaan' => $this->request->getPost('keterangan_file_akta_pendirian_perusahaan'),
            'keterangan_file_surat_keterangan_domisili' => $this->request->getPost('keterangan_file_surat_keterangan_domisili'),
            'keterangan_file_nib' => $this->request->getPost('keterangan_file_nib'),
            'keterangan_file_siup' => $this->request->getPost('keterangan_file_siup'),
        ];

        // Daftar nama file yang diupload
        $fileFields = [
            'file_formulir_keikutsertaan',
            'file_surat_pernyataan',
            'file_pakta_integritas',
            'file_akta_pendirian_perusahaan',
            'file_surat_keterangan_domisili',
            'file_nib',
            'file_siup',
        ];

        // Memuat model untuk mendapatkan data lama
        $administrasiModel = new DptModel();
        $existingData = $administrasiModel->find($id);

        // Proses setiap file upload
        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Hapus file lama jika ada
                if (!empty($existingData[$field]) && file_exists(FCPATH . $existingData[$field])) {
                    unlink(FCPATH . $existingData[$field]); // Hapus file lama
                }

                // Generate a new random file name
                $newName = $file->getRandomName();

                // Move the file to the 'pengumuman' directory
                $file->move(FCPATH . 'uploads/filedpt', $newName);

                // Store the new file path
                $filePath = '/uploads/filedpt/' . $newName;

                // Update the file path in the data array
                $data[$field] = $filePath;
            }
        }




        // Update data ke database
        $update = $administrasiModel->update($id, $data);

        if ($update) {
            // Redirect setelah update berhasil
            return redirect()->to('managedpt')->with('success', 'Data berhasil diperbarui');
        } else {
            // Jika update gagal
            return redirect()->back()->with('error', 'Gagal memperbarui data');
        }
    }

    public function editKeuanganPerusahaan($id)
    {
        // Instansiasi model DPT untuk mengambil data DPT
        $dptModel = new DPTModel();

        // Ambil data DPT berdasarkan ID yang diberikan
        $data = $dptModel->find($id); // Mengambil data DPT berdasarkan id

        // Jika data DPT tidak ditemukan, tampilkan error
        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Peserta tidak ditemukan');
        }

        // Kirimkan data ke view
        return view('admin/managedpt/edit/keuanganperusahaan', ['data' => $data]);
    }

    public function updateKeuanganPerusahaan($id)
    {
        $dptModel = new DptModel();

        // Ambil data yang dikirim dari form
        $data = [
            'keterangan_file_laporan_keuangan' => $this->request->getPost('keterangan_file_laporan_keuangan'),
            'keterangan_file_rekening_koran_3_bulan' => $this->request->getPost('keterangan_file_rekening_koran_3_bulan'),
            'keterangan_file_sppkp' => $this->request->getPost('keterangan_file_sppkp'),
            'keterangan_file_npwp' => $this->request->getPost('keterangan_file_npwp'),
            'keterangan_file_lapor_tahunan_pajak' => $this->request->getPost('keterangan_file_lapor_tahunan_pajak'),
        ];


        // Daftar nama file yang diupload
        $fileFields = [
            'file_laporan_keuangan',
            'file_rekening_koran_3_bulan',
            'file_sppkp',
            'file_npwp',
            'file_lapor_tahunan_pajak'
        ];

        // Memuat model untuk mendapatkan data lama
        $administrasiModel = new DptModel();
        $existingData = $administrasiModel->find($id);

        // Proses setiap file upload
        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Hapus file lama jika ada
                if (!empty($existingData[$field]) && file_exists(FCPATH . $existingData[$field])) {
                    unlink(FCPATH . $existingData[$field]); // Hapus file lama
                }

                // Generate a new random file name
                $newName = $file->getRandomName();

                // Move the file to the 'pengumuman' directory
                $file->move(FCPATH . 'uploads/filedpt', $newName);

                // Store the new file path
                $filePath = '/uploads/filedpt/' . $newName;

                // Update the file path in the data array
                $data[$field] = $filePath;
            }
        }

        // Update data ke database
        $update = $administrasiModel->update($id, $data);

        if ($update) {
            // Redirect setelah update berhasil
            return redirect()->to('managedpt')->with('success', 'Data berhasil diperbarui');
        } else {
            // Jika update gagal
            return redirect()->back()->with('error', 'Gagal memperbarui data');
        }
    }

    public function editPengalaman($id)
    {
        $pengalamanModel = new PengalamanPerusahaanModel();

        // Ambil data pengalaman berdasarkan ID
        $pengalaman = $pengalamanModel->find($id);

        // Pastikan pengalaman ditemukan
        if (!$pengalaman) {
            return redirect()->to('/managedpt')->with('error', 'Pengalaman tidak ditemukan.');
        }

        // Kirim data pengalaman ke view untuk form edit
        return view('admin/managedpt/pengalamanperusahaan', ['pengalaman' => $pengalaman]);
    }

    public function updatePengalaman($id)
    {
        $pengalamanModel = new PengalamanPerusahaanModel();

        // Ambil data yang dikirimkan oleh form
        $data = [
            'pengalaman' => $this->request->getPost('pengalaman'),
        ];

        // Validasi data sebelum update (optional)
        if (!$data['pengalaman']) {
            return redirect()->back()->with('error', 'Pengalaman tidak boleh kosong.');
        }

        // Update data pengalaman di database
        $pengalamanModel->update($id, $data);

        // Redirect ke halaman detail DPT atau halaman lainnya setelah update berhasil
        return redirect()->to('/dpt')->with('success', 'Pengalaman berhasil diperbarui.');
    }



    public function create() {}
    public function update($id = null)
    {
        // Memperbarui data
    }

    public function delete($id = null)
    {
        // Menghapus data
    }

    //PENERIMAAN DPT
    public function indexPenerimaanDpt()
    {
        return view('admin/managedpt/penerimaandpt/index', ['user' => 'Superadmin']);
    }
}
