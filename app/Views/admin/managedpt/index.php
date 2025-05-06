<?= $this->extend('admin/layout') ?>

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
                                            <a href="<?= base_url('detaildpt/' . $data['id']) ?>" class="btn-sm btn-secondary" style="text-decoration:none">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <!-- Tombol Edit -->
                                            <a href="javascript:void(0);" class="btn-sm btn-warning mr-2 ml-2" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data['id'] ?>" data-profil-id="<?= $data['profil_perusahaan_id'] ?>" style="text-decoration:none">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-sm btn-danger" style="text-decoration:none">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center" style="color: red;">Tidak ada data DPT ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Pilih Aksi Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Pilih aksi yang ingin Anda lakukan:</p>
                <div class="d-flex justify-content-center">
                    <a href="#" id="editProfilPerusahaan" class="btn btn-warning btn-sm mx-2">
                        Edit Profil Perusahaan
                    </a>
                    <a href="#" id="editDPT" class="btn btn-warning btn-sm mx-2">
                        Edit Administrasi
                    </a>
                    <a href="#" id="editKeuangan" class="btn btn-warning btn-sm mx-2">
                        Edit Keuangan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add the JavaScript to update the modal with the correct ID -->
<!-- Add the JavaScript to update the modal with the correct ID -->
<script>
    const editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const profilPerusahaanId = this.getAttribute('data-profil-id'); // Get the profil_perusahaan_id

            // Update the "Edit Profil Perusahaan" link to use profil_perusahaan_id
            document.getElementById('editProfilPerusahaan').href = '<?= base_url('editprofilperusahaan/'); ?>' + profilPerusahaanId;

            // Keep the other links as they are (using 'id')
            document.getElementById('editDPT').href = '<?= base_url('editadministrasiperusahaan/'); ?>' + id;
            document.getElementById('editKeuangan').href = '<?= base_url('editkeuanganperusahaan/'); ?>' + id;
            document.getElementById('editPengalamanPerusahaan').href = '<?= base_url('editpengalamanperusahaan/'); ?>' + id;
        });
    });
</script>

<?= $this->endSection() ?>