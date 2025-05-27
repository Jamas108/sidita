<?= $this->extend('fe_assets') ?>

<?= $this->section('content') ?>
<section id="hero" class="hero section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Selamat datang di SIDITA</h1>
        <p>Sistem Informasi Daftar Penyedia Tetap</p>
        <div class="d-flex">
          <a href="<?= base_url('login') ?>" class="btn-get-started">Login</a>
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section>

<section id="about" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Daftar Event</h2>
    <div class="card p-4 bg-muted" style="border-radius:20px; overflow-x: scroll">
      <table id="example" class="display stripe table-responsive" style="width:100%;">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Kegiatan</th>
            <th class="text-center">Tanggal Mulai</th>
            <th class="text-center">Tanggal Berakhir</th>
            <th class="text-center">Kualifikasi Usaha</th>
            <th class="text-center">Jenis Kualifikasi</th>
            <th class="text-center">Jenis Spesifikasi</th>
            <th class="text-center">Status Event</th>
            <th class="text-center" style="width: 120px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($eventData)): ?>
            <?php foreach ($eventData as $index => $event): ?>
              <tr>
                <td class="text-center"><?= $index + 1; ?></td>
                <td class="text-center"><?= $event['nama_event']; ?></td>
                <td class="text-center"><?= $event['tanggal_mulai']; ?></td>
                <td class="text-center"><?= $event['tanggal_selesai']; ?></td>
                <td class="text-center"><?= $event['kualifikasi_usaha']; ?></td>
                <td class="text-center">
                  <?= isset($kualifikasiMap[$event['jenis_kualifikasi_id']]) ? $kualifikasiMap[$event['jenis_kualifikasi_id']] : 'Tidak Diketahui'; ?>
                </td>
                <td class="text-center">
                  <?= isset($spesifikasiMap[$event['jenis_spesifikasi_id']]) ? $spesifikasiMap[$event['jenis_spesifikasi_id']] : 'Tidak Diketahui'; ?>
                </td>
                <td class="text-center">
                  <!-- Check status and apply the correct text color -->
                  <span class="<?= ($event['status'] == 'Selesai') ? 'text-danger' : ($event['status'] == 'Berjalan' ? 'text-success' : 'text-muted'); ?>">
                    <?= $event['status']; ?>
                  </span>
                </td>
                <td class="text-center align-center" style="width: 200px;">
                  <div class="d-flex justify-content-center">
                    <?php if ($event['status'] == 'Selesai'): ?>
                      <?php if (!empty($event['berita_acara'])): ?>
                        <a href="<?= base_url('uploads/berita_acara/' . $event['berita_acara']); ?>" target="_blank" class="btn btn-sm btn-success" style="text-decoration:none; margin-right: 10px; width: 50%">
                          <i class="fas fa-file-alt"></i>BA
                        </a>
                      <?php else: ?>
                        <span class="text-muted">Tidak Ada Berita Acara</span>
                      <?php endif; ?>
                    <?php elseif ($event['status'] != 'Berjalan'): ?>
                      <a href="<?= base_url('pendaftarandptpengguna') . '?event_id=' . $event['id'] .
                                  '&kualifikasi_usaha=' . urlencode($event['kualifikasi_usaha']) .
                                  '&jenis_kualifikasi_id=' . $event['jenis_kualifikasi_id'] .
                                  '&jenis_spesifikasi_id=' . $event['jenis_spesifikasi_id']; ?>"
                        class="btn btn-sm btn-info text-white" style="margin-right: 10px">Daftar</a>
                    <?php endif; ?>
                    <?php if (!empty($event['dokumen'])): ?>
                      <a href="<?= base_url('uploads/dokumenevent/' . $event['dokumen']); ?>" target="_blank" class="btn btn-sm btn-warning" style="text-decoration:none">
                        <i class="fas fa-file-alt"></i>Dokumen
                      </a>
                    <?php else: ?>
                      <span class="text-muted">Tidak Ada Berita Acara</span>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>

          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="container">
  </div>
</section>


<section id="about" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Pengumuman</h2>
    <div class="card p-4 bg-muted" style="border-radius:20px; overflow-x: scroll">
      <table class="table table-bordered table-hover mb-0 bg-white datatable" style="width: 100%">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Dokumen</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($pengumumanData)): ?>
            <?php foreach ($pengumumanData as $index => $pengumuman): ?>
              <tr>
                <td class="text-center"><?= $index + 1; ?></td>
                <td class="text-center"><?= $pengumuman['judul']; ?></td>
                <td class="text-center"><?= $pengumuman['deskripsi']; ?></td>
                <td class="text-center"><a href="<?= esc($pengumuman['dokumen']) ?>" class="btn-sm btn-primary" style="text-decoration:none" target="_blank">
                    Lihat Dokumen
                  </a></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" style="color: red;">Tidak ada pengumuman</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  new DataTable('#example');
</script>

<?= $this->endSection() ?>