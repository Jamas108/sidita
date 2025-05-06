<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peserta Pendaftar Event DPT</h1>

    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4 mb-3">
            <div class="table-responsive">
                <table class="table table-bordered datatable " id="barangkeluarTable"
                    style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">No</th>
                            <th class="text-center align-middle" scope="col">Nama Awal Perusahaan</th>
                            <th class="text-center align-middle" scope="col">Nama Perusahaan</th>
                            <th class="text-center align-middle" scope="col">Nama Akhir Perusahaan</th>
                            <th class="text-center align-middle" scope="col">Status</th>
                            <th class="text-center align-middle" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ParticipantData) && is_array($ParticipantData)): ?>
                            <?php foreach ($ParticipantData as $index => $participant): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $index + 1 ?></td>
                                    <td class="text-center align-middle"><?= esc($participant['nama_awal_perusahaan']) ?></td>
                                    <td class="text-center align-middle"><?= esc($participant['nama_perusahaan']) ?></td>
                                    <td class="text-center align-middle"><?= esc($participant['nama_akhir_perusahaan']) ?></td>
                                    <td class="text-center align-middle"><?= esc($participant['status_name']) ?></td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= base_url('detailpendaftar/' . $participant['id']) ?>" class="btn btn-sm btn-secondary mr-2"><i class="fas fa-eye"></i></a>

                                            <?php if ($participant['status_dpt_id'] == 1 || $participant['status_dpt_id'] == 2): ?>
                                                <!-- Button to trigger status update modal -->
                                                <!-- <a href="<?= base_url('editstatusparticipant/' . $participant['id']) ?>" class="btn btn-sm btn-secondary mr-2"><i class="fas fa-eye"></i></a> -->
                                            <?php endif; ?>

                                            <?php if ($participant['status_dpt_id'] == 3): ?>
                                                <form action="<?= base_url('managedpt/accept/' . $participant['id']) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menerima peserta ini?')">
                                                    <button type="submit" class="btn btn-sm btn-success mr-2"><i class="fas fa-check"></i></button>
                                                </form>
                                                <form action="<?= base_url('rejectparticipant' . $participant['id']) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menolak peserta ini?')">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada peserta yang ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Berita Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('uploadberitaacara'); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="beritaAcara" class="form-label">Pilih Berita Acara</label>
                            <input type="file" class="form-control" id="beritaAcara" name="berita_acara" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?= $this->endSection() ?>