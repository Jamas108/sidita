<?= $this->extend('admin/layoutglobal') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengumuman</h1>
    </div>

    <!-- Display Success Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('updateannouncement/' . $announcement['id']); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" placeholder="Masukan Judul Pengumuman" id="judul" name="judul" value="<?= old('judul', $announcement['judul']); ?>">
                    <div class="invalid-feedback">
                        <?= isset($errors['judul']) ? $errors['judul'] : ''; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi_singkat">Deskripsi Singkat</label>
                    <input type="text" class="form-control" placeholder="Masukan Deskripsi Singkat" id="deskripsi" name="deskripsi" value="<?= old('deskripsi', $announcement['deskripsi']); ?>">
                    <div class="invalid-feedback">
                        <?= isset($errors['deskripsi']) ? $errors['deskripsi'] : ''; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dokumen">Upload Dokumen (PDF)</label>
                    <input type="file" class="form-control" id="dokumen" name="dokumen">
                    <!-- Display the current document link if available -->
                    <?php if (!empty($announcement['dokumen'])): ?>
                        <a href="<?= esc($announcement['dokumen']) ?>" target="_blank" class="btn btn-primary mt-2" style="width: 10%"">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class=" text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                        <div class="invalid-feedback">
                            <?= isset($errors['dokumen']) ? $errors['dokumen'] : ''; ?>
                        </div>
                </div>
                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('manageannouncement'); ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
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
</div>
<?= $this->endSection() ?>