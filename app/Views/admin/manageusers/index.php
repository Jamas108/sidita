<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Akun</h1>
        <ul class="list-inline mb-0 float-end">
            <li class="list-inline-item">
                <a href="<?= base_url('createakunusers'); ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Akun</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 bg-white datatable" id="barangkeluarTable"
                    style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">No</th>
                            <th class="text-center align-middle" scope="col">Nama Penyedia</th>
                            <th class="text-center align-middle" scope="col">Email</th>
                            <th class="text-center align-middle" scope="col">Role</th>
                            <th class="text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dataUser)): ?>
                            <?php foreach ($dataUser as $index => $data): ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1; ?></td>
                                    <td class="text-center"><?= $data['nama_penyedia']; ?></td>
                                    <td class="text-center"><?= $data['email']; ?></td>
                                    <td class="text-center"><?= $data['role']; ?></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= base_url('detailakunusers/' . $data['id']); ?>" class="btn-sm btn-secondary" style="text-decoration:none">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('editakunusers/' . $data['id']); ?>" class="btn-sm btn-warning mr-2 ml-2" style="text-decoration:none">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('passwordusers/' . $data['id']); ?>" class="btn-sm btn-primary mr-2" style="text-decoration:none">
                                                <i class="fas fa-key"></i>
                                            </a>
                                            <a href="<?= base_url('deleteakunusers/' . $data['id']); ?>"
                                                class="btn btn-sm btn-danger"
                                                style="text-decoration:none"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada data spesifikasi ditemukan.</td>
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
                if (confirm('Apakah Anda yakin ingin menghapus akun ini?')) {
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