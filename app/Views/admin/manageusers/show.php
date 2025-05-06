<?= $this->extend('admin/layoutGlobal') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Akun Pengguna</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="nama_penyedia">Nama</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penyedia" id="nama_penyedia" name="nama_penyedia"
                        value="<?= esc($user['nama_awal_penyedia']); ?> <?= esc($user['nama_penyedia']); ?> <?= esc($user['nama_akhir_penyedia']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Email" id="email" name="email"
                        value="<?= esc($user['email']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Role</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Email" id="email" name="email"
                        value="<?= esc($user['role']); ?>" readonly>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <a href="<?= base_url('manageusers'); ?>" class="col-md-12 mb-3 btn btn-secondary">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <?= $this->endSection() ?>