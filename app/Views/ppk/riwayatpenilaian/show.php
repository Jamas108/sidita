<?= $this->extend('ppk/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nilai Pekerjaan</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('storenilaipekerjaan/' . $pekerjaan['id']) ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="row d-flex justify-content-between">
                    <div class="form-group col-md-12">
                        <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Informasi Penilai" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nama Penilai" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                            value="<?= esc($user['nama_penyedia']); ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="NIP Penilai" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan NIP Penilai" id="nip_penilai" name="nip_penilai"
                            value="<?= esc($user['nip']); ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Jabatan Penilai" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Jabatan Penilai" id="posisi_penilai" name="posisi_penilai"
                            value="<?= esc($user['jabatan']); ?>" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Informasi Pekerjaan" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nama Perusahaan" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            value="<?= esc($pekerjaan['penyedia']) ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Alamat Perusahaan" disabled>
                    </div>
                    <?php foreach ($dptData as $dpt): ?>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control"
                                placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                                value="<?= esc($dpt['alamat']) ?>" disabled>
                        </div>
                    <?php endforeach; ?>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Paket Pekerjaan" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            value="<?= esc($pekerjaan['nama_paket_pengadaan']) ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Lokasi Pekerjaan" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            value="<?= esc($pekerjaan['lokasi_pekerjaan']) ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nilai Kontrak" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            value="<?= esc($pekerjaan['nilai_kontrak_ppn']) ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nomor Kontrak" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            value="<?= esc($pekerjaan['nomor_kontrak']) ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Jangka Waktu Pelaksanaan" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="durasi" name="durasi"
                            value="<?= esc($penilaian['durasi']) ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Metode Pemilihan Penyedia" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            value="<?= esc($pekerjaan['metode']) ?>" disabled>
                    </div>
                    <!-- Aspek Kualitas dan Kuantitas Pekerjaan -->
                    <div class="form-group col-md-12 mt-3">
                        <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Penilaian Aspek Kualitas dan Kuantitas Pekerjaan" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 1" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>> 50% Hasil pekerjaan Memerlukan perbaikan / penggantian agar sesuai dengan ketentuan dalam kontrak</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 2" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>< 50% Hasil pekerjaan memerlukan perbaikan / penggantian agar sesuai dengan ketentuan dalam kontrak</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 3" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>100% Hasil pekerjaan sesuai dengan ketentuan dalam kontrak</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style=" color: white" type="text" class="form-control bg-success"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Bobot Nilai (%)" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="30%" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nilai" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="number" class="form-control"
                            placeholder="Masukan Nilai (max 3)" id="skor_kinerja_kualitas_dan_kuantitas_pekerjaan" name="skor_kinerja_kualitas_dan_kuantitas_pekerjaan"
                            value="<?= esc($penilaian['skor_kinerja_kualitas_dan_kuantitas_pekerjaan']) ?>" oninput="AspekKualitas(this)" min="0" max="3" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Hasil Nilai Kinerja Waktu" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="nilai_kinerja_kualitas_dan_kuantitas_pekerjaan" name="nilai_kinerja_kualitas_dan_kuantitas_pekerjaan"
                            value="<?= esc($penilaian['nilai_kinerja_kualitas_dan_kuantitas_pekerjaan']) ?>" readonly>
                    </div>


                    <!-- Aspek Biaya -->
                    <div class="form-group col-md-12">
                        <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Penilaian Aspek Biaya" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 1" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control" style="height: 100px;"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>Tidak menginformasikan sejak awal atas kondisi / kejadian yang berpotensi menambah biaya dan Mengajukan perubahan kontrak yang akan berdampak pada penambahan total biaya tanpa alasan yang memadai sehingga ditolak oleh PPK</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 2" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>Melakukan salah satu kondisi pada kriteria cukup.</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 3" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea style="height: 100px;" type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>Telah melakukan pengendalian biaya dengan baik dengan menginformasikan sejak awal atas kondisi yang berpotensi menambah biaya dan perubahan kontrak yang diajukan sudah didasari dengan alasan yang dapat dipertanggungjawabkan, sehingga penambahan biaya dapat diantisipasi</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style=" color: white" type="text" class="form-control bg-success"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Bobot Nilai (%)" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="20%" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nilai" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="number" class="form-control"
                            placeholder="Masukan Nilai (max 3)" id="skor_kinerja_biaya" name="skor_kinerja_biaya"
                            value="<?= esc($penilaian['skor_kinerja_biaya']) ?>" oninput="AspekBiaya(this)" min="0" max="3" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Hasil Nilai Kinerja Waktu" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="nilai_kinerja_biaya" name="nilai_kinerja_biaya"
                            value="<?= esc($penilaian['nilai_kinerja_biaya']) ?>" readonly>
                    </div>

                    <!-- Aspek Waktu -->
                    <div class="form-group col-md-12">
                        <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Penilaian Aspek Waktu" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 1" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control" style="height: 100px;"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>Penyelesaian pekerjaan terlambat melebihi 50 (lima puluh) hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan PenyediaPenyelesaian pekerjaan terlambat melebihi 50 (lima puluh) hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia </textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 2" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>Penyelesaian pekerjaan terlambat sampai dengan 50 (lima puluh) hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia.</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 3" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>Penyelesaian pekerjaan sesuai dengan waktu yang ditetapkan dalam kontrak atau lebih cepat sesuai dengan kebutuhan PPK.</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style=" color: white" type="text" class="form-control bg-success"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Bobot Nilai (%)" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="30%" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nilai" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="number" class="form-control"
                            placeholder="Masukan Nilai (max 3)" id="skor_kinerja_waktu" name="skor_kinerja_waktu"
                            value="<?= esc($penilaian['skor_kinerja_waktu']) ?>" oninput="AspekWaktu(this)" min="0" max="3" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Hasil Nilai Kinerja Waktu" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="nilai_kinerja_waktu" name="nilai_kinerja_waktu"
                            value="<?= esc($penilaian['nilai_kinerja_waktu']) ?>" readonly>
                    </div>

                    <!-- Aspek Layanan -->
                    <div class="form-group col-md-12">
                        <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Penilaian Aspek Layanan" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 1" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>a.	Penyedia lambat memberi tanggapan positif atas permintaan PPK; dan
b.	Penyedia sulit diajak berdiskusi dalam penyelesaian pelaksanaan pekerjaan.
</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 2" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>a.	Merespon permintaan dengan penyelesaian sesuai dengan yang diminta; atau
b.	Penyedia mudah dihubungi dan berdiskusi dalam penyelesaian pelaksanaan pekerjaan.
</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Indikator 3" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                            disabled>a.	Merespon permintaan dengan penyelesaian sesuai dengan yang diminta; dan 
b.	Penyedia mudah dihubungi dan berdiskusi dalam penyelesaian pelaksanaan pekerjaan.
</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input style=" color: white" type="text" class="form-control bg-success"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Bobot Nilai (%)" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="20%" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nilai" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="number" class="form-control"
                            placeholder="Masukan Nilai (max 3)" id="skor_kinerja_layanan" name="skor_kinerja_layanan"
                            value="<?= esc($penilaian['skor_kinerja_layanan']) ?>" oninput="AspekLayanan(this)" min="0" max="3" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="color: white" type="text" class="form-control bg-secondary"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Hasil Nilai Kinerja Layanan" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="nilai_kinerja_layanan" name="nilai_kinerja_layanan"
                            value="<?= esc($penilaian['nilai_kinerja_layanan']) ?>" readonly>
                    </div>

                    <!-- Lain Lain -->
                    <div class="form-group col-md-12">
                        <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Lain Lain" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Nilai Total Kinerja" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control"
                            placeholder="" id="nilai_total_kinerja" name="nilai_total_kinerja"
                            value="<?= esc($penilaian['nilai_total_kinerja']) ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                            placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                            value="Catatan & Rekomendasi" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <textarea type="text" class="form-control"
                            placeholder="Masukan Catatan dan Rekomendasi" id="catatan" name="catatan"
                            value="" readonly><?= esc($penilaian['catatan']) ?></textarea>
                    </div>
                    <input type="text" class="form-control"
                        placeholder="" id="users_id" name="users_id"
                        value="<?= esc($user['id']); ?>" hidden>
                    <div class="col-md-12">
                        <a href="<?= base_url('manageriwayatpenilaian'); ?>" class="col-md-12 mb-3 btn btn-success">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function AspekKualitas(input) {
        if (parseFloat(input.value) > 3) {
            input.value = 3;
        }
        hitungNilaiKinerjaKualitas();
        hitungNilaiTotalKinerja();
    }

    function hitungNilaiKinerjaKualitas() {
        const bobot = 0.30;
        const skorKinerja = parseFloat(document.getElementById('skor_kinerja_kualitas_dan_kuantitas_pekerjaan').value) || 0;
        const nilaiKinerjaKualitas = skorKinerja * bobot;
        document.getElementById('nilai_kinerja_kualitas_dan_kuantitas_pekerjaan').value = nilaiKinerjaKualitas.toFixed(2);
    }

    function AspekBiaya(input) {
        if (parseFloat(input.value) > 3) {
            input.value = 3;
        }
        hitungNilaiKinerjaBiaya();
        hitungNilaiTotalKinerja();
    }

    function hitungNilaiKinerjaBiaya() {
        const bobot = 0.20;
        const skorKinerja = parseFloat(document.getElementById('skor_kinerja_biaya').value) || 0;
        const nilaiKinerjaBiaya = skorKinerja * bobot;
        document.getElementById('nilai_kinerja_biaya').value = nilaiKinerjaBiaya.toFixed(2);
    }

    function AspekWaktu(input) {
        if (parseFloat(input.value) > 3) {
            input.value = 3;
        }
        hitungNilaiKinerjaWaktu();
        hitungNilaiTotalKinerja();
    }

    function hitungNilaiKinerjaWaktu() {
        const bobot = 0.30;
        const skorKinerja = parseFloat(document.getElementById('skor_kinerja_waktu').value) || 0;
        const nilaiKinerjaWaktu = skorKinerja * bobot;
        document.getElementById('nilai_kinerja_waktu').value = nilaiKinerjaWaktu.toFixed(2);
    }

    function AspekLayanan(input) {
        if (parseFloat(input.value) > 3) {
            input.value = 3;
        }
        hitungNilaiKinerjaLayanan();
        hitungNilaiTotalKinerja();
    }

    function hitungNilaiKinerjaLayanan() {
        const bobot = 0.20;
        const skorKinerja = parseFloat(document.getElementById('skor_kinerja_layanan').value) || 0;
        const nilaiKinerjaLayanan = skorKinerja * bobot;
        document.getElementById('nilai_kinerja_layanan').value = nilaiKinerjaLayanan.toFixed(2);
    }

    function hitungNilaiTotalKinerja() {
        const nilaiKualitas = parseFloat(document.getElementById('nilai_kinerja_kualitas_dan_kuantitas_pekerjaan').value) || 0;
        const nilaiBiaya = parseFloat(document.getElementById('nilai_kinerja_biaya').value) || 0;
        const nilaiWaktu = parseFloat(document.getElementById('nilai_kinerja_waktu').value) || 0;
        const nilaiLayanan = parseFloat(document.getElementById('nilai_kinerja_layanan').value) || 0;

        const nilaiTotalKinerja = nilaiKualitas + nilaiBiaya + nilaiWaktu + nilaiLayanan;
        document.getElementById('nilai_total_kinerja').value = nilaiTotalKinerja.toFixed(2);
    }
</script>

<?= $this->endSection() ?>