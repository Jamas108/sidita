<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informasi Akun</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3 text-center">
            <img class="img-profile rounded-circle border border-dark"
                src="<?= base_url('assets/img/profile.png') ?>" alt="Avatar" style="width: 120px; height: 120px;">
            <div class="row d-flex justify-content-between">
                <div class="form-group col-md-12 mt-2">
                    <input style="background-color: #002491; color: white; text-align:center;" type="text" class="form-control"
                        placeholder="" id="tahun_anggaran" name="tahun_anggaran"
                        value="Informasi Akun" disabled>
                </div>

                <!-- Display user data dynamically -->
                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="nama" name="nama" value="Nama" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="nama_penilai" name="nama_penilai"
                        value="<?= esc($user['nama_awal_penyedia']); ?> <?= esc($user['nama_penyedia']); ?> <?= esc($user['nama_akhir_penyedia']); ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="email" name="email" value="Email" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="email_user" name="email_user"
                        value="<?= esc($user['email']); ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="role" name="role" value="Role" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="role_user" name="role_user"
                        value="<?= esc($user['role']); ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                    <input style="background-color: #385dcf; color: white" type="text" class="form-control"
                        placeholder="" id="created_at" name="created_at" value="Tanggal Pembuatan Akun" disabled>
                </div>
                <div class="form-group col-md-8">
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Penilai" id="created_at_user" name="created_at_user"
                        value="<?= esc($user['created_at']); ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <a href="#" class="btn btn-sm btn-warning" style="width:100%" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Ganti Password</a>
                </div>
                <div class="form-group col-md-6">
                    <a href="#" class="btn btn-sm btn-danger" style="width:100%" onclick="logout()">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Changing Password -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Password Change Form -->
                <form method="POST" action="<?= base_url('editpasswordsuperadmin') ?>">
                    <div class="form-group">
                        <label for="currentPassword">Password Lama</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="newPassword">Password Baru</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="confirmPassword">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        // Redirect to logout controller to handle the session destroy
        window.location.href = "<?= base_url('penyedialogout'); ?>";
    }
</script>


<?= $this->endSection() ?>