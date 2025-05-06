<?= $this->extend('admin/layoutglobal') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengumuman</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="nama_paket">Judul Pengumuman</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Paket" id="nama_paket" name="nama_paket"
                        value="<?= esc($announcement['judul']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="metode">Deskripsi Pengumuman</label>
                    <textarea type="text" class="form-control"
                        placeholder="Masukan Metode" id="metode" name="fieldmetode_b"
                        value="" readonly><?= esc($announcement['deskripsi']); ?></textarea>
                </div>
                <div class="form-group">
                    <p class="text-start mt-2" style="font-size: 15px;">Dokumen</p>
                    <?php if (!empty($announcement['dokumen'])): ?>
                        <a href="<?= esc($announcement['dokumen']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;  width: 10%">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class=" text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                </div>
                <div class="row mr-0">
                    <div class="col-md-12">
                        <a href="<?= base_url('manageannouncement'); ?>" class="col-md-12 mb-3 btn btn-secondary">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <?= $this->endSection() ?>