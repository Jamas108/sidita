<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIDITA</title>
    <base href="<?= base_url() ?>">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="lib/fontawesome-free/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="<?= base_url('be/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('lib/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('lib/aos/aos.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="lib/glightbox/css/glightbox.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        /* Perjelas border tabel */
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6 !important;
            /* Atur warna dan tebal border */
        }

        html,
        body {
            height: 100%;
            /* Ensure the body takes the full height of the screen */
            margin: 0;

        }
    </style>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('penyediadashboard'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-folder"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIDITA</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('penyediadashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                DPT
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('managedptpenyedia'); ?>">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>Informasi Penyedia</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('manageprofilepenyedia'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil Penyedia</span>
                </a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto mr-3">
                        <div class="d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/img/profile.png') ?>">
                                <span class="ml-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('name') ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div style="margin-left: -80px;" class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('manageprofilepenyedia'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <?= $this->renderSection('content') ?>
                <!-- <footer class="sticky-footer auto bg-white" style="position: relative; bottom: 0; width: 100%;">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Sidita 2024</span>
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Apakah yakin ingin keluar?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                        <a class="btn btn-primary" href="/logout">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="lib/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="be/js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="lib/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="be/js/demo/chart-area-demo.js"></script>
        <script src="be/js/demo/chart-pie-demo.js"></script>
        <!-- Memuat jQuery dan JavaScript DataTables -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- Inisialisasi DataTables -->
        <script>
            $(document).ready(function() {
                // Inisialisasi DataTables untuk tabel dengan class .datatable
                $('.datatable').DataTable();
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            // Menampilkan Toast hanya jika ada pesan dari flashdata
            <?php if (session()->getFlashdata('success')): ?>
                toastr.success('<?= session()->getFlashdata('success'); ?>', 'Success', {
                    "closeButton": true,
                    "progressBar": true,
                    "timeOut": 5000 // Waktu toast muncul dalam milidetik
                });
            <?php elseif (session()->getFlashdata('error')): ?>
                toastr.error('<?= session()->getFlashdata('error'); ?>', 'Error', {
                    "closeButton": true,
                    "progressBar": true,
                    "timeOut": 5000 // Waktu toast muncul dalam milidetik
                });
            <?php endif; ?>
        </script>
</body>

</html>