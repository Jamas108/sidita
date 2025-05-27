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
                    <!-- <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="nama_awal_perusahaan" name="nama_awal_perusahaan"
                        value="<?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) ?>"> -->
                    <select style="margin-top:-15px" class="form-select <?= session('errors.nama_awal_perusahaan') ? 'is-invalid' : ''; ?>" id="nama_awal_perusahaan" name="nama_awal_perusahaan">
                        <option value="">Pilih Nama Awal Perusahaan Anda</option>
                        <option value="BUMD" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'BUMD' ? 'selected' : ''; ?>>BUMD</option>
                        <option value="BUMN" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'BUMN' ? 'selected' : ''; ?>>BUMN</option>
                        <option value="CV" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'CV' ? 'selected' : ''; ?>>CV</option>
                        <option value="Firma" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Firma' ? 'selected' : ''; ?>>Firma</option>
                        <option value="Konsultan Perorangan" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Konsultan Perorangan' ? 'selected' : ''; ?>>Konsultan Perorangan</option>
                        <option value="Koperasi" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Koperasi' ? 'selected' : ''; ?>>Koperasi</option>
                        <option value="Koperasi Bersama" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Koperasi Bersama' ? 'selected' : ''; ?>>Koperasi Bersama</option>
                        <option value="Lembaga" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Lembaga' ? 'selected' : ''; ?>>Lembaga</option>
                        <option value="Lembaga Penyiaran Publik" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Lembaga Penyiaran Publik' ? 'selected' : ''; ?>>Lembaga Penyiaran Publik</option>
                        <option value="Notaris" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Notaris' ? 'selected' : ''; ?>>Notaris</option>
                        <option value="NV" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'NV' ? 'selected' : ''; ?>>NV</option>
                        <option value="PD" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'PD' ? 'selected' : ''; ?>>PD</option>
                        <option value="Perjan" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Perjan' ? 'selected' : ''; ?>>Perjan</option>
                        <option value="Persero" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Persero' ? 'selected' : ''; ?>>Persero</option>
                        <option value="Perum" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Perum' ? 'selected' : ''; ?>>Perum</option>
                        <option value="PO" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'PO' ? 'selected' : ''; ?>>PO</option>
                        <option value="PT" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'PT' ? 'selected' : ''; ?>>PT</option>
                        <option value="UD" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'UD' ? 'selected' : ''; ?>>UD</option>
                        <option value="Yayasan" <?= esc($data['profilPerusahaan']['nama_awal_perusahaan']) == 'Yayasan' ? 'selected' : ''; ?>>Yayasan</option>
                    </select>
                </div>
                <div class="form-group">
                    <p for="nama_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Perusahaan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan"
                        value="<?= esc($data['profilPerusahaan']['nama_perusahaan']) ?>">

                </div>
                <div class="form-group">
                    <p for="No_Surat" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Nama Akhir Perusahaan</p>
                    <select style="margin-top:-15px" class="form-select" id="nama_akhir_perusahaan" name="nama_akhir_perusahaan">
                        <option value="<?= esc($data['profilPerusahaan']['nama_akhir_perusahaan']) == '' ? 'selected' : ''; ?>">Tidak Ada</option>
                        <option value="Tbk" <?= esc($data['profilPerusahaan']['nama_akhir_perusahaan']) == 'Tbk' ? 'selected' : ''; ?>>Tbk</option>
                        <option value="Ltd" <?= esc($data['profilPerusahaan']['nama_akhir_perusahaan']) == 'Ltd' ? 'selected' : ''; ?>>Ltd</option>
                    </select>
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
                    <input style="margin-top:-15px" type="number" class="form-control"
                        placeholder="Masukan Nama Perusahaan" id="no_identitas_pemilik_perusahaan" name="no_identitas_pemilik_perusahaan"
                        value="<?= esc($data['profilPerusahaan']['no_identitas_pemilik_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="jenis_identitas_pemilik_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Identitas Pemilik Perusahaan</p>
                    <select style="margin-top:-15px" class="form-select <?= session('errors.jenis_identitas_pemilik_perusahaan') ? 'is-invalid' : ''; ?>" id="jenis_identitas_pemilik_perusahaan" name="jenis_identitas_pemilik_perusahaan">
                        <option value="KTP" <?= esc($data['profilPerusahaan']['jenis_identitas_pemilik_perusahaan']) == 'KTP' ? 'selected' : ''; ?>>KTP</option>
                        <option value="SIM" <?= esc($data['profilPerusahaan']['jenis_identitas_pemilik_perusahaan']) == 'SIM' ? 'selected' : ''; ?>>SIM</option>
                        <option value="Paspor" <?= esc($data['profilPerusahaan']['jenis_identitas_pemilik_perusahaan']) == 'Paspor' ? 'selected' : ''; ?>>Paspor</option>
                    </select>
                </div>
                <div class="form-group">
                    <p for="kepemilikan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kepemilikan</p>
                    <select style="margin-top:-15px" class="form-select <?= session('errors.kepemilikan') ? 'is-invalid' : ''; ?>" id="kepemilikan" name="kepemilikan">
                        <option value="Publik" <?= esc($data['profilPerusahaan']['kepemilikan']) == 'Publik' ? 'selected' : ''; ?>>Publik</option>
                        <option value="Swasta" <?= esc($data['profilPerusahaan']['kepemilikan']) == 'Swasta' ? 'selected' : ''; ?>>Swasta</option>
                    </select>
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


                    <div class="row">
                        <div class="form-group col-md-6">
                            <p for="provinsi" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Provinsi</p>
                            <select style="margin-top:-15px" class="form-select" id="provinsi-select" name="provinsi" onchange="loadKabupaten(this.value)">
                                <option value="">Pilih Provinsi</option>
                                <?php foreach ($data['provinsiList'] as $provinsi): ?>
                                    <option value="<?= esc($provinsi['id']) ?>" <?= $data['profilPerusahaan']['provinsi'] == $provinsi['id'] ? 'selected' : '' ?>>
                                        <?= esc($provinsi['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <p for="kabupaten" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Kabupaten</p>
                            <select style="margin-top:-15px" class="form-select" id="kabupaten-select" name="kabupaten">
                                <option value="">Pilih Kabupaten</option>
                                <?php foreach ($data['kabupatenList'] as $kabupaten): ?>
                                    <option value="<?= esc($kabupaten['id']) ?>" <?= $data['profilPerusahaan']['kabupaten'] == $kabupaten['id'] ? 'selected' : '' ?>>
                                        <?= esc($kabupaten['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
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

<script>
    function loadKabupaten(provinsiId) {
        if (!provinsiId) {
            document.getElementById('kabupaten-select').innerHTML = '<option value="">Pilih Kabupaten</option>';
            return;
        }

        // Get the current selected kabupaten value
        var kabupatenSelect = document.getElementById('kabupaten-select');
        var currentSelectedKabupatenId = kabupatenSelect.value;
        var currentProvinsiId = "<?= esc($data['profilPerusahaan']['provinsi']) ?>";

        // Create XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Make sure to use the correct endpoint URL that matches your routes
        xhr.open('GET', '<?= base_url('api/regencies') ?>/' + provinsiId, true);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                try {
                    // Parse the response JSON
                    var data = JSON.parse(xhr.responseText);

                    // Clear existing options
                    kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten</option>';

                    // Add new options from the response
                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement('option');
                        option.value = data[i].id;
                        option.textContent = data[i].name;

                        // If this is the currently selected kabupaten and we're using the same province
                        if (data[i].id === currentSelectedKabupatenId ||
                            (provinsiId === currentProvinsiId && data[i].id === "<?= esc($data['profilPerusahaan']['kabupaten']) ?>")) {
                            option.selected = true;
                        }

                        kabupatenSelect.appendChild(option);
                    }

                    console.log('Successfully loaded ' + data.length + ' kabupaten for provinsi ID: ' + provinsiId);
                } catch (e) {
                    console.error('Error parsing kabupaten data:', e);
                    alert('Terjadi kesalahan saat memuat data kabupaten. Silakan coba lagi.');
                }
            } else {
                console.error('Server error when loading kabupaten:', xhr.status);
                alert('Terjadi kesalahan server saat memuat data kabupaten. Silakan coba lagi.');
            }
        };

        xhr.onerror = function() {
            console.error('Network error when loading kabupaten');
            alert('Terjadi kesalahan jaringan saat memuat data kabupaten. Silakan periksa koneksi internet Anda dan coba lagi.');
        };

        xhr.send();

        // Debug information
        console.log('Requesting kabupaten for provinsi ID: ' + provinsiId);
    }

    // Add event listener to make sure the function is called when province changes
    document.addEventListener('DOMContentLoaded', function() {
        var provinsiSelect = document.getElementById('provinsi-select');

        provinsiSelect.addEventListener('change', function() {
            var selectedProvinsiId = this.value;
            console.log('Province selection changed to:', selectedProvinsiId);
            loadKabupaten(selectedProvinsiId);
        });

        // If there's already a province selected on page load, load its districts
        var initialProvinsiId = provinsiSelect.value;
        if (initialProvinsiId) {
            console.log('Initial province selected:', initialProvinsiId);
            loadKabupaten(initialProvinsiId);
        }
    });
</script>

<?= $this->endSection() ?>