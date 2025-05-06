<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->get('/admin', 'Home::dashboard');

$routes->get('/login', 'AuthController::login');
$routes->post('/loginprocess', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/registerdpt', 'AuthController::registerProcess');



// $routes->get('/daftar', 'Home::login');

//-------------------/ SUPERADMIN ROUTES ROLE /------------------------//
//DPT ROUTE
$routes->group('', ['filter' => 'role:1'], function ($routes) {
    $routes->get('admindashboard', 'AdminDashboardController');
    $routes->get('profilsuperadmin', 'AdminDashboardController::profilSuperadmin');
    $routes->post('editpasswordsuperadmin', 'AdminDashboardController::editPasswordSuperadmin');
    $routes->get('superadminlogout', 'AdminDashboardController::superadminLogout');

    $routes->get('managedpt', 'ManageDptController');
    $routes->get('createdpt', 'ManageDptController::create');
    $routes->get('detaildpt/(:num)', 'ManageDptController::DetailDpt/$1');
    $routes->get('editprofilperusahaan/(:num)', 'ManageDptController::editProfilPerusahaan/$1');
    $routes->post('updateprofilperusahaan/(:num)', 'ManageDptController::updateProfilPerusahaan/$1');
    $routes->get('editadministrasiperusahaan/(:num)', 'ManageDptController::editAdministrasiPerusahaan/$1');
    $routes->post('updateadministrasiperusahaan/(:num)', 'ManageDptController::updateAdministrasiPerusahaan/$1');
    $routes->get('editkeuanganperusahaan/(:num)', 'ManageDptController::editKeuanganPerusahaan/$1');
    $routes->post('updatekeuanganperusahaan/(:num)', 'ManageDptController::updateKeuanganPerusahaan/$1');
    $routes->get('editpengalamanperusahaan/(:num)', 'ManageDptController::editPengalamanPerusahaan/$1');
    $routes->post('updatepengalamanperusahaan/(:num)', 'ManageDptController::updatePengalamanPerusahaan/$1');

    //MANAGE PENERIMAAN DPT ROUTE
    $routes->get('managepenerimaandpt', 'ManagePenerimaanDptController');
    $routes->get('createeventdpt', 'ManagePenerimaanDptController::create');
    $routes->get('editeventdpt/(:num)', 'ManagePenerimaanDptController::editEvent/$1');
    $routes->post('updateeventdpt/(:num)', 'ManagePenerimaanDptController::updateEvent/$1');
    $routes->get('detaileventdpt/(:num)', 'ManagePenerimaanDptController::DetailEvent/$1');
    $routes->post('storeevent', 'ManagePenerimaanDptController::store');
    $routes->post('updateStatusEvent/(:num)', 'ManagePenerimaanDptController::updateStatusEvent/$1');
    $routes->get('editberitaacaraevent/(:num)', 'ManagePenerimaanDptController::editBeritaAcaraEvent/$1');
    $routes->post('updateberitaacaraevent/(:num)', 'ManagePenerimaanDptController::updateBeritaAcaraEvent/$1');
    $routes->get('deleteeventdpt/(:num)', 'ManagePenerimaanDptController::deleteEvent/$1');

    //PENERIMAAN DPT
    $routes->get('listparticipant/(:num)', 'ManagePenerimaanDptController::participant/$1');
    $routes->get('editstatusparticipant/(:num)', 'ManagePenerimaanDptController::editStatusParticipant/$1');
    $routes->post('updatestatusparticipant/(:num)', 'ManagePenerimaanDptController::updateStatusParticipant/$1');
    $routes->get('detailpendaftar/(:num)', 'ManagePenerimaanDptController::DetailPendaftar/$1');
    $routes->get('managepenerimaandpt/getSpesifikasiByKualifikasi/(:num)', 'ManagePenerimaanDptController::getSpesifikasiByKualifikasi/$1');
    $routes->post('managedpt/accept/(:num)', 'ManagePenerimaanDptController::acceptParticipant/$1');
    $routes->post('rejectparticipant(:num)', 'ManagePenerimaanDptController::rejectParticipant/$1');
    $routes->get('send-dpt-emails', 'ManagePenerimaanDptController::sendDPTEmails');
    //SPESIFIKASI ROUTE
    $routes->get('managespesifikasi', 'ManageSpesifikasiController');
    $routes->get('createspesifikasi', 'ManageSpesifikasiController::create');
    $routes->get('editspesifikasi/(:num)', 'ManageSpesifikasiController::editSpesifikasi/$1');
    $routes->get('detailspesifikasi/(:num)', 'ManageSpesifikasiController::DetailSpesifikasi/$1');
    $routes->post('storespesifikasi', 'ManageSpesifikasiController::store');
    $routes->post('updatespesifikasi/(:num)', 'ManageSpesifikasiController::updateSpesifikasi/$1');
    $routes->get('deletespesifikasi/(:num)', 'ManageSpesifikasiController::deleteSpesifikasi/$1');

    //PEKERJAAN ROUTE
    $routes->get('adminmanagepekerjaan', 'ManagePekerjaanController');
    $routes->get('admincreatepekerjaan', 'ManagePekerjaanController::create');
    $routes->post('adminstorepekerjaan', 'ManagePekerjaanController::store');
    $routes->get('admindetailpekerjaan/(:num)', 'ManagePekerjaanController::DetailPekerjaan/$1');
    $routes->get('admineditpekerjaan/(:num)', 'ManagePekerjaanController::editPekerjaan/$1');
    $routes->post('adminupdatepekerjaan/(:num)', 'ManagePekerjaanController::updatePekerjaan/$1');
    $routes->delete('adminmanagepekerjaan/delete/(:num)', 'ManagePekerjaanController::deletePekerjaan/$1');
    $routes->post('adminupdatestatuspekerjaan/(:num)', 'ManagePekerjaanController::updateStatusPekerjaan/$1');

    //ANNOUNCEMENT ROUTE
    $routes->get('manageannouncement', 'ManageAnnounceController');
    $routes->get('createannouncement', 'ManageAnnounceController::create');
    $routes->post('storeannouncement', 'ManageAnnounceController::store');
    $routes->get('editannouncement/(:num)', 'ManageAnnounceController::editAnnouncement/$1');
    $routes->post('updateannouncement/(:num)', 'ManageAnnounceController::updateAnnouncement/$1');
    $routes->get('deleteannouncement/(:num)', 'ManageAnnounceController::deleteAnnouncement/$1');
    $routes->get('detailannouncement/(:num)', 'ManageAnnounceController::showAnnouncement/$1');
    $routes->get('file/show/(:segment)', 'FileController::show/$1');

    //MANAGE USERS ROUTE
    $routes->get('manageusers', 'ManageUsersController');
    $routes->get('createakunusers', 'ManageUsersController::create');
    $routes->post('storeakunusers', 'ManageUsersController::store');
    $routes->get('editakunusers/(:num)', 'ManageUsersController::editAkun/$1');
    $routes->post('updateakunusers/(:num)', 'ManageUsersController::updateAkun/$1');
    $routes->get('detailakunusers/(:num)', 'ManageUsersController::showAkunUsers/$1');
    $routes->get('deleteakunusers/(:num)', 'ManageUsersController::deleteAkunUsers/$1');
    $routes->get('passwordusers/(:num)', 'ManageUsersController::ShowPasswordUsers/$1');
    $routes->post('updatepasswordusers/(:num)', 'ManageUsersController::UpdatePasswordUsers/$1');

    //MANAGE USERS ROUTE
    $routes->get('managebroadcast', 'BroadcastController');
    $routes->post('storebroadcast', 'BroadcastController::store');
    $routes->post('updatebroadcast/(:num)', 'BroadcastController::updateBroadcast/$1');
});
//-------------------/ END SUPERADMIN ROUTES ROLE /------------------------//



//-------------------/ OPERATOR ROUTES ROLE /------------------------//
// INDEX ROUTE
$routes->group('', ['filter' => 'role:2'], function ($routes) {
    $routes->get('operatordashboard', 'OperatorController');
    $routes->get('operatorprofil', 'OperatorController::operatorProfil');
    $routes->post('operatorupdatepassword', 'OperatorController::operatorUpdatePassword');
    //MANAGE PEKERJAAN ROUTE 
    $routes->get('managepekerjaan', 'OperatorManagePekerjaanController');
    $routes->get('createpekerjaan', 'OperatorManagePekerjaanController::create');
    $routes->post('storepekerjaan', 'OperatorManagePekerjaanController::store');
    $routes->get('detailpekerjaan/(:num)', 'OperatorManagePekerjaanController::DetailPekerjaan/$1');
    $routes->get('editpekerjaan/(:num)', 'OperatorManagePekerjaanController::editPekerjaan/$1');
    $routes->post('updatepekerjaan/(:num)', 'OperatorManagePekerjaanController::updatePekerjaan/$1');
    $routes->delete('managepekerjaan/delete/(:num)', 'OperatorManagePekerjaanController::deletePekerjaan/$1');
    $routes->post('updatestatuspekerjaan/(:num)', 'OperatorManagePekerjaanController::updateStatusPekerjaan/$1');
});
//-------------------/ END OPERATOR ROUTES ROLE /------------------------//



//-------------------/ PPK ROUTES ROLE /------------------------//
// INDEX ROUTE
$routes->group('', ['filter' => 'role:3'], function ($routes) {
    $routes->get('ppkdashboard', 'PpkDashboardController');
    $routes->get('profilppk', 'PpkDashboardController::profilPpk');
    $routes->post('updatepasswordppk', 'PpkDashboardController::updatePasswordPpk');

    // MANAGE DPT PPK ROUTE
    $routes->get('managedptppk', 'PpkManageDptController');
    $routes->get('detaildptppk/(:num)', 'PpkManageDptController::DetailDpt/$1');

    // REVIEW PEKERJAAN PPK ROUTE
    $routes->get('managereviewpekerjaan', 'ReviewPekerjaanPpkController');
    $routes->get('editpekerjaanppk/(:num)', 'ReviewPekerjaanPpkController::editPekerjaanPpk/$1');
    $routes->post('updatepekerjaanppk/(:num)', 'ReviewPekerjaanPpkController::updatePekerjaanPpk/$1');
    $routes->get('nilaipekerjaan/(:num)', 'ReviewPekerjaanPpkController::nilaiPekerjaan/$1');
    $routes->post('storenilaipekerjaan/(:num)', 'ReviewPekerjaanPpkController::store/$1');

    // RIWAYAT PENILAIAN PPK ROUTE
    // $routes->get('manageriwayatpenilaian', 'RiwayatPenilaianPpkController');
    // $routes->get('detailpenilaian/(:num)', 'RiwayatPenilaianPpkController::detailPenilaian/$1');
    $routes->get('downloadpdfpenilaian/(:num)/(:num)', 'ReviewPekerjaanPpkController::downloadPdf/$1/$2');


    // Manage DPT PPK ROUTE



});
//-------------------/ END PPK ROUTES ROLE /------------------------//



//-------------------/ PENYEDIA ROUTES ROLE /------------------------//
$routes->group('', ['filter' => 'role:4'], function ($routes) {
    $routes->get('penyediadashboard', 'PenyediaController');
    $routes->get('showpengumuman/(:num)', 'PenyediaController::showPengumuman/$1');
    // INFORMASI DPT PENYEDIA ROUTE
    $routes->get('managedptpenyedia', 'ManageDptPenyediaController');
    $routes->get('editdatapenyedia/(:num)', 'ManageDptPenyediaController::editDataPenyedia/$1');
    $routes->post('updatedatapenyedia/(:num)', 'ManageDptPenyediaController::updateDataPenyedia/$1');
    // INFORMASI DPT PENYEDIA ROUTE
    $routes->get('manageprofilepenyedia', 'ProfilPenyediaController');
    $routes->post('ganti_password', 'ProfilPenyediaController::ganti_password');
    $routes->get('penyedialogout', 'ProfilPenyediaController::logout');
});
//-------------------/ END PENYEDIA ROUTES ROLE /------------------------//





///// PENGGUNA ROUTE /////
// DPT ROUTE
$routes->get('pendaftarandptpengguna', 'PenggunaDptController::create');
$routes->post('storependaftaran', 'PenggunaDptController::store');

$routes->get('api/provinces', 'WilayahAPIController::getProvinces');
$routes->get('api/regencies/(:num)', 'WilayahAPIController::getKabupaten/$1');
$routes->get('pendaftarandptpengguna', 'APIMataUangController::showForm');

$routes->get('file/(:any)', 'FileController::show/$1');
$routes->get('filepekerjaan/(:any)', 'FileController::showDokumenPekerjaan/$1');
