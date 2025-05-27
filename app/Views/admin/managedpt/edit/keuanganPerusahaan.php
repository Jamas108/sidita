<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Keuangan Perusahaan</h1>
    </div>
    <form action="<?= base_url('updatekeuanganperusahaan/' .  $data['id']); ?>" method="POST" enctype="multipart/form-data">
        <div class="container-fluid pt-2 px-2">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <p class="text-start mt-3" style="color: black; font-size:medium; font-weight:bold">1. Laporan Keuangan</p>
                <div class="form-group" style="margin-top: -20px;">
                    <p for="keterangan_file_laporan_keuangan" class="text-start mt-4" style="font-size: 15px;">Keterangan File</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="keterangan_file_laporan_keuangan" name="keterangan_file_laporan_keuangan"
                        value="<?= esc($data['keterangan_file_laporan_keuangan']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_laporan_keuangan" class="text-start" style="font-size: 15px;">File Bukti</p>
                    <input style="margin-top:-15px" type="file" class="form-control"
                        placeholder="Unggah File" id="file_laporan_keuangan" name="file_laporan_keuangan"
                        value="">
                    <?php if (!empty($data['file_laporan_keuangan'])): ?>
                        <a href="<?= esc($data['file_laporan_keuangan']) ?>" target="_blank" class="btn btn-primary mt-2">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p class="text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <p class="text-start mt-3" style="color: black; font-size:medium; font-weight:bold">2. Rekening Koran 3 Bulan Terakhir</p>
                <div class="form-group" style="margin-top: -20px;">
                    <p for="keterangan_file_rekening_koran_3_bulan" class="text-start mt-4" style="font-size: 15px;">Keterangan File</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="keterangan_file_rekening_koran_3_bulan" name="keterangan_file_rekening_koran_3_bulan"
                        value="<?= esc($data['keterangan_file_rekening_koran_3_bulan']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_rekening_koran_3_bulan" class="text-start mt-2" style="font-size: 15px;">File Bukti</p>
                    <input style="margin-top:-15px" type="file" class="form-control"
                        placeholder="Unggah File" id="file_rekening_koran_3_bulan" name="file_rekening_koran_3_bulan"
                        value="">
                    <?php if (!empty($data['file_rekening_koran_3_bulan'])): ?>
                        <a href="<?= esc($data['file_rekening_koran_3_bulan']) ?>" target="_blank" class="btn btn-primary mt-2">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p class="text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <p class="text-start mt-3" style="color: black; font-size:medium; font-weight:bold;">3. Unggah Surat Pengukuhan Pengusaha Kena Pajak (SPPKP)</p>
                <div class="form-group" style="margin-top: -20px;">
                    <p for="keterangan_file_sppkp" class="text-start mt-4" style="font-size: 15px;">Keterangan File</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="keterangan_file_sppkp" name="keterangan_file_sppkp"
                        value="<?= esc($data['keterangan_file_sppkp']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_sppkp" class="text-start mt-2" style="font-size: 15px;">File Bukti</p>
                    <input style="margin-top:-15px" type="file" class="form-control"
                        placeholder="Unggah File" id="file_sppkp" name="file_sppkp"
                        value="">
                    <?php if (!empty($data['file_sppkp'])): ?>
                        <a href="<?= esc($data['file_sppkp']) ?>" target="_blank" class="btn btn-primary mt-2">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p class="text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <p class="text-start mt-3" style="color: black; font-size:medium; font-weight:bold;">4. NPWP</p>
                <div class="form-group" style="margin-top: -20px;">
                    <p for="keterangan_file_npwp" class="text-start mt-4" style="font-size: 15px;">Keterangan File</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="keterangan_file_npwp" name="keterangan_file_npwp"
                        value="<?= esc($data['keterangan_file_npwp']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_npwp" class="text-start mt-2" style="font-size: 15px;">File Bukti</p>
                    <input style="margin-top:-15px" type="file" class="form-control"
                        placeholder="Unggah File" id="file_npwp" name="file_npwp"
                        value="">
                    <?php if (!empty($data['file_npwp'])): ?>
                        <a href="<?= esc($data['file_npwp']) ?>" target="_blank" class="btn btn-primary mt-2">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p class=" text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <p class="text-start mt-3" style="color: black; font-size:medium; font-weight:bold;">5. Bukti Lapor Tahunan Pajak</p>
                <div class="form-group" style="margin-top: -20px;">
                    <p for="keterangan_file_lapor_tahunan_pajak" class="text-start mt-4" style="font-size: 15px;">Keterangan File</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="keterangan_file_lapor_tahunan_pajak" name="keterangan_file_lapor_tahunan_pajak"
                        value="<?= esc($data['keterangan_file_lapor_tahunan_pajak']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_lapor_tahunan_pajak" class="text-start mt-2" style="font-size: 15px;">File Bukti</p>
                    <input style="margin-top:-15px" type="file" class="form-control"
                        placeholder="Unggah File" id="file_lapor_tahunan_pajak" name="file_lapor_tahunan_pajak"
                        value="">
                    <?php if (!empty($data['file_lapor_tahunan_pajak'])): ?>
                        <a href="<?= esc($data['file_lapor_tahunan_pajak']) ?>" target="_blank" class="btn btn-primary mt-2">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p class=" text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Edit Administrasi Perusahaan</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>