<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Penerimaan DPT</h1>
        <ul class="list-inline mb-0 float-end">
            <li class="list-inline-item">
                <a href="<?= base_url('createeventdpt'); ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Event</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4 mb-3">
            <div class="table-responsive">
                <table class="table table-bordered datatable" id="barangkeluarTable"
                    style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">No</th>
                            <th class="text-center align-middle" scope="col">Nama Kegiatan</th>
                            <th class="text-center align-middle" scope="col">Tanggal Mulai</th>
                            <th class="text-center align-middle" scope="col">Tanggal Selesai</th>
                            <th class="text-center align-middle" scope="col">Kualifikasi Usaha</th>
                            <th class="text-center align-middle" scope="col">Jenis Kualifikasi</th>
                            <th class="text-center align-middle" scope="col">Jenis Spesifikasi</th>
                            <th class="text-center align-middle" scope="col">Berita Acara</th>
                            <th class="text-center align-middle" scope="col">Dokumen</th>
                            <th class="text-center align-middle" scope="col">Status</th>
                            <th class="text-center align-middle" scope="col">Aksi</th>
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
                                        <?php if (!empty($event['berita_acara'])): ?>
                                            <a href="<?= base_url('uploads/berita_acara_event/' . $event['berita_acara']); ?>" target="_blank" class="btn-sm btn-success" style="text-decoration:none">
                                                <i class="fas fa-file-alt"></i> Lihat
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">Tidak Ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (!empty($event['dokumen'])): ?>
                                            <a href="<?= base_url('uploads/dokumenevent/' . $event['dokumen']); ?>" target="_blank" class="btn-sm btn-success" style="text-decoration:none">
                                                <i class="fas fa-file-alt"></i> Lihat
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">Tidak Ada</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center" style="width: 115px;">
                                        <form action="<?= base_url('updateStatusEvent/' . $event['id']); ?>" method="post" class="status-form">
                                            <select name="status" class="form-select" onchange="this.form.submit()">
                                                <option value="Pending" <?= $event['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                                <option value="Berjalan" <?= $event['status'] == 'Berjalan' ? 'selected' : ''; ?>>Berjalan</option>
                                                <option value="Selesai" <?= $event['status'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                                            </select>
                                        </form>
                                    </td>

                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= base_url('listparticipant/' . $event['id']); ?>" class="btn-sm btn-primary" style="text-decoration:none">
                                                <i class="fas fa-list"></i>
                                            </a>
                                            <a href="<?= base_url('editberitaacaraevent/' . $event['id']); ?>" class="btn-sm btn-info ml-2" style="text-decoration:none">
                                                <i class="fas fa-file"></i>
                                            </a>
                                            <a href="<?= base_url('detaileventdpt/' . $event['id']); ?>" class="btn-sm btn-secondary ml-2" style="text-decoration:none">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('editeventdpt/' . $event['id']); ?>" class="btn-sm btn-warning mr-2 ml-2" style="text-decoration:none">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('deleteeventdpt/' . $event['id']); ?>"
                                                class="btn btn-sm btn-danger"
                                                style="text-decoration:none"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center text-danger">Tidak ada data event ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-danger').click(function(event) {
                event.preventDefault(); // Mencegah link diikuti langsung
                var url = $(this).attr('href');
                if (confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')) {
                    window.location.href = url; // Mengarahkan ke URL penghapusan jika konfirmasi
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.status-form select').change(function() {
                var form = $(this).closest('form');
                var formData = form.serialize();

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Status updated successfully');
                    },
                    error: function() {
                        alert('Error updating status');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-danger').click(function(event) {
                event.preventDefault(); // Mencegah link diikuti langsung
                var url = $(this).attr('href');
                if (confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')) {
                    window.location.href = url; // Mengarahkan ke URL penghapusan jika konfirmasi
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.status-form select').change(function() {
                var form = $(this).closest('form');
                var formData = form.serialize();

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Status updated successfully');
                    },
                    error: function() {
                        alert('Error updating status');
                    }
                });
            });
        });
    </script>



    <?= $this->endSection() ?>