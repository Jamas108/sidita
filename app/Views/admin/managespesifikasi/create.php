<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Spesifikasi</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('storespesifikasi') ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="jenis_kualifikasi">Pilih Jenis Kualifikasi</label>
                    <select class="form-control" id="jenis_kualifikasi" name="jenis_kualifikasi_id">
                        <option value="" <?= set_select('jenis_kualifikasi_id', '', TRUE) ?>>Pilih Kualifikasi Pengadaan</option>
                        <?php foreach ($jenisSpesifikasi as $spesifikasi): ?>
                            <option value="<?= $spesifikasi['id']; ?>" <?= set_select('jenis_kualifikasi_id', $spesifikasi['id'], old('jenis_kualifikasi_id') == $spesifikasi['id']) ?>>
                                <?= $spesifikasi['jenis_kualifikasi']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['jenis_kualifikasi_id'])): ?>
                        <div class="text-danger"><?= session()->getFlashdata('errors')['jenis_kualifikasi_id'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="jenis_spesifikasi">Jenis Spesifikasi</label>
                    <input type="text" class="form-control" placeholder="Masukan Jenis Spesifikasi" id="nama_jenis_spesifikasi" name="jenis_spesifikasi" value="<?= old('jenis_spesifikasi') ?>">
                    <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['jenis_spesifikasi'])): ?>
                        <div class="text-danger"><?= session()->getFlashdata('errors')['jenis_spesifikasi'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Jenis Spesifikasi</label>
                    <textarea class="form-control" placeholder="Masukan deskripsi spesifikasi" id="deskripsi" name="deskripsi"><?= old('deskripsi') ?></textarea>
                    <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['deskripsi'])): ?>
                        <div class="text-danger"><?= session()->getFlashdata('errors')['deskripsi'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
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
    <?= $this->endSection() ?>