<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reset Password Akun Pengguna</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('updatepasswordusers/' . $user['id']); ?>" method="POST">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" class="form-control" placeholder="Masukan Password Baru" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" placeholder="Konfirmasi Password Baru" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="row d-flex">
                    <div class="col-md-6 mt-2">
                        <button type="submit" class="btn btn-primary col-md-12">
                            <span class="text">Reset Password</span>
                        </button>
                    </div>
                    <div class="col-md-6 mt-2">
                        <a href="<?= base_url('manageusers'); ?>" class="btn btn-secondary col-md-12">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
