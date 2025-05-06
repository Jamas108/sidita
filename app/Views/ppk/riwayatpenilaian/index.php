<?= $this->extend('ppk/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Penilaian</h1>
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
                            <th class="text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPenilaian as $index => $data): ?>
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
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center">
                                        <a href="<?= base_url('detailpenilaian/' . $data['id']); ?>" class="btn-sm btn-warning" style="text-decoration:none">
                                        <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url('downloadpdf/' . $data['id']); ?>" class="btn-sm btn-danger ml-2" style="text-decoration:none">
                                        <i class="fas fa-file-pdf"></i>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>