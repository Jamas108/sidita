<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Upload Berita Acara</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('updateberitaacaraevent/' .  $event['id']) ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="berita_acara">File Berita Acara</label>
                    <input type="file" class="form-control  <?= session('errors.berita_acara') ? 'is-invalid' : ''; ?>" placeholder="Masukan File Berita Acara"
                        id="berita_acara" name="berita_acara" value="<?= old('berita_acara') ?>">
                    <?php if (session('errors.berita_acara')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.berita_acara'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Upload</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>