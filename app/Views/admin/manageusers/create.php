<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Akun Pengguna</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('storeakunusers') ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="nama_penyedia">Nama Lengkap</label>
                    <input type="text" class="form-control <?= session('errors.nama_penyedia') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Nama Penyedia" id="nama_penyedia" name="nama_penyedia"
                        value="<?= old('nama_penyedia'); ?>">
                    <?php if (session('errors.nama_penyedia')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.nama_penyedia'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control <?= session('errors.nip') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan NIP" id="nip" name="nip"
                        value="<?= old('nip'); ?>">
                    <?php if (session('errors.nip')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.nip'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control <?= session('errors.jabatan') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Jabatan" id="jabatan" name="jabatan"
                        value="<?= old('jabatan'); ?>">
                    <?php if (session('errors.jabatan')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jabatan'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control <?= session('errors.email') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan Email" id="email" name="email"
                        value="<?= old('email'); ?>">
                    <?php if (session('errors.email')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.email'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="Role">Pilih Role Akun</label>
                    <select class="form-control <?= session('errors.role_id') ? 'is-invalid' : ''; ?>" id="role_id" name="role_id">
                        <option value="" <?= old('role_id') ? '' : 'selected'; ?>>Pilih Role</option>
                        <?php foreach ($roleUser as $role): ?>
                            <option value="<?= $role['id']; ?>" <?= old('role_id') == $role['id'] ? 'selected' : ''; ?>>
                                <?= $role['role']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (session('errors.role_id')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.role_id'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : ''; ?>"
                        placeholder="Masukan password" id="password" name="password">
                    <?php if (session('errors.password')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.password'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password</label>
                    <input type="password" class="form-control <?= session('errors.konfirmasi_password') ? 'is-invalid' : ''; ?>"
                        placeholder="Konfirmasi Password" id="konfirmasi_password" name="konfirmasi_password">
                    <?php if (session('errors.konfirmasi_password')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.konfirmasi_password'); ?>
                        </div>
                    <?php endif; ?>
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