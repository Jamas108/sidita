<?= $this->extend('admin/layoutglobal') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Penerimaan DPT</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('updateeventdpt/' .  $event['id']); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?> <!-- CSRF token for security -->
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3 row">
                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama Kegiatan" id="nama_kegiatan" name="nama_kegiatan" value="<?= old('nama_kegiatan', $event['nama_event']); ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai Kegiatan</label>
                    <input type="text" class="form-control" placeholder="Masukan Tanggal Mulai Kegiatan" id="tanggal_mulai" name="tanggal_mulai" value="<?= old('tanggal_mulai', $event['tanggal_mulai']); ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai Kegiatan</label>
                    <input type="text" class="form-control" placeholder="Masukan Tanggal Selesai Kegiatan" id="tanggal_selesai" name="tanggal_selesai" value="<?= old('tanggal_selesai', $event['tanggal_selesai']); ?>">
                </div>
                <div class="form-group">
                    <label for="kualifikasi_usaha">Kualifikasi Usaha</label>
                    <select class="form-control <?= session('errors.kualifikasi_usaha') ? 'is-invalid' : ''; ?>" id="kualifikasi_usaha" name="kualifikasi_usaha">
                        <option value="">Pilih Kualifikasi Usaha</option>
                        <option value="Mikro" <?= old('kualifikasi_usaha', $event['kualifikasi_usaha']) == 'Mikro' ? 'selected' : ''; ?>>Mikro</option>
                        <option value="Kecil" <?= old('kualifikasi_usaha', $event['kualifikasi_usaha']) == 'Kecil' ? 'selected' : ''; ?>>Kecil</option>
                        <option value="Menengah" <?= old('kualifikasi_usaha', $event['kualifikasi_usaha']) == 'Menengah' ? 'selected' : ''; ?>>Menengah</option>
                        <option value="Besar" <?= old('kualifikasi_usaha', $event['kualifikasi_usaha']) == 'Besar' ? 'selected' : ''; ?>>Besar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kualifikasi_pengadaan">Jenis Kualifikasi Pengadaan</label>
                    <select class="form-control <?= session('errors.kualifikasi_pengadaan') ? 'is-invalid' : ''; ?>" id="kualifikasi_pengadaan" name="kualifikasi_pengadaan">
                        <option value="" <?= (old('jenis_kualifikasi_id') === null && empty($event['jenis_kualifikasi_id'])) ? 'selected' : ''; ?>>Pilih Kualifikasi Usaha</option>
                        <?php foreach ($jenisKualifikasi as $kualifikasi): ?>
                            <option value="<?= $kualifikasi['id']; ?>"
                                <?= (old('jenis_kualifikasi_id', $event['jenis_kualifikasi_id'] ?? '') == $kualifikasi['id']) ? 'selected' : ''; ?>>
                                <?= $kualifikasi['jenis_kualifikasi']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (session('errors.kualifikasi_pengadaan')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.kualifikasi_pengadaan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="spesifikasi">Jenis Spesifikasi</label>
                    <select class="form-control <?= session('errors.spesifikasi') ? 'is-invalid' : ''; ?>" id="spesifikasi" name="spesifikasi">
                        <option value="" <?= old('jenis_spesifikasi_id', $event['jenis_spesifikasi_id'] ?? '') === '' ? 'selected' : ''; ?>>Pilih Spesifikasi</option>
                        <?php foreach ($spesifikasiList as $spesifikasi): ?>
                            <option value="<?= $spesifikasi['id']; ?>" <?= old('spesifikasi', $event['jenis_spesifikasi_id'] ?? '') == $spesifikasi['id'] ? 'selected' : ''; ?>>
                                <?= $spesifikasi['nama_jenis_spesifikasi']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (session('errors.spesifikasi')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.spesifikasi'); ?>
                        </div>
                    <?php endif; ?>
                </div>



                <div class="form-group">
                    <label for="status_event" style="width: 100%">Status Event</label>
                    <select class="form-control" name="status" id="status_event">
                        <option value="Pending" <?= old('status', $event['status']) == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="Berjalan" <?= old('status', $event['status']) == 'Berjalan' ? 'selected' : ''; ?>>Berjalan</option>
                        <option value="Selesai" <?= old('status', $event['status']) == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="berita-acara" style="width: 100%;">Dokumen Pendukung</label>
                    <input type="file" class="form-control" id="dokumen_pendukung" name="dokumen">
                    <?php if (!empty($event['dokumen'])): ?>
                        <a href="<?= base_url('uploads/dokumenevent/' . $event['dokumen']); ?>" target="_blank" class="btn btn-primary mt-2 col-md-2" style="text-decoration:none">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <span class="text-muted">Tidak Ada</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="berita_acara" style="width: 100%;">Berita Acara</label>
                    <input type="file" class="form-control" id="berita_acara" name="berita_acara">
                    <?php if (!empty($event['berita_acara'])): ?>
                        <a href="<?= base_url('uploads/berita_acara/' . $event['berita_acara']); ?>" target="_blank" class="btn btn-success mt-2 col-md-2" style="text-decoration:none">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <span class="text-muted">Tidak Ada</span>
                    <?php endif; ?>
                </div>
                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('managepenerimaandpt'); ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
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
<script>
    document.getElementById('kualifikasi_pengadaan').addEventListener('change', function() {
        var kualifikasiId = this.value;

        fetch('<?= base_url('managepenerimaandpt/getSpesifikasiByKualifikasi/') ?>' + kualifikasiId)
            .then(response => response.json())
            .then(data => {
                var spesifikasiSelect = document.getElementById('spesifikasi');
                spesifikasiSelect.innerHTML = '<option selected>Pilih Spesifikasi</option>'; // Reset pilihan

                data.forEach(function(spesifikasi) {
                    var option = document.createElement('option');
                    option.value = spesifikasi.id; // Sesuaikan dengan field id di tabel
                    option.textContent = spesifikasi.nama_jenis_spesifikasi; // Sesuaikan dengan field nama di tabel
                    spesifikasiSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<?= $this->endSection() ?>