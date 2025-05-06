<?= $this->extend('ppk/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pekerjaan</h1> 
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
                        <?php
                        if (!empty($dataPekerkjaan)): ?>
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
                                    <td class="text-center"><?= $data['status_pekerjaan']; ?></td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center">
                                            <?php if ($data['status_pekerjaan'] === 'berjalan'): ?>
                                                <!-- Tampilkan tombol Edit jika status Berjalan -->
                                                <a href="<?= base_url('editpekerjaanppk/' . $data['id']); ?>" class="btn-sm btn-warning" style="text-decoration:none">
                                                    Edit
                                                </a>
                                            <?php elseif ($data['status_pekerjaan'] === 'selesai' && !$data['hasRated']): ?>
                                                <!-- Tampilkan tombol Nilai jika status Selesai dan belum dinilai -->
                                                <a href="<?= base_url('nilaipekerjaan/' . $data['id']); ?>" class="btn-sm btn-success" style="text-decoration:none">
                                                    Nilai
                                                </a>
                                            <?php elseif ($data['status_pekerjaan'] === 'selesai' && $data['hasRated']): ?>
                                                <!-- Tampilkan tombol Download PDF jika sudah dinilai oleh PPK yang sedang login -->

                                                <a href="<?= base_url('downloadpdfpenilaian/' . $data['id'] . '/' . session()->get('user_id')); ?>" class="btn-sm btn-primary" style="text-decoration:none">
                                                    Download PDF
                                                </a>


                                            <?php else: ?>
                                                <!-- Default jika status tidak diketahui -->
                                                <span class="text-muted">Aksi tidak tersedia</span>
                                            <?php endif; ?>
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