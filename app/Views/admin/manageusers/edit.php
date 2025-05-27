<?= $this->extend('admin/layoutglobal') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun Pengguna</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('updateakunusers/' . $user['id']); ?>" method="POST" enctype="multipart/form-data">
        <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="nama_penyedia">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama Penyedia" id="nama_penyedia" name="nama_penyedia"
                        value="<?= isset($user['nama_penyedia']) ? $user['nama_penyedia'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="nama_akhir_penyedia">NIP</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama Akhir Penyedia" id="nip" name="nip"
                        value="<?= isset($user['nip']) ? $user['nip'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="nama_akhir_penyedia">Jabatan</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama Akhir Penyedia" id="jabatan" name="jabatan"
                        value="<?= isset($user['jabatan']) ? $user['jabatan'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="Role"> Role Akun</label>
                    <select class="form-control" id="role_id" name="role_id" required>
                        <?php foreach ($roleUser as $role): ?>
                            <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('manageusers'); ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
                            <span class="text">Batal</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="col-md-12 mb-3 btn btn-primary btn-icon-split">
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?= $this->endSection() ?>