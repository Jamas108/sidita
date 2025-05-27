<?= $this->extend('ppk/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola DPT</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4 mb-3">
            <div class="table-responsive">
                <table class="table table-bordered datatable " id="barangkeluarTable"
                    style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">No</th>
                            <th class="text-center align-middle" scope="col">Email</th>
                            <th class="text-center align-middle" scope="col">Nama Awal</th>
                            <th class="text-center align-middle" scope="col">Nama Perusahaan</th>
                            <th class="text-center align-middle" scope="col">Nama Akhir</th>
                            <th class="text-center align-middle" scope="col">Kualifikasi Usaha</th>
                            <th class="text-center align-middle" scope="col">Jenis Kualifikasi Pengadaan</th>
                            <th class="text-center align-middle" scope="col">Jenis Spesifikasi Pengadaan</th>
                            <th class="text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dptData)): ?>
                            <?php foreach ($dptData as $index => $data): ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1; ?></td>
                                    <td class="text-center"><?= $data['email']; ?></td>
                                    <td class="text-center"><?= $data['nama_awal_perusahaan']; ?></td>
                                    <td class="text-center"><?= $data['nama_perusahaan']; ?></td>
                                    <td class="text-center"><?= $data['nama_akhir_perusahaan']; ?></td>
                                    <td class="text-center"><?= $data['kualifikasi_usaha']; ?></td>
                                    <td class="text-center"><?= $data['jenis_kualifikasi_pengadaan']; ?></td>
                                    <td class="text-center"><?= $data['jenis_spesifikasi_pengadaan']; ?></td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= base_url('detaildptppk/' . $data['id']) ?>" class="btn-sm btn-secondary " style="text-decoration:none">
                                                <i class="fas fa-eye"></i>
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

    <?= $this->endSection() ?>