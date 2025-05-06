<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?= session()->get('name') ?>!</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ml-2">
                                Jumlah Penyedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahPenyedia ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 ml-2">
                                Jumlah Penyedia Belum Diterima</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahPenyediaPending ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 ml-2">
                                Jumlah Event</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahEvent ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 ml-2">
                                Jumlah Event Berjalan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahEventBerjalan ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ml-2">
                                Jumlah Kualifikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahKualifikasi ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 ml-2">
                                Jumlah Spesifikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahSpesifikasi ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 ml-2">
                                Jumlah Pengumuman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahPengumuman ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 ml-2">
                                Jumlah Akun</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 ml-2"><?= $jumlahAkun ?></div>
                        </div>
                        <div class="col-auto mr-2">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?= $this->endSection() ?>