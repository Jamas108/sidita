<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pekerjaan</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="field_a">Nama Paket Pengadaan</label>
                    <input type="text" class="form-control"
                        placeholder="Nama Paket Pengadaan Kosong" id="field_a" name="field_a"
                        value="<?= esc($detailPekerjaan['nama_paket_pengadaan']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Nama Penyedia</label>
                    <input type="text" class="form-control"
                        placeholder="Nama Penyedia Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['penyedia']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">PPK</label>
                    <input type="text" class="form-control"
                        placeholder="PPK Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['ppk']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Sumber Dana</label>
                    <input type="text" class="form-control"
                        placeholder="Sumber Dana Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['sumber_dana']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Metode</label>
                    <input type="text" class="form-control"
                        placeholder="Metode Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['metode']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Nomor Kontrak</label>
                    <input type="text" class="form-control"
                        placeholder="Nomor Kontrak Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['nomor_kontrak']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Nilai Kontrak (termasuk PPN)</label>
                    <input type="text" class="form-control"
                        placeholder="Nilai Kontrak Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['nilai_kontrak_ppn']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Akun</label>
                    <input type="text" class="form-control"
                        placeholder="Akun Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['akun']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Tanggal Kontrak</label>
                    <input type="text" class="form-control"
                        placeholder="Tanggal Kontrak Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['tanggal_kontrak']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Tanggal Akhir Kontrak</label>
                    <input type="text" class="form-control"
                        placeholder="Tanggal Akhir Kontrak Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['akhir_kontrak']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Tahun Anggaran</label>
                    <input type="text" class="form-control"
                        placeholder="Tahun Anggaran Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['tahun_anggaran']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Tanggal BAST</label>
                    <input type="text" class="form-control"
                        placeholder="Tanggal BAST Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['tanggal_bast']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Presentase Kemajuan</label>
                    <input type="text" class="form-control"
                        placeholder="Presentase Kemajuan Kosong" id="field_b" name="field_b"
                        value="<?= esc($detailPekerjaan['presentase_kemajuan']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Keterangan</label>
                    <textarea type="text" class="form-control"
                        placeholder="Keterangan Kosong" id="field_b" name="field_b" readonly><?= esc($detailPekerjaan['keterangan']); ?></textarea>
                </div>
                <div class="form-group">
                    <p for="file_bukti_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">
                        Dokumen Pendukung
                    </p>

                    <?php if (!empty($detailPekerjaan['dokumen_pendukung'])): ?>
                        <a href="/uploads/DokumenPekerjaan/<?= esc($detailPekerjaan['dokumen_pendukung']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p class="text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <div class="row mr-0">
                    <div class="col-md-12">
                        <a href="<?= base_url('adminmanagepekerjaan'); ?>" class="col-md-12 mb-3 btn btn-secondary">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>


        </form>
    </div>

    <?= $this->endSection() ?>