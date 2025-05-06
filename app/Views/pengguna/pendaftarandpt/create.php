<?= $this->extend('pengguna/pendaftarandpt/layout') ?>

<?= $this->section('content') ?>

<section id="hero" class="hero section">
    <div class="container" style="justify-content: center; height: auto; text-align: center;">
        <div>
            <h1>Pendaftaran DPT</h1>
            <p>Silahkan mengisi form pendaftaran dengan lengkap dan benar</p>
        </div>

        <form action="<?= base_url('storependaftaran') ?>" method="POST" enctype="multipart/form-data">
            <!-- TAB FORM -->
            <div class="container-fluid pt-2 px-2">
                <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profil-perusahaan-tab" data-bs-toggle="tab" data-bs-target="#profile-perusahaan-tab-pane" type="button" role="tab" aria-controls="profile-perusahaan-tab-pane" aria-selected="true">Form Profil Perusahaan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="administrasi-tab" data-bs-toggle="tab" data-bs-target="#administrasi-tab-pane" type="button" role="tab" aria-controls="administrasi-tab-pane" aria-selected="false">Form Administrasi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="keuangan-tab" data-bs-toggle="tab" data-bs-target="#keuangan-tab-pane" type="button" role="tab" aria-controls="keuangan-tab-pane" aria-selected="false">Form Keuangan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pengalaman-tab" data-bs-toggle="tab" data-bs-target="#pengalaman-tab-pane" type="button" role="tab" aria-controls="pengalaman-tab-pane" aria-selected="false">Form Pengalaman</button>
                        </li>
                    </ul>

                    <!-- FIELD FORM PROFILE PERUSAHAAN -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile-perusahaan-tab-pane" role="tabpanel" aria-labelledby="profile-perusahaan-tab" tabindex="0">
                            <div class="form-group">
                                <label for="nama_awal_perusahaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Nama Awal Perusahaan</label>
                                <select class="form-control <?= session('errors.nama_awal_perusahaan') ? 'is-invalid' : ''; ?>" id="nama_awal_perusahaan" name="nama_awal_perusahaan">
                                    <option value="">Pilih Nama Awal Perusahaan Anda</option>
                                    <option value="BUMD" <?= old('nama_awal_perusahaan') == 'BUMD' ? 'selected' : ''; ?>>BUMD</option>
                                    <option value="BUMN" <?= old('nama_awal_perusahaan') == 'BUMN' ? 'selected' : ''; ?>>BUMN</option>
                                    <option value="CV" <?= old('nama_awal_perusahaan') == 'CV' ? 'selected' : ''; ?>>CV</option>
                                    <option value="Firma" <?= old('nama_awal_perusahaan') == 'Firma' ? 'selected' : ''; ?>>Firma</option>
                                    <option value="Konsultan Perorangan" <?= old('nama_awal_perusahaan') == 'Konsultan Perorangan' ? 'selected' : ''; ?>>Konsultan Perorangan</option>
                                    <option value="Koperasi" <?= old('nama_awal_perusahaan') == 'Koperasi' ? 'selected' : ''; ?>>Koperasi</option>
                                    <option value="Koperasi Bersama" <?= old('nama_awal_perusahaan') == 'Koperasi Bersama' ? 'selected' : ''; ?>>Koperasi Bersama</option>
                                    <option value="Lembaga" <?= old('nama_awal_perusahaan') == 'Lembaga' ? 'selected' : ''; ?>>Lembaga</option>
                                    <option value="Lembaga Penyiaran Publik" <?= old('nama_awal_perusahaan') == 'Lembaga Penyiaran Publik' ? 'selected' : ''; ?>>Lembaga Penyiaran Publik</option>
                                    <option value="Notaris" <?= old('nama_awal_perusahaan') == 'Notaris' ? 'selected' : ''; ?>>Notaris</option>
                                    <option value="NV" <?= old('nama_awal_perusahaan') == 'NV' ? 'selected' : ''; ?>>NV</option>
                                    <option value="PD" <?= old('nama_awal_perusahaan') == 'PD' ? 'selected' : ''; ?>>PD</option>
                                    <option value="Perjan" <?= old('nama_awal_perusahaan') == 'Perjan' ? 'selected' : ''; ?>>Perjan</option>
                                    <option value="Persero" <?= old('nama_awal_perusahaan') == 'Persero' ? 'selected' : ''; ?>>Persero</option>
                                    <option value="Perum" <?= old('nama_awal_perusahaan') == 'Perum' ? 'selected' : ''; ?>>Perum</option>
                                    <option value="PO" <?= old('nama_awal_perusahaan') == 'PO' ? 'selected' : ''; ?>>PO</option>
                                    <option value="PT" <?= old('nama_awal_perusahaan') == 'PT' ? 'selected' : ''; ?>>PT</option>
                                    <option value="UD" <?= old('nama_awal_perusahaan') == 'UD' ? 'selected' : ''; ?>>UD</option>
                                    <option value="Yayasan" <?= old('nama_awal_perusahaan') == 'Yayasan' ? 'selected' : ''; ?>>Yayasan</option>
                                </select>

                                <?php if (session('errors.nama_awal_perusahaan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.nama_awal_perusahaan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <!-- Label di kiri -->
                                <label for="nama_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight: bold; display: block;">Nama Perusahaan</label>
                                <!-- Input field -->
                                <input style="" type="text" class="form-control <?= session('errors.nama_perusahaan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" value="<?= old('nama_perusahaan', '') ?>">
                                <!-- Menampilkan pesan error di sebelah kiri -->
                                <?php if (session('errors.nama_perusahaan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.nama_perusahaan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="No_Surat" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Nama Akhir Perusahaan</label>
                                <select class="form-control" id="nama_akhir_perusahaan" name="nama_akhir_perusahaan">
                                    <option value="" selected>Pilih Nama Akhir Perusahaan Anda</option>
                                    <option value="">Tidak Ada</option>
                                    <option value="Tbk" <?= old('nama_akhir_perusahaan') == 'Tbk' ? 'selected' : ''; ?>>Tbk</option>
                                    <option value="Ltd" <?= old('nama_akhir_perusahaan') == 'Ltd' ? 'selected' : ''; ?>>Ltd</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_berdiri_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Tanggal Berdiri Perusahaan</label>
                                <input type="date" class="form-control <?= session('errors.tanggal_berdiri_perusahaan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Tanggal Berdiri Perusahaan" id="tanggal_berdiri_perusahaan" name="tanggal_berdiri_perusahaan"
                                    value="<?= old('tanggal_berdiri_perusahaan', '') ?>">
                                <?php if (session('errors.tanggal_berdiri_perusahaan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.tanggal_berdiri_perusahaan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="kualifikasi_usaha" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Kualifikasi Usaha</label>
                                <input type="text" class="form-control <?= session('errors.kualifikasi_usaha') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Tanggal Berdiri Perusahaan" id="kualifikasi_usaha" name="kualifikasi_usaha"
                                    value="<?= esc($kualifikasiUsaha) ?>" readonly>
                                <?php if (session('errors.kualifikasi_usaha')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.kualifikasi_usaha'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kualifikasi_pengadaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Jenis Kualifikasi Pengadaan</label>
                                <input type="text" class="form-control <?= session('errors.kualifikasi_usaha') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Tanggal Berdiri Perusahaan" id="jenis_kualifikasi_pengadaan" name="jenis_kualifikasi_pengadaan"
                                    value="<?= esc($jenisKualifikasiNama) ?>" readonly>
                                <?php if (session('errors.kualifikasi_usaha')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.kualifikasi_usaha'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis_spesifikasi_pengadaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Jenis Spesifikasi Pengadaan</label>
                                <input type="text" class="form-control <?= session('errors.jenis_spesifikasi_pengadaan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Tanggal Berdiri Perusahaan" id="jenis_spesifikasi_pengadaan" name="jenis_spesifikasi_pengadaan"
                                    value="<?= esc($jenisSpesifikasiNama) ?>" readonly>
                                <?php if (session('errors.jenis_spesifikasi_pengadaan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.jenis_spesifikasi_pengadaan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="no_pkp" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No PKP</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan No PKP" id="no_pkp" name="no_pkp"
                                    value="<?= old('no_pkp', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_npwp" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No NPWP</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan No NPWP" id="no_npwp" name="no_npwp"
                                    value="<?= old('no_npwp', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Nama Pemiiki Perusahaan</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan No NPWP" id="nama_pemilik_perusahaan" name="nama_pemilik_perusahaan"
                                    value="<?= old('nama_pemilik_perusahaan', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No. Identitas Pemilik Perusahaan</label>
                                <input type="text" class="form-control <?= session('errors.no_identitas_pemilik_perusahaan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan No Identitas Pemilik Perusahaan" id="no_identitas_pemilik_perusahaan" name="no_identitas_pemilik_perusahaan"
                                    value="<?= old('no_identitas_pemilik_perusahaan', '') ?>">
                                <?php if (session('errors.no_identitas_pemilik_perusahaan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.no_identitas_pemilik_perusahaan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Jenis Identitas Pemilik Perusahaan</label>
                                <select class="form-control <?= session('errors.jenis_identitas_pemilik_perusahaan') ? 'is-invalid' : ''; ?>" id="jenis_identitas_pemilik_perusahaan" name="jenis_identitas_pemilik_perusahaan">
                                    <option value="" selected>Pilih Jenis Identitas Pemilik Perusahaan</option>
                                    <option value="KTP" <?= old('nama_awal_perusahaan') == 'KTP' ? 'selected' : ''; ?>>KTP</option>
                                    <option value="SIM" <?= old('nama_awal_perusahaan') == 'SIM' ? 'selected' : ''; ?>>SIM</option>
                                    <option value="Paspor" <?= old('nama_awal_perusahaan') == 'Paspor' ? 'selected' : ''; ?>>Paspor</option>
                                </select>
                                <?php if (session('errors.jenis_identitas_pemilik_perusahaan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.jenis_identitas_pemilik_perusahaan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="kepemilikan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;  display: block;">Kepemilikan</label>
                                <select class="form-control <?= session('errors.kepemilikan') ? 'is-invalid' : ''; ?>" id="kepemilikan" name="kepemilikan">
                                    <option value="" selected>Pilih Kepemilikan</option>
                                    <option value="Publik" <?= old('nama_awal_perusahaan') == 'Publik' ? 'selected' : ''; ?>>Publik</option>
                                    <option value="Swasta" <?= old('nama_awal_perusahaan') == 'Swasta' ? 'selected' : ''; ?>>Swasta</option>
                                </select>
                                <?php if (session('errors.kepemilikan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.kepemilikan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Alamat</label>
                                <input type="text" class="form-control <?= session('errors.alamat') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Alamat" id="alamat" name="alamat"
                                    value="<?= old('alamat', '') ?>">
                                <?php if (session('errors.alamat')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.alamat'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="latitude" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Latitude</label>
                                    <input type="text" class="form-control <?= session('errors.latitude') ? 'is-invalid' : ''; ?>" id="latitude" name="latitude" value="" placeholder="Masukan Latitude">
                                    <?php if (session('errors.latitude')): ?>
                                        <div class="invalid-feedback" style="text-align: left;">
                                            <?= session('errors.latitude'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="longitude" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Longitude</label>
                                    <input type="text" class="form-control <?= session('errors.longitude') ? 'is-invalid' : ''; ?>" id="longitude" name="longitude" value="" placeholder="Masukan Longitude">
                                    <?php if (session('errors.longitude')): ?>
                                        <div class="invalid-feedback" style="text-align: left;">
                                            <?= session('errors.longitude'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mapsModal">Pilih Lokasi di Peta</button>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="provinsi" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Provinsi</label>
                                    <select class="form-control <?= session('errors.provinsi') ? 'is-invalid' : ''; ?>" id="provinsi" name="provinsi">
                                        <option value="" selected>Pilih Provinsi</option>
                                    </select>
                                    <?php if (session('errors.provinsi')): ?>
                                        <div class="invalid-feedback" style="text-align: left;">
                                            <?= session('errors.provinsi'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kabupaten" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Kabupaten</label>
                                    <select class="form-control <?= session('errors.kabupaten') ? 'is-invalid' : ''; ?>" id="kabupaten" name="kabupaten">
                                        <option value="" selected>Pilih Kabupaten</option>
                                    </select>
                                    <?php if (session('errors.kabupaten')): ?>
                                        <div class="invalid-feedback" style="text-align: left;">
                                            <?= session('errors.kabupaten'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kode_pos" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Kode Pos</label>
                                <input type="text" class="form-control <?= session('errors.kode_pos') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Kode Pos" id="kode_pos" name="kode_pos"
                                    value="">
                                <?php if (session('errors.kode_pos')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.kode_pos'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <p class="text-start mt-2" style="color: black; font-size:medium">Informasi Rekening</p>
                            <div class="form-group" style="margin-top: -15px;">
                                <label for="nama_bank" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Nama Bank</label>
                                <input type="text" class="form-control <?= session('errors.nama_bank') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Nama Bank" id="nama_bank" name="nama_bank"
                                    value="<?= old('nama_bank', '') ?>">
                                <?php if (session('errors.nama_bank')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.nama_bank'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="no_rekening" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No Rekening</label>
                                <input type="text" class="form-control <?= session('errors.no_rekening') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Nomor Rekening" id="no_rekening" name="no_rekening"
                                    value="<?= old('no_rekening', '') ?>">
                                <?php if (session('errors.no_rekening')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.no_rekening'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="mata_uang_bank" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Mata Uang Bank</label>
                                <select class="form-control <?= session('errors.mata_uang_bank') ? 'is-invalid' : ''; ?>" id="mata_uang_bank" name="mata_uang_bank">
                                    <option value="" disabled selected>Pilih Mata Uang Bank</option>
                                    <?php foreach ($currencies as $currency): ?>
                                        <option value="<?= esc($currency) ?>" <?= isset($selectedCurrency) && $selectedCurrency === $currency ? 'selected' : ''; ?>>
                                            <?= esc($currency) ?>
                                        </option>
                                    <?php endforeach; ?>
                                    <?php if (session('errors.mata_uang_bank')): ?>
                                        <div class="invalid-feedback" style="text-align: left;">
                                            <?= session('errors.mata_uang_bank'); ?>
                                        </div>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Email</label>
                                <input type="email" class="form-control <?= session('errors.nama_awal_perusahaan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan Email" id="email" name="email"
                                    value="<?= old('email', '') ?>">
                                <?php if (session('errors.email')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.email'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="website" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Website</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Website (kosongi jika tidak ada)" id="website" name="website"
                                    value="<?= old('website', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_telepon_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No. Telepon Kantor</label>
                                <input type="text" class="form-control <?= session('errors.no_telepon_kantor') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan No Telepon Kantor" id="no_telepon_kantor" name="no_telepon_kantor"
                                    value="<?= old('no_telepon_kantor', '') ?>">
                                <?php if (session('errors.no_telepon_kantor')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.no_telepon_kantor'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="no_hp_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No. HP Kantor</label>
                                <input type="text" class="form-control <?= session('errors.nama_awal_perusahaan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Masukan No Hp Kantor" id="no_hp_kantor" name="no_hp_kantor"
                                    value="<?= old('no_hp_kantor', '') ?>">
                                <?php if (session('errors.no_hp_kantor')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.no_hp_kantor'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="no_fax_kantor" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No. FAX Kantor</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan fax kantor (kosongi jika tidak ada)" id="no_fax_kantor" name="no_fax_kantor"
                                    value="<?= old('no_fax_kantor', '') ?>">
                            </div>
                        </div>

                        <!-- FIELD FORM ADMINISTRASI PERUSAHAAN -->
                        <div class="tab-pane fade" id="administrasi-tab-pane" role="tabpanel" aria-labelledby="administrasi-tab" tabindex="0">
                            <p class="text-start mt-2" style="color: black; font-size:medium">1. Identitas Pejabat Berwenang</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="nama_pejabat_berwenang" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Nama</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Nama Pejabat Berwenang" id="nama_pejabat_berwenang" name="nama_pejabat_berwenang"
                                    value="<?= old('nama_pejabat_berwenang', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Alamat</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Alamat Pejabat Berwenang" id="alamat_pejabat_berwenang" name="alamat_pejabat_berwenang"
                                    value="<?= old('alamat_pejabat_berwenang', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_identitas_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">No. Identitas</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan No Identitas Pejabat Berwenang" id="no_identitas_pejabat_berwenang" name="no_identitas_pejabat_berwenang"
                                    value="<?= old('no_identitas_pejabat_berwenang', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenis_identitas_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Jenis Identitas</label>
                                <select class="form-control" id="jenis_identitas_pejabat_berwenang" name="jenis_identitas_pejabat_berwenang">
                                    <option selected>Pilih Jenis Identitas</option>
                                    <option value="KTP">KTP</option>
                                    <option value="SIM">SIM</option>
                                    <option value="Paspor">Paspor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jabatan_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">Jabatan</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan No Identitas Pejabat Berwenang" id="jabatan_pejabat_berwenang" name="jabatan_pejabat_berwenang"
                                    value="<?= old('jabatan_pejabat_berwenang', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_bukti_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_bukti_pejabat_berwenang" name="file_bukti_pejabat_berwenang" value="<?= old('file_bukti_pejabat_berwenang', $data['file_bukti_pejabat_berwenang'] ?? '') ?>">

                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">2. Unggah Formulir Keikutsertaan</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_formulir_keikutsertaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Formulir Keikutsertaan" id="keterangan_file_formulir_keikutsertaan" name="keterangan_file_formulir_keikutsertaan"
                                    value="<?= old('keterangan_file_formulir_keikutsertaan', '') ?>">

                            </div>
                            <div class="form-group">
                                <label for="file_formulir_keikutsertaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control <?= session('errors.file_formulir_keikutsertaan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Unggah File" id="file_formulir_keikutsertaan" name="file_formulir_keikutsertaan"
                                    value="">
                                <?php if (session('errors.file_formulir_keikutsertaan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.file_formulir_keikutsertaan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">3. Unggah Surat Pernyataan</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_surat_pernyataan" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Surat Pernyataan" id="keterangan_file_surat_pernyataan" name="keterangan_file_surat_pernyataan"
                                    value="<?= old('keterangan_file_surat_pernyataan', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_surat_pernyataan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control <?= session('errors.file_surat_pernyataan') ? 'is-invalid' : ''; ?>"
                                    placeholder="Unggah File" id="file_surat_pernyataan" name="file_surat_pernyataan"
                                    value="">
                                <?php if (session('errors.file_surat_pernyataan')): ?>
                                    <div class="invalid-feedback" style="text-align: left;">
                                        <?= session('errors.file_surat_pernyataan'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">4. Unggah Pakta Integritas</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_pakta_integritas" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Pakta Integritas" id="keterangan_file_pakta_integritas" name="keterangan_file_pakta_integritas"
                                    value="<?= old('keterangan_file_pakta_integritas', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_pakta_integritas" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_pakta_integritas" name="file_pakta_integritas"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">5. Unggah Akta pendirian perusahaan dan akta perubahan terakhir dalam hal terjadi perubahan</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_akta_pendirian_perusahaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Akta Pendirian Perusahaan" id="keterangan_file_akta_pendirian_perusahaan" name="keterangan_file_akta_pendirian_perusahaan"
                                    value="<?= old('keterangan_file_akta_pendirian_perusahaan', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_akta_pendirian_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_akta_pendirian_perusahaan" name="file_akta_pendirian_perusahaan"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">6. Unggah Surat Keterangan Domisili</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_surat_keterangan_domisili" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Surat Keterangan Domisili" id="keterangan_file_surat_keterangan_domisili" name="keterangan_file_surat_keterangan_domisili"
                                    value="<?= old('keterangan_file_surat_keterangan_domisili', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_surat_keterangan_domisili" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_surat_keterangan_domisili" name="file_surat_keterangan_domisili"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">7. Unggah NIB</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_nib" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File NIB" id="keterangan_file_nib" name="keterangan_file_nib"
                                    value="<?= old('keterangan_file_nib', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_nib" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_nib" name="file_nib"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">8. Unggah SIUP</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_siup" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File SIUP" id="keterangan_file_siup" name="keterangan_file_siup"
                                    value="<?= old('keterangan_file_siup', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_siup" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_siup" name="file_siup"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">9. Unggah SIUJK</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_siujk" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File SIUJK" id="keterangan_file_siujk" name="keterangan_file_siujk"
                                    value="<?= old('keterangan_file_siujk', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_siujk" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_siujk" name="file_siujk"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">10. Unggah SBU</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_sbu" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File SBU" id="keterangan_file_sbu" name="keterangan_file_sbu"
                                    value="<?= old('keterangan_file_sbu', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_sbu" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_sbu" name="file_sbu"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">11. Unggah Pendukung Kualifikasi</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_pendukung_kualifikasi" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File SBU" id="keterangan_file_pendukung_kualifikasi" name="keterangan_file_pendukung_kualifikasi"
                                    value="<?= old('keterangan_file_pendukung_kualifikasi', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_pendukung_kualifikasi" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_pendukung_kualifikasi" name="file_pendukung_kualifikasi"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">12. Unggah Pendukung Kualifikasi</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_pendukung_kualifikasi2" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File SBU" id="keterangan_file_pendukung_kualifikasi2" name="keterangan_file_pendukung_kualifikasi2"
                                    value="<?= old('keterangan_file_pendukung_kualifikasi2', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_pendukung_kualifikasi2" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_pendukung_kualifikasi2" name="file_pendukung_kualifikasi2"
                                    value="<?= old('file_pendukung_kualifikasi2', '') ?>">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">13. Unggah Pendukung Kualifikasi</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_pendukung_kualifikasi3" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File SBU" id="keterangan_file_pendukung_kualifikasi3" name="keterangan_file_pendukung_kualifikasi3"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="file_pendukung_kualifikasi3" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_pendukung_kualifikasi3" name="file_pendukung_kualifikasi3"
                                    value="<?= old('keterangan_file_pendukung_kualifikasi3', '') ?>">
                            </div>
                        </div>

                        <!-- FORM KEUANGAN -->
                        <div class="tab-pane fade" id="keuangan-tab-pane" role="tabpanel" aria-labelledby="keuangan-tab" tabindex="0">
                            <p class="text-start mt-3" style="color: black; font-size:medium">1. Unggah Laporan Keuangan</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_laporan_keuangan" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Laporan keuangan" id="keterangan_file_laporan_keuangan" name="keterangan_file_laporan_keuangan"
                                    value="<?= old('keterangan_file_laporan_keuangan', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_laporan_keuangan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_laporan_keuangan" name="file_laporan_keuangan"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">2. Unggah Rekening Koran 3 Bulan Terakhir</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_rekening_koran_3_bulan" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Rekening Koran 3 Bulan Terakhir" id="keterangan_file_rekening_koran_3_bulan" name="keterangan_file_rekening_koran_3_bulan"
                                    value="<?= old('keterangan_file_rekening_koran_3_bulan', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_rekening_koran_3_bulan" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_rekening_koran_3_bulan" name="file_rekening_koran_3_bulan"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">3. Unggah Surat Pengukuhan Pengusaha Kena Pajak (SPPKP)</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_sppkp" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File SPPKP" id="keterangan_file_sppkp" name="keterangan_file_sppkp"
                                    value="<?= old('keterangan_file_sppkp', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_sppkp" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_sppkp" name="file_sppkp"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">4. Unggah NPWP</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_npwp" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File NPWP" id="keterangan_file_npwp" name="keterangan_file_npwp"
                                    value="<?= old('keterangan_file_npwp', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_npwp" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_npwp" name="file_npwp"
                                    value="">
                            </div>
                            <p class="text-start mt-3" style="color: black; font-size:medium">5. Unggah Bukti Lapor Tahunan Pajak</p>
                            <div class="form-group" style="margin-top: -20px;">
                                <label for="keterangan_file_lapor_tahunan_pajak" class="text-start mt-4" style="font-size: 15px; font-weight:bold; display: block;">Keterangan File</label>
                                <input type="text" class="form-control"
                                    placeholder="Masukan Keterangan File Lapor Tahunan Pajak" id="keterangan_file_lapor_tahunan_pajak" name="keterangan_file_lapor_tahunan_pajak"
                                    value="<?= old('keterangan_file_lapor_tahunan_pajak', '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="file_lapor_tahunan_pajak" class="text-start mt-2" style="font-size: 15px; font-weight:bold; display: block;">File Bukti</label>
                                <input type="file" class="form-control"
                                    placeholder="Unggah File" id="file_lapor_tahunan_pajak" name="file_lapor_tahunan_pajak"
                                    value="">
                            </div>
                        </div>

                        <!-- FORM PENGALAMAN -->
                        <div class="tab-pane fade" id="pengalaman-tab-pane" role="tabpanel" aria-labelledby="pengalaman-tab" tabindex="0">
                            <div id="pengalaman-container">
                                <div class="pengalaman-item">
                                    <p class="text-start mt-3 pengalaman-title" style="color: black; font-size:medium">Pengalaman Pertama</p>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="no_kontrak" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">No. Kontrak</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            placeholder="Masukan No Kontrak" name="pengalaman[0][no_kontrak]"
                                            value="<?= old('pengalaman[0][no_kontrak]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="nama_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nama Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            placeholder="Masukan Nama Pekerjaan" name="pengalaman[0][nama_pekerjaan]"
                                            value="<?= old('pengalaman[0][nama_pekerjaan]', '') ?>">
                                    </div>
                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="bidang_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Bidang Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            placeholder="Masukan Bidang Pekerjaan" name="pengalaman[0][bidang_pekerjaan]"
                                            value="<?= old('pengalaman[0][bidang_pekerjaan]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="pemilik_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Pemilik Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            placeholder="Masukan Pemilik Pekerjaan" name="pengalaman[0][pemilik_pekerjaan]"
                                            value="<?= old('pengalaman[0][pemilik_pekerjaan]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="alamat_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Alamat Pekerjaan</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            placeholder="Masukan Alamat Pekerjaan" name="pengalaman[0][alamat_pekerjaan]"
                                            value="<?= old('pengalaman[0][alamat_pekerjaan]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="no_telp_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">No. Telp Pekerjaan</p>
                                        <input style="margin-top:-15px" type="number" class="form-control"
                                            placeholder="Masukan No Telp Pekerjaan" name="pengalaman[0][no_telp_pekerjaan]"
                                            value="<?= old('pengalaman[0][no_telp_pekerjaan]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="lokasi_pekerjaan" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Lokasi Kerja</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            placeholder="Masukan Lokasi Kerja" name="pengalaman[0][lokasi_pekerjaan]"
                                            value="<?= old('pengalaman[0][lokasi_pekerjaan]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="nilai_proyek" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nilai Proyek</p>
                                        <input style="margin-top:-15px" type="text" class="form-control"
                                            placeholder="Masukan Nilai Proyek" name="pengalaman[0][nilai_proyek]"
                                            value="<?= old('pengalaman[0][nilai_proyek]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="tanggal_bast" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Tanggal BAST</p>
                                        <input style="margin-top:-15px" type="date" class="form-control"
                                            placeholder="Masukan Tanggal BAST" name="pengalaman[0][tanggal_bast]"
                                            value="<?= old('pengalaman[0][tanggal_bast]', '') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top: -20px;">
                                        <p for="file_bukti_pengalaman" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Upload File Bukti</p>
                                        <input style="margin-top:-15px" type="file" class="form-control" name="file_bukti_pengalaman_0">
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="tambah-pengalaman" class="btn btn-primary mt-3">Tambah Pengalaman Lainya</button>
                            <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                        </div>

                        <!-- Button untuk menambah form pengalaman -->
                        <input type="hidden" name="event_id" value="<?= $_GET['event_id']; ?>">
                        <input type="hidden" name="status_dpt_id" value="3">
                    </div>
                </div>
            </div>
    </div>

    </form>
    </div>
    <div class="modal fade" id="mapsModal" tabindex="-1" aria-labelledby="mapsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapsModalLabel">Pilih Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="map" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta
            const map = new ol.Map({
                target: 'map', // ID elemen untuk peta
                layers: [
                    new ol.layer.Tile({
                        source: new ol.source.OSM(), // Menggunakan OpenStreetMap sebagai sumber data
                    }),
                ],
                view: new ol.View({
                    center: ol.proj.fromLonLat([106.827153, -6.175110]), // Koordinat awal (Jakarta)
                    zoom: 12,
                }),
            });

            // Event ketika modal Bootstrap dibuka
            const modalElement = document.getElementById('mapsModal');
            modalElement.addEventListener('shown.bs.modal', function() {
                map.updateSize(); // Refresh ukuran peta
            });

            // Event klik pada peta
            map.on('singleclick', function(evt) {
                const coordinate = ol.proj.toLonLat(evt.coordinate);
                const [lon, lat] = coordinate;

                // Update nilai latitude dan longitude ke input
                document.getElementById('latitude').value = lat.toFixed(6);
                document.getElementById('longitude').value = lon.toFixed(6);

                // Tutup modal (opsional)
                const modal = bootstrap.Modal.getInstance(modalElement);
                modal.hide();
            });
        });
    </script>


    <script>
        // Fungsi untuk mengambil data provinsi dari API
        function getProvinces() {
            fetch('/api/provinces')
                .then(response => response.json())
                .then(data => {
                    const provinsiSelect = document.getElementById('provinsi');
                    data.forEach(provinsi => {
                        const option = document.createElement('option');
                        option.value = provinsi.id;
                        option.textContent = provinsi.name;
                        provinsiSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching provinces:', error));
        }

        // Fungsi untuk mengambil data kabupaten berdasarkan provinsi yang dipilih
        function getKabupaten(provinsiId) {
            fetch(`/api/regencies/${provinsiId}`)
                .then(response => response.json())
                .then(data => {
                    const kabupatenSelect = document.getElementById('kabupaten');
                    kabupatenSelect.innerHTML = '<option selected>Pilih Kabupaten</option>';
                    data.forEach(kabupaten => {
                        const option = document.createElement('option');
                        option.value = kabupaten.id;
                        option.textContent = kabupaten.name;
                        kabupatenSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching kabupaten:', error));
        }

        document.getElementById('provinsi').addEventListener('change', function() {
            const provinsiId = this.value;
            if (provinsiId) {
                getKabupaten(provinsiId);
            }
        });

        document.addEventListener('DOMContentLoaded', getProvinces);

        document.getElementById('tambah-pengalaman').addEventListener('click', function() {
            var pengalamanContainer = document.getElementById('pengalaman-container');
            var pengalamanItem = pengalamanContainer.querySelector('.pengalaman-item').cloneNode(true);
            var pengalamanCount = pengalamanContainer.querySelectorAll('.pengalaman-item').length;

            pengalamanItem.querySelectorAll('input').forEach(function(input) {
                input.value = ''; // Kosongkan nilai input
            });

            pengalamanItem.querySelector('.pengalaman-title').textContent = 'Pengalaman ' + (pengalamanCount + 1);

            pengalamanItem.querySelectorAll('input').forEach(function(input) {
                if (input.type === 'file') {
                    input.name = 'file_bukti_pengalaman_' + pengalamanCount; // Pastikan penamaan sesuai
                } else {
                    input.name = input.name.replace(/\[\d+\]/, '[' + pengalamanCount + ']');
                }
            });

            pengalamanContainer.appendChild(pengalamanItem);
        });

        function convertToOrdinal(number) {
            var ordinals = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam', 'Ketujuh', 'Kedelapan', 'Kesembilan', 'Kesepuluh'];
            return ordinals[number - 1] || number + '';
        }
    </script>



</section>

<?= $this->endSection() ?>