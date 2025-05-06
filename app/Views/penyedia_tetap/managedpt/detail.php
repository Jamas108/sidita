<?= $this->extend('penyedia_tetap/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pendaftar</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profil-perusahaan-tab" data-bs-toggle="tab" data-bs-target="#profile-perusahaan-tab-pane" type="button" role="tab" aria-controls="profile-perusahaan-tab-pane" aria-selected="true">Profil Perusahaan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="administrasi-tab" data-bs-toggle="tab" data-bs-target="#administrasi-tab-pane" type="button" role="tab" aria-controls="administrasi-tab-pane" aria-selected="false">Administrasi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="keuangan-tab" data-bs-toggle="tab" data-bs-target="#keuangan-tab-pane" type="button" role="tab" aria-controls="keuangan-tab-pane" aria-selected="false">Keuangan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pengalaman-tab" data-bs-toggle="tab" data-bs-target="#pengalaman-tab-pane" type="button" role="tab" aria-controls="pengalaman-tab-pane" aria-selected="false">Pengalaman</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pekerjaan-tab" data-bs-toggle="tab" data-bs-target="#pekerjaan-tab-pane" type="button" role="tab" aria-controls="pekerjaan-tab-pane" aria-selected="false">Riwayat Pekerjaan</button>
                </li>
            </ul>

            <!-- FIELD FORM PROFILE PERUSAHAAN -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile-perusahaan-tab-pane" role="tabpanel" aria-labelledby="profile-perusahaan-tab" tabindex="0">
                    <div class="form-group">
                        <p for="nama_awal_perusahaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nama Awal Perusahaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="nama_awal_perusahaan" name="nama_awal_perusahaan" readonly
                            value="<?= esc($participant['nama_awal_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="nama_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Perusahaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" readonly
                            value="<?= esc($participant['nama_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="No_Surat" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Akhir Perusahaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="nama_akhir_perusahaan" name="nama_akhir_perusahaan" readonly
                            value="<?= esc($participant['nama_akhir_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="tanggal_berdiri_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Tanggal Berdiri Perusahaan</p>
                        <input style="margin-top:-15px" type="date" class="form-control"
                            placeholder="Masukan Tanggal Berdiri Perusahaan" id="tanggal_berdiri_perusahaan" name="tanggal_berdiri_perusahaan" readonly
                            value="<?= esc($participant['tanggal_berdiri_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="kualifikasi_usaha" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kualifikasi Usaha</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="kualifikasi_usaha" name="kualifikasi_usaha" readonly
                            value="<?= esc($participant['kualifikasi_usaha']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="jenis_kualifikasi_pengadaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Kualifikasi Pengadaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="jenis_kualifikasi_pengadaan" name="jenis_kualifikasi_pengadaan" readonly
                            value="<?= esc($participant['jenis_kualifikasi_pengadaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="jenis_spesifikasi_pengadaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Spesifikasi Pengadaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="jenis_spesifikasi_pengadaan" name="jenis_spesifikasi_pengadaan" readonly
                            value="<?= esc($participant['jenis_spesifikasi_pengadaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_pkp" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No PKP</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="no_pkp" name="no_pkp" readonly
                            value="<?= esc($participant['no_pkp']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_npwp" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No NPWP</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="no_npwp" name="no_npwp" readonly
                            value="<?= esc($participant['no_npwp']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="nama_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Pemiiki Perusahaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="nama_pemilik_perusahaan" name="nama_pemilik_perusahaan" readonly
                            value="<?= esc($participant['nama_pemilik_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. Identitas Pemilik Perusahaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="no_identitas_pemilik_perusahaan" name="no_identitas_pemilik_perusahaan" readonly
                            value="<?= esc($participant['no_identitas_pemilik_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="jenis_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Identitas Pemilik Perusahaan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="jenis_identitas_pemilik_perusahaan" name="jenis_identitas_pemilik_perusahaan" readonly
                            value="<?= esc($participant['jenis_identitas_pemilik_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="kepemilikan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kepemilikan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            placeholder="Masukan Nama Perusahaan" id="kepemilikan" name="kepemilikan" readonly
                            value="<?= esc($participant['kepemilikan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="alamat" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Alamat</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="alamat" name="alamat" readonly
                            value="<?= esc($participant['alamat']) ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <p for="latitude" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Latitude</p>
                            <input style="margin-top:-15px" type="text" class="form-control"
                                id="latitude" name="latitude" readonly
                                value="<?= esc($participant['latitude']) ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <p for="longitude" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Longitude</p>
                            <input style="margin-top:-15px" type="text" class="form-control"
                                id="longitude" name="longitude" readonly
                                value="<?= esc($participant['longitude']) ?>">
                        </div>


                        <div class="form-group col-md-6">
                            <p for="provinsi" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Provinsi</p>
                            <input style="margin-top:-15px" type="text" class="form-control"
                                id="provinsi" name="provinsi" readonly
                                value="<?= esc($participant['provinsi']) ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <p for="kabupaten" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kabupaten</p>
                            <input style="margin-top:-15px" type="text" class="form-control"
                                id="kabupaten" name="kabupaten" readonly
                                value="<?= esc($participant['kabupaten']) ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <p for="kode_pos" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kode Pos</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="kode_pos" name="kode_pos" readonly
                            value="<?= esc($participant['kode_pos']) ?>">
                    </div>
                    <p class="text-start mt-2" style="color: black; font-size:medium">Informasi Rekening</p>
                    <div class="form-group" style="margin-top: -15px;">
                        <p for="nama_bank" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Bank</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="nama_bank" name="nama_bank" readonly
                            value="<?= esc($participant['nama_bank']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_rekening" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No Rekening</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="no_rekening" name="no_rekening" readonly
                            value="<?= esc($participant['no_rekening']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="mata_uang_bank" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Mata Uang Bank</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="mata_uang_bank" name="mata_uang_bank" readonly
                            value="<?= esc($participant['mata_uang_bank']) ?>">
                    </div>


                    <div class="form-group">
                        <p for="email" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Email</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="email" name="email" readonly
                            value="<?= esc($participant['email']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="website" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Website</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="website" name="website" readonly
                            value="<?= esc($participant['website']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_telepon_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. Telepon Kantor</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="no_telepon_kantor" name="no_telepon_kantor" readonly
                            value="<?= esc($participant['no_telepon_kantor']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_hp_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. HP Kantor</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="no_hp_kantor" name="no_hp_kantor" readonly
                            value="<?= esc($participant['no_hp_kantor']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_fax_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. FAX Kantor</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="no_fax_kantor" name="no_fax_kantor" readonly
                            value="<?= esc($participant['no_fax_kantor']) ?>">
                    </div>
                </div>


                <!-- FIELD FORM ADMINISTRASI PERUSAHAAN -->
                <div class="tab-pane fade" id="administrasi-tab-pane" role="tabpanel" aria-labelledby="administrasi-tab" tabindex="0">
                    <p class="text-start mt-2" style="color: black; font-size:medium">1. Identitas Pejabat Berwenang</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="nama_pejabat_berwenang" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nama</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="nama_pejabat_berwenang" name="nama_pejabat_berwenang" readonly
                            value="<?= esc($participant['nama_pejabat_berwenang']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="alamat_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Alamat</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="alamat_pejabat_berwenang" name="alamat_pejabat_berwenang" readonly
                            value="<?= esc($participant['alamat_pejabat_berwenang']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="no_identitas_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. Identitas</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="no_identitas_pejabat_berwenang" name="no_identitas_pejabat_berwenang" readonly
                            value="<?= esc($participant['no_identitas_pejabat_berwenang']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="jenis_identitas_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Identitas</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="jenis_identitas_pejabat_berwenang" name="jenis_identitas_pejabat_berwenang" readonly
                            value="<?= esc($participant['jenis_identitas_pejabat_berwenang']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="jabatan_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jabatan</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="jabatan_pejabat_berwenang" name="jabatan_pejabat_berwenang" readonly
                            value="<?= esc($participant['jabatan_pejabat_berwenang']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_bukti_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">
                            File Bukti
                        </p>

                        <?php if (!empty($participant['file_bukti_pejabat_berwenang'])): ?>
                            <a href="/file/<?= esc($participant['file_bukti_pejabat_berwenang']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>

                    <p class="text-start mt-3" style="color: black; font-size:medium">2. Unggah Formulir Keikutsertaan</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_formulir_keikutsertaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_formulir_keikutsertaan" name="keterangan_file_formulir_keikutsertaan" readonly
                            value="<?= esc($participant['keterangan_file_formulir_keikutsertaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_formulir_keikutsertaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_formulir_keikutsertaan'])): ?>
                            <a href="/file/<?= esc($participant['file_formulir_keikutsertaan']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">3. Unggah Surat Pernyataan</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_surat_pernyataan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_surat_pernyataan" name="keterangan_file_surat_pernyataan" readonly
                            value="<?= esc($participant['keterangan_file_surat_pernyataan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_surat_pernyataan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_surat_pernyataan'])): ?>
                            <a href="/file/<?= esc($participant['file_surat_pernyataan']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">4. Unggah Pakta Integritas</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_pakta_integritas" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_pakta_integritas" name="keterangan_file_pakta_integritas" readonly
                            value="<?= esc($participant['keterangan_file_pakta_integritas']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_pakta_integritas" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_pakta_integritas'])): ?>
                            <a href="/file/<?= esc($participant['file_pakta_integritas']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">5. Unggah Akta pendirian perusahaan dan akta perubahan terakhir dalam hal terjadi perubahan</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_akta_pendirian_perusahaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_akta_pendirian_perusahaan" name="keterangan_file_akta_pendirian_perusahaan" readonly
                            value="<?= esc($participant['keterangan_file_akta_pendirian_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_akta_pendirian_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_akta_pendirian_perusahaan'])): ?>
                            <a href="/file/<?= esc($participant['file_akta_pendirian_perusahaan']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">6. Unggah Surat Keterangan Domisili</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_surat_keterangan_domisili" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_akta_pendirian_perusahaan" name="keterangan_file_akta_pendirian_perusahaan" readonly
                            value="<?= esc($participant['keterangan_file_akta_pendirian_perusahaan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_surat_keterangan_domisili" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_surat_keterangan_domisili'])): ?>
                            <a href="/file/<?= esc($participant['file_surat_keterangan_domisili']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">7. Unggah NIB</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_nib" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_nib" name="keterangan_file_nib" readonly
                            value="<?= esc($participant['keterangan_file_nib']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_nib" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_nib'])): ?>
                            <a href="/file/<?= esc($participant['file_nib']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">8. Unggah SIUP</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_siup" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_siup" name="keterangan_file_siup" readonly
                            value="<?= esc($participant['keterangan_file_siup']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_siup" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_siup'])): ?>
                            <a href="/file/<?= esc($participant['file_siup']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">9. Unggah SIUJK</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_siujk" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_siujk" name="keterangan_file_siujk" readonly
                            value="<?= esc($participant['keterangan_file_siujk']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_siujk" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_siujk'])): ?>
                            <a href="/file/<?= esc($participant['file_siujk']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">10. Unggah SBU</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_sbu" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_sbu" name="keterangan_file_sbu" readonly
                            value="<?= esc($participant['keterangan_file_sbu']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_sbu" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_sbu'])): ?>
                            <a href="/file/<?= esc($participant['file_sbu']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">11. Unggah Pendukung Kualifikasi</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_pendukung_kualifikasi" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_pendukung_kualifikasi" name="keterangan_file_pendukung_kualifikasi" readonly
                            value="<?= esc($participant['keterangan_file_pendukung_kualifikasi']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_pendukung_kualifikasi" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_pendukung_kualifikasi'])): ?>
                            <a href="/file/<?= esc($participant['file_pendukung_kualifikasi']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">12. Unggah Pendukung Kualifikasi</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_pendukung_kualifikasi2" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_pendukung_kualifikasi2" name="keterangan_file_pendukung_kualifikasi2" readonly
                            value="<?= esc($participant['keterangan_file_pendukung_kualifikasi2']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_pendukung_kualifikasi2" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_pendukung_kualifikasi2'])): ?>
                            <a href="/file/<?= esc($participant['file_pendukung_kualifikasi2']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">13. Unggah Pendukung Kualifikasi</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_pendukung_kualifikasi3" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_pendukung_kualifikasi3" name="keterangan_file_pendukung_kualifikasi3" readonly
                            value="<?= esc($participant['keterangan_file_pendukung_kualifikasi3']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_pendukung_kualifikasi3" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_pendukung_kualifikasi3'])): ?>
                            <a href="/file/<?= esc($participant['file_pendukung_kualifikasi3']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- FORM KEUANGAN -->
                <div class="tab-pane fade" id="keuangan-tab-pane" role="tabpanel" aria-labelledby="keuangan-tab" tabindex="0">
                    <p class="text-start mt-3" style="color: black; font-size:medium">1. Unggah Laporan Keuangan</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_laporan_keuangan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_laporan_keuangan" name="keterangan_file_laporan_keuangan" readonly
                            value="<?= esc($participant['keterangan_file_laporan_keuangan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_laporan_keuangan" class="text-start" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_laporan_keuangan'])): ?>
                            <a href="/file/<?= esc($participant['file_laporan_keuangan']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">2. Unggah Rekening Koran 3 Bulan Terakhir</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_rekening_koran_3_bulan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_rekening_koran_3_bulan" name="keterangan_file_rekening_koran_3_bulan" readonly
                            value="<?= esc($participant['keterangan_file_rekening_koran_3_bulan']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_rekening_koran_3_bulan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_rekening_koran_3_bulan'])): ?>
                            <a href="/file/<?= esc($participant['file_rekening_koran_3_bulan']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">3. Unggah Surat Pengukuhan Pengusaha Kena Pajak (SPPKP)</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_sppkp" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_sppkp" name="keterangan_file_sppkp" readonly
                            value="<?= esc($participant['keterangan_file_sppkp']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_sppkp" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_sppkp'])): ?>
                            <a href="/file/<?= esc($participant['file_sppkp']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">4. Unggah NPWP</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_npwp" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_npwp" name="keterangan_file_npwp" readonly
                            value="<?= esc($participant['keterangan_file_npwp']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_npwp" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_npwp'])): ?>
                            <a href="/file/<?= esc($participant['file_npwp']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <p class="text-start mt-3" style="color: black; font-size:medium">5. Unggah Bukti Lapor Tahunan Pajak</p>
                    <div class="form-group" style="margin-top: -20px;">
                        <p for="keterangan_file_lapor_tahunan_pajak" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Keterangan File</p>
                        <input style="margin-top:-15px" type="text" class="form-control"
                            id="keterangan_file_lapor_tahunan_pajak" name="keterangan_file_lapor_tahunan_pajak" readonly
                            value="<?= esc($participant['keterangan_file_lapor_tahunan_pajak']) ?>">
                    </div>
                    <div class="form-group">
                        <p for="file_lapor_tahunan_pajak" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                        <?php if (!empty($participant['file_lapor_tahunan_pajak'])): ?>
                            <a href="/file/<?= esc($participant['file_lapor_tahunan_pajak']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- FORM PENGALAMAN -->
                <div class="tab-pane fade" id="pengalaman-tab-pane" role="tabpanel" aria-labelledby="pengalaman-tab" tabindex="0">
                    <div id="pengalaman-container">
                        <?php if (!empty($experiences)): ?>
                            <?php foreach ($experiences as $index => $experience): ?>
                                <div class="pengalaman-item">
                                    <p class="text-start mt-3 pengalaman-title" style="color: black; font-size:medium">Pengalaman Pertama</p>
                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="no_kontrak" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">No. Kontrak</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="no_kontrak" name="no_kontrak" readonly
                                            value="<?= esc($experience['no_kontrak']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="nama_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nama Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="nama_pekerjaan" name="nama_pekerjaan" readonly
                                            value="<?= esc($experience['nama_pekerjaan']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="bidang_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Bidang Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="bidang_pekerjaan" name="bidang_pekerjaan" readonly
                                            value="<?= esc($experience['bidang_pekerjaan']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="pemilik_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Pemilik Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="pemilik_pekerjaan" name="pemilik_pekerjaan" readonly
                                            value="<?= esc($experience['pemilik_pekerjaan']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="alamat_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Alamat Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="alamat_pekerjaan" name="alamat_pekerjaan" readonly
                                            value="<?= esc($experience['alamat_pekerjaan']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="no_telp_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">No. Telp Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="no_telp_pekerjaan" name="no_telp_pekerjaan" readonly
                                            value="<?= esc($experience['no_telp_pekerjaan']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="lokasi_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Lokasi Kerja</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="lokasi_pekerjaan" name="lokasi_pekerjaan" readonly
                                            value="<?= esc($experience['lokasi_pekerjaan']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="nilai_proyek" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nilai Proyek</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="nilai_proyek" name="nilai_proyek" readonly
                                            value="<?= esc($experience['nilai_proyek']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="tanggal_bast" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Tanggal BAST</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            id="tanggal_bast" name="tanggal_bast" readonly
                                            value="<?= esc($experience['tanggal_bast']) ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -10px;">
                                        <p for="file_bukti_pengalaman" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Upload File Bukti</p>
                                        <?php if (!empty($experience['file_bukti_pengalaman'])): ?>
                                            <a href="/file/<?= esc($experience['file_bukti_pengalaman']) ?>" target="_blank" class="btn btn-primary" style="margin-top: -10px;">
                                                Lihat File
                                            </a>
                                        <?php else: ?>
                                            <p class="text-danger">Tidak ada file yang tersedia.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Berita Acara</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('uploadberitaacara'); ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="beritaAcara" class="form-label">Pilih Berita Acara</label>
                                <input type="file" class="form-control" id="beritaAcara" name="berita_acara" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>