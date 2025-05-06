<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Spesifikasi</h1>
        <ul class="list-inline mb-0 float-end">
            <li class="list-inline-item">
                <a href="<?= base_url('createspesifikasi'); ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Spesifikasi</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 bg-white datatable"
                    style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">No</th>
                            <th class="text-center align-middle" scope="col">Jenis Kualifikasi</th>
                            <th class="text-center align-middle" scope="col">Nama Spesifikasi</th>
                            <th class="text-center align-middle" scope="col">Deskripsi</th>
                            <th class="text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($spesifikasiData)): ?>
                            <?php foreach ($spesifikasiData as $index => $data): ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1; ?></td>
                                    <td class="text-center"><?= esc($data['jenis_kualifikasi']); ?></td>
                                    <td class="text-center"><?= esc($data['nama_jenis_spesifikasi']); ?></td>
                                    <td class="text-center"><?= esc($data['deskripsi']) ?? 'N/A'; ?></td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= base_url('detailspesifikasi/' . $data['id']); ?>" class="btn-sm btn-secondary ml-2" style="text-decoration:none">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('editspesifikasi/' . $data['id']); ?>" class="btn-sm btn-warning mr-2 ml-2" style="text-decoration:none">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('deletespesifikasi/' . $data['id']); ?>" class="btn btn-sm btn-danger" style="text-decoration:none" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-danger">Tidak ada data spesifikasi ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if (session()->getFlashdata('success')): ?>
        toastr.success("<?= session()->getFlashdata('success') ?>");
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        toastr.error("<?= session()->getFlashdata('error') ?>");
    <?php endif; ?>
</script>



<?= $this->endSection() ?>