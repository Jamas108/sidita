<?= $this->extend('operator/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pekerjaan</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('storepekerjaan') ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="tahun_anggaran" style="font-weight: bold; color:black">Tahun Anggaran</label>
                    <input type="number" class="form-control"
                        placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                        value="<?= old('tahun_anggaran', '') ?>">
                </div>
                <div class="form-group">
                    <label for="nama_paket_pengadaan " style="font-weight: bold; color:black">Nama Paket Pengadaan</label>
                    <input type="text" class="form-control <?= session('errors.nama_paket_pengadaan') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Nama Paket Pengadaan" id="nama_paket_pengadaan" name="nama_paket_pengadaan"
                        value="<?= old('nama_paket_pengadaan', '') ?>">
                    <?php if (session('errors.nama_paket_pengadaan')): ?>
                        <div class="invalid-feedback" style="text-align: left;">
                            <?= session('errors.nama_paket_pengadaan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="lokasi_pekerjaan" style="font-weight: bold; color:black">Lokasi Pekerjaan</label>
                    <input type="text" class="form-control <?= session('errors.lokasi_pekerjaan') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Lokasi Pekerjaan" id="lokasi_pekerjaan" name="lokasi_pekerjaan"
                        value="<?= old('lokasi_pekerjaan', '') ?>">
                    <?php if (session('errors.lokasi_pekerjaan')): ?>
                        <div class="invalid-feedback" style="text-align: left;">
                            <?= session('errors.lokasi_pekerjaan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="sumber_dana" style="font-weight: bold; color:black">Sumber Dana</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Sumber Dana" id="sumber_dana" name="sumber_dana"
                        value="<?= old('sumber_dana', '') ?>">
                </div>
                <div class="form-group">
                    <label for="akun" style="font-weight: bold; color:black">Akun</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Akun" id="akun" name="akun"
                        value="<?= old('akun', '') ?>">
                </div>
                <div class="form-group">
                    <label for="metode" style="font-weight: bold; color:black">Metode</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Metode" id="metode" name="metode"
                        value="<?= old('metode', '') ?>">
                </div>
                <div class="form-group" style="font-weight: bold; color:black">
                    <label for="tahun_anggaran">PPK</label>
                    <select class="form-control <?= session('errors.ppk') ? 'is-invalid' : ''; ?>" id="ppk" name="ppk">
                        <option value="" selected>Pilih PPK</option>
                        <?php foreach ($ppkData as $ppk): ?>
                            <option value="<?= esc($ppk['nama_penyedia']) ?>" data-id="<?= esc($ppk['id']); ?>"> <?= esc($ppk['nama_penyedia'])?></option>
                        <?php endforeach; ?>
                        <?php if (session('errors.ppk')): ?>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= session('errors.ppk'); ?>
                            </div>
                        <?php endif; ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="penyedia" style="font-weight: bold; color:black">Penyedia</label>
                    <select class="form-control <?= session('errors.penyedia') ? 'is-invalid' : ''; ?>" id="penyedia_select" name="penyedia" onchange="updateDptId()">
                        <option value="" selected>Pilih Penyedia</option>
                        <?php foreach ($dptData as $dpt): ?>
                            <option value="<?= esc($dpt['nama_awal_perusahaan']) . ' ' . esc($dpt['nama_perusahaan']) . ' ' . esc($dpt['nama_akhir_perusahaan']); ?>" data-id="<?= esc($dpt['id']); ?>"> <?= esc($dpt['nama_awal_perusahaan']) . ' ' . esc($dpt['nama_perusahaan']) . ' ' . esc($dpt['nama_akhir_perusahaan']); ?></option>
                        <?php endforeach; ?>
                        <?php if (session('errors.penyedia')): ?>
                            <div class="invalid-feedback" style="text-align: left;">
                                <?= session('errors.penyedia'); ?>
                            </div>
                        <?php endif; ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="nilai_kontrak_ppn" style="font-weight: bold; color:black">Nilai Kontrak</label>
                    <input type="number" class="form-control"
                        placeholder="Masukan Nilai Kontrak (Sudah Termasuk PPN)" id="nilai_kontrak_ppn" name="nilai_kontrak_ppn"
                        value="<?= old('nilai_kontrak_ppn', '') ?>">
                </div>
                <div class="form-group">
                    <label for="nomor_kontrak" style="font-weight: bold; color:black">Nomor Kontrak</label>
                    <input type="text" class="form-control <?= session('errors.nomor_kontrak') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Nomor Kontrak" id="nomor_kontrak" name="nomor_kontrak"
                        value="<?= old('nomor_kontrak', '') ?>">
                    <?php if (session('errors.nomor_kontrak')): ?>
                        <div class="invalid-feedback" style="text-align: left;">
                            <?= session('errors.nomor_kontrak'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_kontrak " style="font-weight: bold; color:black">Tanggal Awal Kontrak</label>
                    <input type="date" class="form-control <?= session('errors.tanggal_kontrak') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Tanggal Awal Kontrak" id="tanggal_kontrak" name="tanggal_kontrak"
                        value="<?= old('tanggal_kontrak', '') ?>">
                    <?php if (session('errors.tanggal_kontrak')): ?>
                        <div class="invalid-feedback" style="text-align: left;">
                            <?= session('errors.tanggal_kontrak'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="akhir_kontrak" style="font-weight: bold; color:black">Tanggal Akhir Kontrak</label>
                    <input type="date" class="form-control <?= session('errors.akhir_kontrak') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Tanggal Akhir Kontrak" id="akhir_kontrak" name="akhir_kontrak"
                        value="<?= old('akhir_kontrak', '') ?>">
                    <?php if (session('errors.akhir_kontrak')): ?>
                        <div class="invalid-feedback" style="text-align: left;">
                            <?= session('errors.akhir_kontrak'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_bast" style="font-weight: bold; color:black">Tanggal BAST</label>
                    <input type="date" class="form-control"
                        placeholder="Masukan Tanggal BAST" id="tanggal_bast" name="tanggal_bast"
                        value="<?= old('tanggal_bast', '') ?>">
                </div>
                <div class="form-group">
                    <label for="presentase_kemajuan" style="font-weight: bold; color:black">Presentasi Kemajuan</label>
                    <input type="number" class="form-control"
                        placeholder="Masukan Presentase Kemajuan" id="presentase_kemajuan" name="presentase_kemajuan"
                        value="<?= old('presentase_kemajuan', '') ?>">
                </div>
                <div class="form-group">
                    <label for="keterangan" style="font-weight: bold; color:black">Keterangan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Keterangan" id="keterangan" name="keterangan"
                        value="<?= old('keterangan', '') ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Status Pekerjaan</label>
                    <select class="form-control <?= session('errors.jenis_identitas_pemilik_perusahaan') ? 'is-invalid' : ''; ?>" id="status_pekerjaan" name="status_pekerjaan">
                        <option value="" selected>Pilih Status Pekerjaan</option>
                        <option value="selesai" <?= old('status_pekerjaan') == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                        <option value="berjalan" <?= old('status_pekerjaan') == 'berjalan' ? 'selected' : ''; ?>>Berjalan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dokumen_pendukung" style="font-weight: bold; color:black">Dokumen Pendukung</label>
                    <input type="file" class="form-control"
                        placeholder="Upload Dokumen Pendukung" id="dokumen_pendukung" name="dokumen_pendukung"
                        value="">
                    <input type="date" class="form-control"
                        placeholder="" id="tanggal_pembuatan" name="tanggal_pembuatan"
                        value="" hidden>
                    <input type="text" id="dpt_id" name="dpt_id" value="" hidden>
                </div>


                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('managepekerjaan') ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
                            <span class="text">Batal</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="col-md-12 mb-3 btn btn-primary btn-icon-split">
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script>
        function updateDptId() {
            // Get the selected option element
            const penyediaSelect = document.getElementById('penyedia_select');
            const selectedOption = penyediaSelect.options[penyediaSelect.selectedIndex];

            // Get the data-id attribute from the selected option and set it to the dpt_id input
            document.getElementById('dpt_id').value = selectedOption.getAttribute('data-id');
        }
    </script>


    <?= $this->endSection() ?>