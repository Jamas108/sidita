<?= $this->extend('operator/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pekerjaan</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('updatepekerjaan/' . $pekerjaan['id']) ?>" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="tahun_anggaran">Tahun Anggaran</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Tahun Anggaran" id="tahun_anggaran" name="tahun_anggaran"
                        value="<?= esc($pekerjaan['tahun_anggaran']) ?>">
                </div>
                <div class="form-group">
                    <label for="nama_paket_pengadaan">Nama Paket Pengadaan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nama Paket Pengadaan" id="nama_paket_pengadaan" name="nama_paket_pengadaan"
                        value="<?= esc($pekerjaan['nama_paket_pengadaan']) ?>">
                </div>
                <div class="form-group">
                    <label for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Lokasi Pekerjaan" id="lokasi_pekerjaan" name="lokasi_pekerjaan"
                        value="<?= esc($pekerjaan['lokasi_pekerjaan']) ?>">
                </div>
                <div class="form-group">
                    <label for="sumber_dana">Sumber Dana</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Sumber Dana" id="sumber_dana" name="sumber_dana"
                        value="<?= esc($pekerjaan['sumber_dana']) ?>">
                </div>
                <div class="form-group">
                    <label for="akun">Akun</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Akun" id="akun" name="akun"
                        value="<?= esc($pekerjaan['akun']) ?>">
                </div>
                <div class="form-group">
                    <label for="metode">Metode</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Metode" id="metode" name="metode"
                        value="<?= esc($pekerjaan['metode']) ?>">
                </div>
                <div class="form-group">
                    <label for="ppk">PPK</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan PPK" id="ppk" name="ppk"
                        value="<?= esc($pekerjaan['ppk']) ?>">
                </div>
                <div class="form-group">
                    <label for="penyedia">Penyedia</label>
                    <select class="form-control" id="penyedia_select" name="penyedia" onchange="updateDptId()">
                        <option selected>Pilih Penyedia</option>
                        <?php foreach ($dptData as $dpt): ?>
                            <option value="<?= esc($dpt['nama_awal_perusahaan']) . ' ' . esc($dpt['nama_perusahaan']) . ' ' . esc($dpt['nama_akhir_perusahaan']) ?>"
                                data-id="<?= esc($dpt['id']) ?>"
                                <?= $pekerjaan['penyedia'] == $dpt['nama_awal_perusahaan'] . ' ' . $dpt['nama_perusahaan'] . ' ' . $dpt['nama_akhir_perusahaan'] ? 'selected' : '' ?>>
                                <?= esc($dpt['nama_awal_perusahaan']) . ' ' . esc($dpt['nama_perusahaan']) . ' ' . esc($dpt['nama_akhir_perusahaan']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nilai_kontrak_ppn">Nilai Kontrak</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nilai Kontrak (Sudah Termasuk PPN)" id="nilai_kontrak_ppn" name="nilai_kontrak_ppn"
                        value="<?= esc($pekerjaan['nilai_kontrak_ppn']) ?>">
                </div>
                <div class="form-group">
                    <label for="nomor_kontrak">Nomor Kontrak</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nomor Kontrak" id="nomor_kontrak" name="nomor_kontrak"
                        value="<?= esc($pekerjaan['nomor_kontrak']) ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_kontrak">Tanggal Awal Kontrak</label>
                    <input type="date" class="form-control"
                        placeholder="Masukan Tanggal Awal Kontrak" id="tanggal_kontrak" name="tanggal_kontrak"
                        value="<?= esc($pekerjaan['tanggal_kontrak']) ?>">
                </div>
                <div class="form-group">
                    <label for="akhir_kontrak">Tanggal Akhir Kontrak</label>
                    <input type="date" class="form-control"
                        placeholder="Masukan Tanggal Akhir Kontrak" id="akhir_kontrak" name="akhir_kontrak"
                        value="<?= esc($pekerjaan['akhir_kontrak']) ?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_bast">Tanggal BAST</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Tanggal BAST" id="tanggal_bast" name="tanggal_bast"
                        value="<?= esc($pekerjaan['tanggal_bast']) ?>">
                </div>
                <div class="form-group">
                    <label for="presentase_kemajuan">Presentase Kemajuan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Presentase Kemajuan" id="presentase_kemajuan" name="presentase_kemajuan"
                        value="<?= esc($pekerjaan['presentase_kemajuan']) ?>">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Keterangan" id="keterangan" name="keterangan"
                        value="<?= esc($pekerjaan['keterangan']) ?>">
                </div>
                <div class="form-group">
                    <label for="dokumen_pendukung">Dokumen Pendukung</label>
                    <input type="file" class="form-control" id="dokumen_pendukung" name="dokumen_pendukung">
                </div>
                <input type="hidden" id="tanggal_pembuatan" name="tanggal_pembuatan" value="<?= esc($pekerjaan['tanggal_pembuatan']) ?>">
                <input type="hidden" id="dpt_id" name="dpt_id" value="<?= esc($pekerjaan['dpt_id']) ?>">

                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('managepekerjaan') ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split">
                            <span class="text">Batal</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="col-md-12 mb-3 btn btn-primary btn-icon-split">
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function updateDptId() {
            const penyediaSelect = document.getElementById('penyedia_select');
            const selectedOption = penyediaSelect.options[penyediaSelect.selectedIndex];
            document.getElementById('dpt_id').value = selectedOption.getAttribute('data-id');
        }
    </script>


    <?= $this->endSection() ?>