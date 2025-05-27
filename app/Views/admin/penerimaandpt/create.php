<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Event</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('storeevent') ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control  <?= session('errors.nama_kegiatan') ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Kegiatan"
                        id="nama_kegiatan" name="nama_kegiatan" value="<?= old('nama_kegiatan') ?>">
                    <?php if (session('errors.nama_kegiatan')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.nama_kegiatan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai Kegiatan</label>
                    <input type="date" class="form-control <?= session('errors.tanggal_mulai') ? 'is-invalid' : ''; ?>" placeholder="Masukan Tanggal Mulai Kegiatan" id="tanggal_mulai" name="tanggal_mulai" value="<?= old('tanggal_mulai'); ?>">
                    <?php if (session('errors.tanggal_mulai')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.tanggal_mulai'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai Kegiatan</label>
                    <input type="date" class="form-control <?= session('errors.tanggal_selesai') ? 'is-invalid' : ''; ?>" placeholder="Masukan Tanggal Selesai Kegiatan" id="tanggal_selesai" name="tanggal_selesai" value="<?= old('tanggal_selesai'); ?>">
                    <?php if (session('errors.tanggal_selesai')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.tanggal_selesai'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="kualifikasi_usaha">Kualifikasi Usaha</label>
                    <select class="form-control <?= session('errors.kualifikasi_usaha') ? 'is-invalid' : ''; ?>" id="kualifikasi_usaha" name="kualifikasi_usaha">
                        <option value="">Pilih Kualifikasi Usaha</option>
                        <option value="Mikro">Mikro</option>
                        <option value="Kecil">Kecil</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Besar">Besar</option>
                    </select>
                    <?php if (session('errors.kualifikasi_usaha')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.kualifikasi_usaha'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="kualifikasi_pengadaan">Jenis Kualifikasi Pengadaan</label>
                    <select class="form-control <?= session('errors.kualifikasi_pengadaan') ? 'is-invalid' : ''; ?>" id="kualifikasi_pengadaan" name="kualifikasi_pengadaan">
                        <option value="" selected>Pilih Kualifikasi Usaha</option>
                        <?php foreach ($jenisKualifikasi as $kualifikasi): ?>
                            <option value="<?= $kualifikasi['id']; ?>"><?= $kualifikasi['jenis_kualifikasi']; ?></option>
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
                        <option value="" selected>Pilih Spesifikasi</option>
                        <!-- Opsi spesifikasi akan dimuat di sini -->
                    </select>
                    <?php if (session('errors.spesifikasi')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.spesifikasi'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="dokumen">Dokumen Pendukung</label>
                    <input type="file" class="form-control <?= session('errors.dokumen') ? 'is-invalid' : ''; ?>" id="dokumen" name="dokumen">
                    <?php if (session('errors.dokumen')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.dokumen'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="status">Status Event</label>
                    <select class="form-control <?= session('errors.status') ? 'is-invalid' : ''; ?>" id="status" name="status">
                        <option value="" selected>Pilih Status</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Berjalan">Berjalan</option>
                        <option value="Pendaftaran">Registrasi</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <?php if (session('errors.status')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.status'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('managedpt'); ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
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