<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Spesifikasi DPT</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="field_a">Jenis Kualifikasi</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Kegiatan" id="field_a" name="field_a"
                        value="<?= esc($spesifikasi['jenis_kualifikasi']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_b">Nama Jenis Spesifikasi</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Tanggal Mulai Kegiatan" id="field_b" name="field_b"
                        value="<?= esc($spesifikasi['nama_jenis_spesifikasi']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="field_c">Deskripsi</label>
                    <textarea type="text" class="form-control"
                        placeholder="Masukan Tanggal Selesai Kegiatan" id="field_c" name="field_c"
                      readonly><?= esc($spesifikasi['deskripsi']); ?></textarea>
                </div>
                <div class="row mr-0">
                    <div class="col-md-12">
                        <a href="<?= base_url('managespesifikasi'); ?>" class="col-md-12 mb-3 btn btn-secondary">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <?= $this->endSection() ?>