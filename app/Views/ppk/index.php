<?= $this->extend('ppk/layout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?= session()->get('name') ?>!</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Jumlah Pekerjaan -->
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs ml-2 font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Penyedia</div>
                            <div class="h5 mb-0 ml-2 font-weight-bold text-gray-800 ml-2"><?= $jumlahPenyedia ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300 mr-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Penyedia -->
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs ml-2 font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Pekerjaan</div>
                            <div class="h5 mb-0 ml-2 font-weight-bold text-gray-800 ml-2"><?= $jumlahPekerjaan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300 mr-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs ml-2 font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Pekerjaan Berjalan</div>
                            <div class="h5 mb-0 ml-2 font-weight-bold text-gray-800 ml-2"><?= $jumlahPekerjaanBerjalan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300 mr-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs ml-2 font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pekerjaan Selesai</div>
                            <div class="h5 mb-0 ml-2 font-weight-bold text-gray-800 ml-2"><?= $jumlahPekerjaanSelesai ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300 mr-2"></i>
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