<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pekerjaan</h1>
        <ul class="list-inline mb-0 float-end">
            <li class="list-inline-item">
                <a href="<?= base_url('admincreatepekerjaan'); ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Pekerjaan</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4 mb-3">
            <div class="table-responsive">
                <table class="table table-bordered datatable " id="barangkeluarTable"
                    style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">No</th>
                            <th class="text-center align-middle" scope="col">Nama Paket Pengadaan</th>
                            <th class="text-center align-middle" scope="col">Nama Penyedia</th>
                            <th class="text-center align-middle" scope="col">PPK</th>
                            <th class="text-center align-middle" scope="col">Sumber Dana</th>
                            <th class="text-center align-middle" scope="col">Metode</th>
                            <th class="text-center align-middle" scope="col">Nomor Kontrak</th>
                            <th class="text-center align-middle" scope="col">Nilai kontrak</th>
                            <th class="text-center align-middle" scope="col">Tanggal Kontrak</th>
                            <th class="text-center align-middle" scope="col">Presentase</th>
                            <th class="text-center align-middle" scope="col">Status</th>
                            <th class="text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dataPekerkjaan)): ?>
                            <?php foreach ($dataPekerkjaan as $index => $data): ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1; ?></td>
                                    <td class="text-center"><?= $data['nama_paket_pengadaan']; ?></td>
                                    <td class="text-center"><?= $data['penyedia']; ?></td>
                                    <td class="text-center"><?= $data['ppk']; ?></td>
                                    <td class="text-center"><?= $data['sumber_dana']; ?></td>
                                    <td class="text-center"><?= $data['metode']; ?></td>
                                    <td class="text-center"><?= $data['nomor_kontrak']; ?></td>
                                    <td class="text-center"><?= $data['nilai_kontrak_ppn']; ?></td>
                                    <td class="text-center"><?= $data['tanggal_kontrak']; ?></td>
                                    <td class="text-center"><?= $data['presentase_kemajuan']; ?></td>
                                    <td class="text-center" style="width: 115px;">
                                        <form action="<?= base_url('adminupdatestatuspekerjaan/' . $data['id']); ?>" method="post" class="status-form">
                                            <select name="status_pekerjaan" class="form-select" onchange="this.form.submit()">
                                                <option value="berjalan" <?= $data['status_pekerjaan'] == 'berjalan' ? 'selected' : ''; ?>>Berjalan</option>
                                                <option value="selesai" <?= $data['status_pekerjaan'] == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= base_url('admindetailpekerjaan/' . $data['id']); ?>" class="btn-sm btn-secondary " style="text-decoration:none">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('admineditpekerjaan/' . $data['id']); ?>" class="btn-sm btn-warning mr-2 ml-2" style="text-decoration:none">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?= base_url('adminmanagepekerjaan/delete/' . $data['id']); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger">  <i class="fas fa-trash"></i></button>
                                            </form>

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
    </div>

    <?= $this->endSection() ?>