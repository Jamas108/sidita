<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DptModel;
use App\Models\EventModel;
use App\Models\JenisKualifikasiModel;
use App\Models\JenisSpesifikasiModel;
use App\Models\PengalamanPerusahaanModel;
use App\Models\ProfilPerusahaanModel;
use App\Models\UserModel;
use CodeIgniter\Email\Email;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class ManagePenerimaanDptController extends BaseController
{


    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
        // This correctly loads the email service
    }

    public function index()
    {
        // Load the model
        $eventModel = new EventModel();
        $jenisKualifikasiModel = new JenisKualifikasiModel();
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();

        // Fetch all events from the model
        $eventData = $eventModel->findAll();

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
        return view('admin/penerimaandpt/index', [
            'eventData' => $eventData, // Pass the data to the view
            'kualifikasiMap' => $kualifikasiMap, // Send kualifikasiMap to the view
            'spesifikasiMap' => $spesifikasiMap, // Send spesifikasiMap to the view
        ]);
    }

    public function DetailEvent($id)
    {
        $eventModel = new EventModel();

        // Retrieve the event along with the related jenis kualifikasi and jenis spesifikasi
        $event = $eventModel->getEventWithDetails($id);

        // Check if the event exists
        if (!$event) {
            return redirect()->to('/penerimaandpt')->with('error', 'Event not found.');
        }

        // Pass the event data to the view
        return view('admin/penerimaandpt/show', [
            'user' => 'Superadmin',
            'event' => $event
        ]);
    }





    public function getSpesifikasiByKualifikasi($id)
    {
        $jenisSpesifikasiModel = new JenisSpesifikasiModel();
        $spesifikasi = $jenisSpesifikasiModel->where('jenis_kualifikasi_id', $id)->findAll();
        return $this->response->setJSON($spesifikasi);
    }

    public function create()
    {
        // Memanggil model
        $jenisKualifikasi = new JenisKualifikasiModel();

        // Mengambil data jenis spesifikasi dari model
        $jenisKualifikasi = $jenisKualifikasi->getAllJenisKualifikasi();

        // Mengirim data ke view
        return view('admin/penerimaandpt/create', [
            'jenisKualifikasi' => $jenisKualifikasi
        ]);
        return view('admin/penerimaandpt/create', ['user' => 'Superadmin']);
    }
    public function store()
    {
        // Load validation service
        $validation = \Config\Services::validation();

        // Define validation rules
        $validationRules = [
            'nama_kegiatan' => 'required',
            'tanggal_mulai' => 'required|valid_date',
            'tanggal_selesai' => 'required|valid_date',
            'kualifikasi_usaha' => 'required',
            'kualifikasi_pengadaan' => 'required',
            'spesifikasi' => 'required',
            'dokumen' => 'uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf,doc,docx]',
            'status' => 'required',
        ];

        $validationMessages = [
            'nama_kegiatan' => [
                'required' => 'Nama kegiatan wajib diisi.',
            ],
            'tanggal_mulai' => [
                'required' => 'Tanggal mulai wajib diisi.',
                'valid_date' => 'Format tanggal tidak valid.',
            ],
            'tanggal_selesai' => [
                'required' => 'Tanggal selesai wajib diisi.',
                'valid_date' => 'Format tanggal tidak valid.',
            ],
            'kualifikasi_usaha' => [
                'required' => 'Kualifikasi usaha wajib diisi.',
            ],
            'kualifikasi_pengadaan' => [
                'required' => 'Kualifikasi pengadaan wajib diisi.',
            ],
            'spesifikasi' => [
                'required' => 'Spesifikasi wajib diisi.',
            ],
            'dokumen' => [
                'uploaded' => 'Dokumen wajib diisi',
                'max_size' => 'File maksimum dokumen 2MB.',
                'ext_in' => 'Format dokumen harus berupa PDF, Doc atau Docx.',
            ],
            'status' => [
                'required' => 'Status wajib diisi.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Prepare data to be saved
        $data = [
            'nama_event' => $this->request->getPost('nama_kegiatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'kualifikasi_usaha' => $this->request->getPost('kualifikasi_usaha'),
            'jenis_kualifikasi_id' => $this->request->getPost('kualifikasi_pengadaan'),
            'jenis_spesifikasi_id' => $this->request->getPost('spesifikasi'),
            'status' => $this->request->getPost('status'),
        ];

        // Handle file upload if valid
        if ($this->request->getFile('dokumen')->isValid()) {
            $file = $this->request->getFile('dokumen');
            $fileName = $file->getRandomName();
            // Save the file in the 'uploads/dokumenevent/' directory
            $file->move('uploads/dokumenevent/', $fileName);
            $data['dokumen'] = $fileName;
        }

        // Save data to the database
        $eventModel = new EventModel();
        $eventModel->save($data);

        // Redirect with success message
        return redirect()->to('/managepenerimaandpt')->with('success', 'Event berhasil ditambahkan.');
    }


    public function editBeritaAcaraEvent($id)
    {

        $eventModel = new EventModel();

        // Fetch the announcement based on the ID
        $event = $eventModel->find($id);
        return view('admin/penerimaandpt/editberitaacara', ['event' => $event]);
    }

    public function updateBeritaAcaraEvent($id)
    {
        // Load the model to update data
        $eventModel = new EventModel();

        // Validasi input
        $validationRules = [
            'berita_acara' => [
                'label' => 'Berita Acara',
                'rules' => 'uploaded[berita_acara]|mime_in[berita_acara,application/pdf]|max_size[berita_acara,2048]',
                'errors' => [
                    'uploaded' => 'File berita acara harus diunggah.',
                    'mime_in' => 'File harus dalam format PDF.',
                    'max_size' => 'Ukuran file maksimal adalah 2MB.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file yang diunggah
        $beritaAcaraFile = $this->request->getFile('berita_acara');

        // Periksa apakah file valid
        if ($beritaAcaraFile->isValid() && !$beritaAcaraFile->hasMoved()) {
            // Generate nama file baru
            $newFileName = $beritaAcaraFile->getRandomName();

            // Pindahkan file ke folder di dalam public
            $uploadPath = FCPATH . 'uploads/berita_acara_event'; // Lokasi folder public/uploads/berita_acara
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true); // Buat folder jika belum ada
            }
            $beritaAcaraFile->move($uploadPath, $newFileName);

            // Ambil data lama untuk menghapus file lama (opsional)
            $event = $eventModel->find($id);
            if ($event && isset($event['berita_acara'])) {
                $oldFile = FCPATH . 'uploads/berita_acara/' . $event['berita_acara'];
                if (is_file($oldFile)) {
                    unlink($oldFile); // Hapus file lama jika ada
                }
            }

            // Perbarui data di database
            $eventModel->update($id, [
                'berita_acara' => $newFileName
            ]);

            return redirect()->to(base_url('managepenerimaandpt'))->with('success', 'Berita acara berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file.');
    }

    public function updateStatusEvent($id)
    {
        // Get the new status from the form submission
        $status = $this->request->getPost('status');

        // Update the event status in the database
        $eventModel = new EventModel();
        $eventModel->update($id, ['status' => $status]);

        // Redirect back to the event management page with a success message
        return redirect()->to('/managepenerimaandpt')->with('success', 'Status Event berhasil diubah.');
    }

    public function editEvent($id)
    {
        // Memanggil model EventModel
        $eventModel = new \App\Models\EventModel();
        $spesifikasiModel = new \App\Models\JenisSpesifikasiModel();
        $spesifikasiList = $spesifikasiModel->getAllJenisSpesifikasi();

        // Mengambil data event berdasarkan ID
        $event = $eventModel->find($id);

        if (!$event) {
            // Jika data event tidak ditemukan, kembalikan ke halaman daftar dengan pesan error
            return redirect()->to('/managepenerimaandpt')->with('error', 'Event tidak ditemukan.');
        }

        // Memanggil model JenisKualifikasiModel
        $jenisKualifikasiModel = new \App\Models\JenisKualifikasiModel();

        // Mengambil data jenis kualifikasi
        $jenisKualifikasiData = $jenisKualifikasiModel->getAllJenisKualifikasi();

        // Pastikan data `kualifikasi_pengadaan` dan `spesifikasi` dikirim ke view
        return view('admin/penerimaandpt/edit', [
            'event' => $event, // Data event yang akan diedit
            'jenisKualifikasi' => $jenisKualifikasiData,
            'spesifikasiList' => $spesifikasiList, // Data jenis kualifikasi
        ]);
    }


    public function updateEvent($id)
    {
        $data = [
            'nama_event' => $this->request->getPost('nama_kegiatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'kualifikasi_usaha' => $this->request->getPost('kualifikasi_usaha'),
            'jenis_kualifikasi_id' => $this->request->getPost('kualifikasi_pengadaan'),
            'jenis_spesifikasi_id' => $this->request->getPost('spesifikasi'),
            'status' => $this->request->getPost('status'),
        ];

        // Handle file upload if new file is provided
        $file = $this->request->getFile('dokumen');
        if ($file->isValid()) {
            // Generate a random file name
            $fileName = $file->getRandomName();
            // Move the file to the uploads directory
            $file->move('uploads/dokumenevent/', $fileName);
            // Update file path in the data array
            $data['dokumen'] = $fileName;
        }

        $fileberitaacara = $this->request->getFile('berita_acara');
        if ($fileberitaacara->isValid()) {
            // Generate a random file name
            $fileName = $fileberitaacara->getRandomName();
            // Move the file to the uploads directory
            $fileberitaacara->move('uploads/berita_acara_event/', $fileName);
            // Update file path in the data array
            $data['berita_acara'] = $fileName;
        }


        // Update the event record in the database
        $eventModel = new \App\Models\EventModel();
        $eventModel->update($id, $data);

        // Redirect back with success message
        session()->setFlashdata('success', 'Event updated successfully!');
        return redirect()->to(base_url('managepenerimaandpt'));
    }





    public function update($id = null)
    {
        // Memperbarui data
    }

    public function delete($id = null)
    {
        // Menghapus data
    }

    //CONTROLER UNTUK HANDLE PENERIMAAN DPT
    public function participant($id)
    {
        $DPTModel = new DptModel();

        // Fetch participant data including company profile and status name
        $ParticipantData = $DPTModel->getParticipantsWithProfileByEventId($id);

        // Prepare data for the view
        $data = [
            'eventid' => $id,
            'ParticipantData' => $ParticipantData,
        ];

        return view('admin/penerimaandpt/listparticipant', $data);
    }

    public function editStatusParticipant($id)
    {
        $DPTModel = new DptModel();

        // Fetch participant data including company profile and status name
        $ParticipantData = $DPTModel->getParticipantsWithProfileByEventId($id);

        // Prepare data for the view
        $data = [
            'eventid' => $id,
            'ParticipantData' => $ParticipantData,
            'statusOptions' => [
                1 => 'Status 1',
                2 => 'Status 2',
                3 => 'Status 3', // Example of statuses
            ]
        ];

        return view('admin/penerimaandpt/editstatusparticipant', $data);
    }

    public function updateStatusParticipant($id)
    {
        $DPTModel = new DptModel();

        // Get new status from form
        $newStatus = $this->request->getPost('new_status');

        // Update participant status
        $DPTModel->update($id, ['status_dpt_id' => $newStatus]);

        // Redirect to the list page after update
        return redirect()->to(base_url('admin/penerimaandpt'));
    }

    public function DetailPendaftar($id)
    {
        $dptModel = new DPTModel();
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

        return view('admin/penerimaandpt/detailpendaftar', $data);
    }

    public function acceptParticipant($id)
    {
        $dptModel = new DptModel();
        $participantData = $dptModel->getParticipantWithProfile($id);

        if (!$participantData) {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        // Ambil ID profil perusahaan
        $profilPerusahaanId = $participantData['profil_perusahaan_id'];

        // Periksa apakah ada perusahaan dengan nama yang sama dan status_dpt_id = 1 (terima)
        $existingParticipant = $dptModel->join('profil_perusahaan', 'profil_perusahaan.profil_perusahaan_id = dpt.profil_perusahaan_id')
            ->where('profil_perusahaan.nama_perusahaan', $participantData['nama_perusahaan'])
            ->where('dpt.status_dpt_id', 1) // hanya perusahaan dengan status diterima
            ->first();

        if ($existingParticipant) {
            // Jika ada, cek apakah semua jenis spesifikasi dan kualifikasi sudah terisi
            $profileModel = new ProfilPerusahaanModel();
            $existingProfile = $profileModel->find($existingParticipant['profil_perusahaan_id']);

            // Debugging untuk memeriksa nilai field
            // dd($existingProfile);

            if (
                !empty($existingProfile['jenis_spesifikasi_pengadaan']) &&
                !empty($existingProfile['jenis_spesifikasi_pengadaan2']) &&
                !empty($existingProfile['jenis_spesifikasi_pengadaan3']) &&
                !empty($existingProfile['jenis_kualifikasi_pengadaan']) &&
                !empty($existingProfile['jenis_kualifikasi_pengadaan2']) &&
                !empty($existingProfile['jenis_kualifikasi_pengadaan3'])
            ) {
                // Jika semua kolom sudah terisi, kembalikan pesan error
                return redirect()->back()->with('error', 'Penyedia sudah terdaftar di 3 jenis spesifikasi dan kualifikasi.');
            }

            // Update jenis spesifikasi dan kualifikasi secara bertahap jika belum terisi
            $updateData = [];

            if (empty($existingProfile['jenis_spesifikasi_pengadaan2'])) {
                $updateData['jenis_spesifikasi_pengadaan2'] = $participantData['jenis_spesifikasi_pengadaan'];
            } elseif (empty($existingProfile['jenis_spesifikasi_pengadaan3'])) {
                $updateData['jenis_spesifikasi_pengadaan3'] = $participantData['jenis_spesifikasi_pengadaan'];
            }

            if (empty($existingProfile['jenis_kualifikasi_pengadaan2'])) {
                $updateData['jenis_kualifikasi_pengadaan2'] = $participantData['jenis_kualifikasi_pengadaan'];
            } elseif (empty($existingProfile['jenis_kualifikasi_pengadaan3'])) {
                $updateData['jenis_kualifikasi_pengadaan3'] = $participantData['jenis_kualifikasi_pengadaan'];
            }

            if (!empty($updateData)) {
                $profileModel->update($existingProfile['profil_perusahaan_id'], $updateData);
            }

            // Hapus peserta baru dengan status_dpt_id = 3 jika ada
            $newParticipantWithStatus3 = $dptModel->where('profil_perusahaan_id', $profilPerusahaanId)
                ->where('status_dpt_id', 3)
                ->first();

            if ($newParticipantWithStatus3) {
                $dptModel->delete($newParticipantWithStatus3['id']);
                $profileModel->delete($profilPerusahaanId);
            }
        } else {
            // Jika belum ada yang diterima sebelumnya, update status_dpt_id menjadi 1 (terima)
            $dptModel->update($id, ['status_dpt_id' => 1]);

            // Buat akun baru untuk peserta
            $this->createNewAccount($participantData);

            // Kirim email ke peserta
        }

        return redirect()->to('listparticipant/' . $participantData['event_id'])->with('success', 'Pendaftar diterima dan akun baru telah dibuat.');
    }

    public function rejectParticipant($id)
    {
        $dptModel = new DptModel();

        // Cari data peserta berdasarkan ID
        $participantData = $dptModel->find($id);

        if (!$participantData) {
            // Jika peserta tidak ditemukan, kembalikan pesan error
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        // Perbarui status_dpt_id menjadi 2 (ditolak)
        $dptModel->update($id, ['status_dpt_id' => 2]);

        // Kembalikan pesan sukses
        return redirect()->to('listparticipant/' . $participantData['event_id'])->with('success', 'Pendaftar berhasil ditolak.');
    }






    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status_dpt_id' => $status]);
    }

    private function createNewAccount($participantData)
    {
        $userModel = new UserModel(); // Inisialisasi UserModel

        // Ambil data untuk password
        $companyName = $participantData['nama_perusahaan'];
        $officePhoneNumber = $participantData['no_telepon_kantor'];

        // Gabungkan nama perusahaan dan no telepon kantor sebagai password
        $password = $companyName . $officePhoneNumber;

        // Persiapkan data untuk akun baru
        $data = [
            'nama_awal_penyedia' => $participantData['nama_awal_perusahaan'],
            'nama_penyedia'      => $participantData['nama_perusahaan'],
            'nama_akhir_penyedia' => $participantData['nama_akhir_perusahaan'],
            'email'              => $participantData['email'], // Pastikan kolom email ada
            'password'           => password_hash($password, PASSWORD_DEFAULT),  // Password default atau bisa di-generate
            'role_id'           => 4, // Atau sesuai dengan role yang Anda inginkan
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ];

        // Simpan data akun baru
        $userModel->insert($data);

        // Kirim email konfirmasi ke peserta
        $this->sendEmailConfirmation($participantData['email'], $participantData['nama_perusahaan']);
    }

    private function sendEmailConfirmation($recipientEmail, $companyName)
    {
        // Buat instance PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Pengaturan SMTP
            $mail->isSMTP(); // Menyatakan menggunakan SMTP
            $mail->Host = 'smtp.googlemail.com'; // SMTP server Gmail
            $mail->SMTPAuth = true; // Mengaktifkan otentikasi SMTP
            $mail->Username = 'myemailtest80802@gmail.com'; // Email pengirim
            $mail->Password = 'AppPassword123'; // Ganti dengan App Password Gmail Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Menggunakan SSL
            $mail->Port = 465; // Port untuk Gmail SSL

            // Pengaturan pengirim dan penerima
            $mail->setFrom('myemailtest80802@gmail.com', 'Kesatria Jamas'); // Pengirim
            $mail->addAddress($recipientEmail, $companyName); // Penerima (email dan nama perusahaan)

            // Isi email
            $mail->isHTML(true); // Mengirim email dalam format HTML
            $mail->Subject = 'Akun Anda Telah Dibuat'; // Subjek email
            $mail->Body    = '<p>Halo, ' . $companyName . '!</p>'
                . '<p>Akun Anda telah berhasil dibuat. Anda dapat login menggunakan email dan password yang telah ditentukan.</p>'
                . '<p>Terima kasih telah bergabung dengan kami.</p>'; // Isi email
            $mail->AltBody = 'Akun Anda telah berhasil dibuat. Anda dapat login menggunakan email dan password yang telah ditentukan. Terima kasih telah bergabung dengan kami.'; // Format teks biasa jika HTML tidak didukung

            // Log pengiriman email
            log_message('info', 'Mencoba mengirim email ke ' . $recipientEmail);

            // Mengirim email
            if ($mail->send()) {
                // Log jika pengiriman berhasil
                log_message('info', 'Email berhasil dikirim ke ' . $recipientEmail);
            } else {
                // Log jika pengiriman gagal
                log_message('error', 'Gagal mengirim email ke ' . $recipientEmail);
                log_message('error', 'Error: ' . $mail->ErrorInfo); // Menampilkan error detail
            }
        } catch (Exception $e) {
            // Menangkap error PHPMailer
            log_message('error', 'Email gagal dikirim. Error: ' . $e->getMessage());
        }
    }
    public function deleteEvent($id)
    {
        // Check if the ID is valid
        if ($id === null) {
            return redirect()->to('/managepenerimaandpt')->with('error', 'ID Event tidak ditemukan!');
        }

        // Load the model
        $eventModel = new \App\Models\EventModel();

        // Check if the announcement exists
        $event = $eventModel->find($id);
        if (!$event) {
            return redirect()->to('/managepenerimaandpt')->with('error', 'Event tidak ditemukan!');
        }

        // Delete the announcement
        if ($eventModel->delete($id)) {
            // Redirect to the announcements list with success message
            return redirect()->to('/managepenerimaandpt')->with('success', 'Event berhasil dihapus!');
        } else {
            // If deletion fails, show an error message
            return redirect()->to('/managepenerimaandpt')->with('error', 'Gagal menghapus Event!');
        }
    }
}
