<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Penerimaan DPT</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Kegiatan" id="nama_kegiatan" name="nama_kegiatan"
                        value="<?= esc($event['nama_event']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai Kegiatan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Tanggal Mulai Kegiatan" id="tanggal_mulai" name="tanggal_mulai"
                        value="<?= esc($event['tanggal_mulai']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Mulai Kegiatan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Tanggal Selesai Kegiatan" id="tanggal_selesai" name="tanggal_selesai"
                        value="<?= esc($event['tanggal_selesai']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="spesifikasi">Kualifikasi Usaha</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Kegiatan" id="spesifikasi" name="spesifikasi"
                        value="<?= esc($event['kualifikasi_usaha']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="spesifikasi">Jenis Kualifikasi</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Kegiatan" id="spesifikasi" name="spesifikasi"
                        value=" <?= esc($event['jenis_kualifikasi'] ?? 'Tidak Diketahui'); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="spesifikasi">Jenis Spesifikasi</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Kegiatan" id="spesifikasi" name="spesifikasi"
                        value="<?= esc($event['nama_jenis_spesifikasi'] ?? 'Tidak Diketahui'); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="status_event">Status Event</label>
                    <input type="text" class="form-control"
                        placeholder="" id="status_eventasi" name="status_event"
                        value="<?= esc($event['status']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="dokumen_pendukung">Dokumen Pendukung</label>
                    <br/>
                    <?php if (!empty($event['dokumen'])): ?>
                        <a href="/file/<?= esc($event['dokumen']) ?>" target="_blank" class="form-control btn btn-sm btn-primary" style="width:13%;">
                        <span class="text">Lihat Dokumen</span>
                        </a>
                    <?php else: ?>
                        <p class="text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <div class="row mr-0">
                    <div class="col-md-12">
                        <a href="<?= base_url('managepenerimaandpt'); ?>" class="col-md-12 mb-3 btn btn-secondary">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <?= $this->endSection() ?>