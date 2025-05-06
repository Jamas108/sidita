<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pengumuman</h1>
        <ul class="list-inline mb-0 float-end">
            <li class="list-inline-item">
                <a href="<?= base_url('createannouncement'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Pengumuman</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 bg-white datatable" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">No</th>
                            <th class="text-center align-middle" scope="col">Judul</th>
                            <th class="text-center align-middle" scope="col">Deskripsi</th>
                            <th class="text-center align-middle" scope="col">Dokumen</th>
                            <th class="text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($announcements)): ?>
                            <?php foreach ($announcements as $key => $announcement): ?>
                                <tr>
                                    <td class="text-center"><?= $key + 1 ?></td>
                                    <td class="text-center"><?= $announcement['judul'] ?></td>
                                    <td class="text-center"><?= $announcement['deskripsi'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= esc($announcement['dokumen']) ?>" class="btn-sm btn-primary" style="text-decoration:none" target="_blank">
                                            Lihat Detail
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= base_url('detailannouncement/' . $announcement['id']); ?>" class="btn-sm btn-secondary" style="text-decoration:none">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('editannouncement/' . $announcement['id']); ?>" class="btn-sm btn-warning mr-2 ml-2" style="text-decoration:none">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('deleteannouncement/' . $announcement['id']); ?>"
                                                class="btn btn-sm btn-danger"
                                                style="text-decoration:none"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada pengumuman yang tersedia</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
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


<?= $this->endSection() ?>