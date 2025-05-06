<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Spesifikasi</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('updatespesifikasi/' . $spesifikasi['id']); ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="jenis_kualifikasi">Pilih Jenis Kualifikasi</label>
                    <select class="form-control" id="jenis_kualifikasi" name="jenis_kualifikasi_id">
                        <option selected><?= esc($spesifikasi['jenis_kualifikasi']) ?></option>
                        <?php foreach ($jenisKualifikasi as $kualifikasi): ?>
                            <option value="<?= $kualifikasi['id']; ?>" <?= ($spesifikasi['jenis_kualifikasi_id'] == $kualifikasi['id']) ? 'selected' : ''; ?>>
                                <?= $kualifikasi['jenis_kualifikasi']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_spesifikasi">Jenis Spesifikasi</label>
                    <input type="text" class="form-control" placeholder="Masukan Jenis Spesifikasi" id="nama_jenis_spesifikasi" name="jenis_spesifikasi"
                        value="<?= esc($spesifikasi['nama_jenis_spesifikasi']) ?>">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Jenis Spesifikasi</label>
                    <textarea class="form-control" placeholder="Masukan deskripsi spesifikasi" id="deskripsi" name="deskripsi"><?= esc($spesifikasi['deskripsi']) ?></textarea>
                </div>
                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('managespesifikasi') ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
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