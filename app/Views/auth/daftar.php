<?= $this->extend('auth/layout') ?>
<title>SIDITA | <?= $title; ?></title>
<?= $this->section('content') ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">DAFTAR DPT!</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('registerdpt'); ?>">
                                    <div class="form-group">
                                        <input type="text" name="nama_awal_penyedia" class="form-control form-control-user"
                                            id="nama_awal_penyedia" placeholder="Nama Awal Penyedia">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nama_penyedia" class="form-control form-control-user"
                                            id="nama_penyedia" placeholder="Nama Penyedia" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nama_akhir_penyedia" class="form-control form-control-user"
                                            id="nama_akhir_penyedia" placeholder="Nama Akhir Penyedia (Opsional)">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="role_id" class="form-control form-control-user"
                                            id="role_id" placeholder="Role ID" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Daftar
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.html">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
