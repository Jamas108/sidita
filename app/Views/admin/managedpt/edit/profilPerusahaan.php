<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit DPT</h1>
    </div>
    <form action="<?= base_url('updateprofilperusahaan/' . $data['profilPerusahaan']['profil_perusahaan_id']); ?>" method="POST" enctype="multipart/form-data">
        <div class="container-fluid pt-2 px-2">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <p for="nama_awal_perusahaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nama Awal Perusahaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="nama_awal_perusahaan" name="nama_awal_perusahaan"
                        value="<?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="nama_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Perusahaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan"
                        value="<?= esc($data['profilPerusahaan']['nama_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="No_Surat" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Akhir Perusahaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="nama_akhir_perusahaan" name="nama_akhir_perusahaan" 
                        value="<?= esc($data['profilPerusahaan']['nama_akhir_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="tanggal_berdiri_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Tanggal Berdiri Perusahaan</p>
                    <input style="margin-top:-15px" type="date" class="form-control"
                        placeholder="Masukan Tanggal Berdiri Perusahaan" id="tanggal_berdiri_perusahaan" name="tanggal_berdiri_perusahaan" 
                        value="<?= esc($data['profilPerusahaan']['tanggal_berdiri_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="kualifikasi_usaha" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kualifikasi Usaha</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="kualifikasi_usaha" name="kualifikasi_usaha" 
                        value="<?= esc($data['profilPerusahaan']['kualifikasi_usaha']) ?>">
                </div>
                <div class="form-group">
                    <p for="jenis_kualifikasi_pengadaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Kualifikasi Pengadaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="jenis_kualifikasi_pengadaan" name="jenis_kualifikasi_pengadaan" 
                        value="<?= esc($data['profilPerusahaan']['jenis_kualifikasi_pengadaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="jenis_spesifikasi_pengadaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Spesifikasi Pengadaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="jenis_spesifikasi_pengadaan" name="jenis_spesifikasi_pengadaan" 
                        value="<?= esc($data['profilPerusahaan']['jenis_spesifikasi_pengadaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="no_pkp" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No PKP</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="no_pkp" name="no_pkp" 
                        value="<?= esc($data['profilPerusahaan']['no_pkp']) ?>">
                </div>
                <div class="form-group">
                    <p for="no_npwp" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No NPWP</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="no_npwp" name="no_npwp" 
                        value="<?= esc($data['profilPerusahaan']['no_npwp']) ?>">
                </div>
                <div class="form-group">
                    <p for="nama_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Pemiiki Perusahaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="nama_pemilik_perusahaan" name="nama_pemilik_perusahaan" 
                        value="<?= esc($data['profilPerusahaan']['nama_pemilik_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="no_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. Identitas Pemilik Perusahaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="no_identitas_pemilik_perusahaan" name="no_identitas_pemilik_perusahaan" 
                        value="<?= esc($data['profilPerusahaan']['no_identitas_pemilik_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="jenis_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Identitas Pemilik Perusahaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="jenis_identitas_pemilik_perusahaan" name="jenis_identitas_pemilik_perusahaan" 
                        value="<?= esc($data['profilPerusahaan']['jenis_identitas_pemilik_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="kepemilikan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kepemilikan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="kepemilikan" name="kepemilikan" 
                        value="<?= esc($data['profilPerusahaan']['kepemilikan']) ?>">
                </div>
                <div class="form-group">
                    <p for="alamat" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Alamat</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="alamat" name="alamat" 
                        value="<?= esc($data['profilPerusahaan']['alamat']) ?>">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <p for="latitude" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Latitude</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="latitude" name="latitude" 
                            value="<?= esc($data['profilPerusahaan']['latitude']) ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <p for="longitude" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Longitude</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="longitude" name="longitude" 
                            value="<?= esc($data['profilPerusahaan']['longitude']) ?>">
                    </div>


                    <div class="form-group col-md-6">
                        <p for="provinsi" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Provinsi</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="provinsi" name="provinsi" 
                            value="<?= esc($data['profilPerusahaan']['provinsi']) ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <p for="kabupaten" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kabupaten</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="kabupaten" name="kabupaten" 
                            value="<?= esc($data['profilPerusahaan']['kabupaten']) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <p for="kode_pos" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kode Pos</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="kode_pos" name="kode_pos" 
                        value="<?= esc($data['profilPerusahaan']['kode_pos']) ?>">
                </div>
                <p class="text-start mt-2" style="color: black; font-size:medium">Informasi Rekening</p>
                <div class="form-group" style="margin-top: -15px;">
                    <p for="nama_bank" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Bank</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="nama_bank" name="nama_bank" 
                        value="<?= esc($data['profilPerusahaan']['nama_bank']) ?>">
                       
                </div>
                <div class="form-group">
                    <p for="no_rekening" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No Rekening</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="no_rekening" name="no_rekening" 
                        value="<?= esc($data['profilPerusahaan']['no_rekening']) ?>">
                </div>
                <div class="form-group">
                    <p for="mata_uang_bank" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Mata Uang Bank</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="mata_uang_bank" name="mata_uang_bank" 
                        value="<?= esc($data['profilPerusahaan']['mata_uang_bank']) ?>">
                </div>


                <div class="form-group">
                    <p for="email" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Email</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="email" name="email" 
                        value="<?= esc($data['profilPerusahaan']['email']) ?>">
                </div>
                <div class="form-group">
                    <p for="website" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Website</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="website" name="website" 
                        value="<?= esc($data['profilPerusahaan']['website']) ?>">
                </div>
                <div class="form-group">
                    <p for="no_telepon_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. Telepon Kantor</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="no_telepon_kantor" name="no_telepon_kantor" 
                        value="<?= esc($data['profilPerusahaan']['no_telepon_kantor']) ?>">
                </div>
                <div class="form-group">
                    <p for="no_hp_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. HP Kantor</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="no_hp_kantor" name="no_hp_kantor" 
                        value="<?= esc($data['profilPerusahaan']['no_hp_kantor']) ?>">
                </div>
                <div class="form-group">
                    <p for="no_fax_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. FAX Kantor</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="no_fax_kantor" name="no_fax_kantor"
                        value="<?= esc($data['profilPerusahaan']['no_fax_kantor']) ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Edit Profil Perusahaan</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>