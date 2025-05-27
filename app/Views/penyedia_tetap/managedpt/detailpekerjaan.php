<?= $this->extend('penyedia_tetap/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pekerjaan</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3 text-center">
            <div class="row d-flex justify-content-between">
                <div class="form-group col-md-12 mt-2">
                    <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                        placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                        value="Data Pekerjaan" disabled>
                </div>

                <!-- Display user data dynamically -->
                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Nama Paket Pengadaan" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['nama_paket_pengadaan']); ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Tanggal Pembuatan" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['tanggal_pembuatan']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Tahun Anggaran" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['tahun_anggaran']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Nama PPK" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['ppk']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Lokasi Pengadaan" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['lokasi_pekerjaan']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Sumber Dana" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['sumber_dana']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Nilai Kontrak (Sudah PPN)" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['nilai_kontrak_ppn']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Nomor Kontrak" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['nomor_kontrak']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Akhir Kontrak" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['akhir_kontrak']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Tanggal Bast" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['tanggal_bast']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Presentase Kemajuan" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['presentase_kemajuan']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="keterangan" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['tahun_anggaran']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Status Pekerjaan" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($detailPekerjaan['status_pekerjaan']); ?>" readonly>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                        placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                        value="Penilaian Pekerjaan" disabled>
                </div>



                <div class="form-group col-md-4">
                    <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Kategori Penilaian" disabled>
                </div>
                <div class="form-group col-md-4">
                    <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="Nilai" readonly>
                </div>
                <div class="form-group col-md-4">
                    <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="Skor" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Kinerja Kualitas dan Kuantitas Pekerjaan" disabled>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['skor_kinerja_kualitas_dan_kuantitas_pekerjaan']); ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nilai_kinerja_dan_kualitas_pekerjaan" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['nilai_kinerja_kualitas_dan_kuantitas_pekerjaan']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Kinerja Biaya" disabled>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="skor_kinerja_biaya" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['skor_kinerja_biaya']); ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['nilai_kinerja_biaya']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input  style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Kinerja Waktu" disabled>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="skor_kinerja_waktu" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['skor_kinerja_waktu']); ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="skor_kinerja_waktu" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['nilai_kinerja_waktu']); ?>" readonly>
                </div>


                <div class="form-group col-md-4">
                    <input  style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Kinerja Layanan" disabled>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="skor_kinerja_layanan" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['skor_kinerja_layanan']); ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nilai_kinerja_layanan" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['nilai_kinerja_layanan']); ?>" readonly>
                </div>


                <div class="form-group col-md-8">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control text-center"
                        placeholder="" id="nama" name="nama" value="Nilai Total" disabled>
                </div>
                <div class="form-group col-md-4">
                    <input style="text-align:center;" type="text" class="form-control text-center bg-info text-white"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($penilaianPekerjaan['nilai_total_kinerja']); ?>" readonly>
                </div>



                <!-- <div class="form-group col-md-6">
                    <a href="#" class="btn btn-sm btn-warning" style="width:100%" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Ganti Password</a>
                </div>
                <div class="form-group col-md-6">
                    <a href="#" class="btn btn-sm btn-danger" style="width:100%" onclick="logout()">Keluar</a>
                </div> -->
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>