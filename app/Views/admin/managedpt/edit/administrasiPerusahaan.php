<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Administrasi Perusahaan</h1>
    </div>
    <form action="<?= base_url('updateadministrasiperusahaan/' .  $data['id']); ?>" method="POST" enctype="multipart/form-data">
        <div class="container-fluid pt-2 px-2">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <p class="text-start mt-2" style="color: black; font-size:medium">1. Identitas Pejabat Berwenang</p>
                <div class="form-group" style="margin-top: -20px;">
                    <p for="nama_pejabat_berwenang" class="text-start mt-4" style="font-size: 15px; font-weight:bold;">Nama</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="nama_pejabat_berwenang" name="nama_pejabat_berwenang"
                        value="<?= esc($data['nama_pejabat_berwenang']) ?>">
                </div>
                <div class="form-group">
                    <p for="alamat_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Alamat</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="alamat_pejabat_berwenang" name="alamat_pejabat_berwenang"
                        value="<?= esc($data['alamat_pejabat_berwenang']) ?>">
                </div>
                <div class="form-group">
                    <p for="no_identitas_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">No. Identitas</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="no_identitas_pejabat_berwenang" name="no_identitas_pejabat_berwenang"
                        value="<?= esc($data['no_identitas_pejabat_berwenang']) ?>">
                </div>
                <div class="form-group">
                    <p for="jenis_identitas_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jenis Identitas</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="jenis_identitas_pejabat_berwenang" name="jenis_identitas_pejabat_berwenang"
                        value="<?= esc($data['jenis_identitas_pejabat_berwenang']) ?>">
                </div>
                <div class="form-group">
                    <p for="jabatan_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">Jabatan</p>
                    <input style="margin-top:-15px" type="text" class="form-control"
                        id="jabatan_pejabat_berwenang" name="jabatan_pejabat_berwenang"
                        value="<?= esc($data['jabatan_pejabat_berwenang']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_bukti_pejabat_berwenang" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">
                        File Bukti
                    </p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_bukti_pejabat_berwenang" name="file_bukti_pejabat_berwenang"
                        value="">
                    <?php if (!empty($data['file_bukti_pejabat_berwenang'])): ?>
                        <a href="/file/<?= esc($data['file_bukti_pejabat_berwenang']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_formulir_keikutsertaan" name="keterangan_file_formulir_keikutsertaan"
                        value="<?= esc($data['keterangan_file_formulir_keikutsertaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_formulir_keikutsertaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control <?= session('errors.file_formulir_keikutsertaan') ? 'is-invalid' : ''; ?>"
                        placeholder="Unggah File" id="file_formulir_keikutsertaan" name="file_formulir_keikutsertaan"
                        value="">
                    <?php if (!empty($data['file_formulir_keikutsertaan'])): ?>
                        <a href="/file/<?= esc($data['file_formulir_keikutsertaan']) ?>" target="_blank" class="btn btn-primary mt-2" style="">
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
                        id="keterangan_file_surat_pernyataan" name="keterangan_file_surat_pernyataan"
                        value="<?= esc($data['keterangan_file_surat_pernyataan']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_surat_pernyataan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_surat_pernyataan" name="file_surat_pernyataan"
                        value="">
                    <?php if (!empty($data['file_surat_pernyataan'])): ?>
                        <a href="/file/<?= esc($data['file_surat_pernyataan']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_pakta_integritas" name="keterangan_file_pakta_integritas"
                        value="<?= esc($data['keterangan_file_pakta_integritas']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_pakta_integritas" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_pakta_integritas" name="file_pakta_integritas"
                        value="">
                    <?php if (!empty($data['file_pakta_integritas'])): ?>
                        <a href="/file/<?= esc($data['file_pakta_integritas']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_akta_pendirian_perusahaan" name="keterangan_file_akta_pendirian_perusahaan"
                        value="<?= esc($data['keterangan_file_akta_pendirian_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_akta_pendirian_perusahaan" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_akta_pendirian_perusahaan" name="file_akta_pendirian_perusahaan"
                        value="">
                    <?php if (!empty($data['file_akta_pendirian_perusahaan'])): ?>
                        <a href="/file/<?= esc($data['file_akta_pendirian_perusahaan']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_akta_pendirian_perusahaan" name="keterangan_file_akta_pendirian_perusahaan"
                        value="<?= esc($data['keterangan_file_akta_pendirian_perusahaan']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_surat_keterangan_domisili" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_surat_keterangan_domisili" name="file_akta_pendirian_perusahaan"
                        value="">
                    <?php if (!empty($data['file_surat_keterangan_domisili'])): ?>
                        <a href="/file/<?= esc($data['file_surat_keterangan_domisili']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_nib" name="keterangan_file_nib"
                        value="<?= esc($data['keterangan_file_nib']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_nib" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_nib" name="file_nib"
                        value="">
                    <?php if (!empty($data['file_nib'])): ?>
                        <a href="/file/<?= esc($data['file_nib']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_siup" name="keterangan_file_siup"
                        value="<?= esc($data['keterangan_file_siup']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_siup" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_siup" name="file_siup"
                        value="">
                    <?php if (!empty($data['file_siup'])): ?>
                        <a href="/file/<?= esc($data['file_siup']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_siujk" name="keterangan_file_siujk"
                        value="<?= esc($data['keterangan_file_siujk']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_siujk" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_siujk" name="file_siujk"
                        value="">
                    <?php if (!empty($data['file_siujk'])): ?>
                        <a href="/file/<?= esc($data['file_siujk']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_sbu" name="keterangan_file_sbu"
                        value="<?= esc($data['keterangan_file_sbu']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_sbu" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_sbu" name="file_sbu"
                        value="">
                    <?php if (!empty($data['file_sbu'])): ?>
                        <a href="/file/<?= esc($data['file_sbu']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_pendukung_kualifikasi" name="keterangan_file_pendukung_kualifikasi"
                        value="<?= esc($data['keterangan_file_pendukung_kualifikasi']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_pendukung_kualifikasi" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_pendukung_kualifikasi" name="file_pendukung_kualifikasi"
                        value="">
                    <?php if (!empty($data['file_pendukung_kualifikasi'])): ?>
                        <a href="/file/<?= esc($data['file_pendukung_kualifikasi']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_pendukung_kualifikasi2" name="keterangan_file_pendukung_kualifikasi2"
                        value="<?= esc($data['keterangan_file_pendukung_kualifikasi2']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_pendukung_kualifikasi2" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_pendukung_kualifikasi2" name="file_pendukung_kualifikasi2"
                        value="">
                    <?php if (!empty($data['file_pendukung_kualifikasi2'])): ?>
                        <a href="/file/<?= esc($data['file_pendukung_kualifikasi2']) ?>" target="_blank" class="btn btn-primary mt-2">
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
                        id="keterangan_file_pendukung_kualifikasi3" name="keterangan_file_pendukung_kualifikasi3"
                        value="<?= esc($data['keterangan_file_pendukung_kualifikasi3']) ?>">
                </div>
                <div class="form-group">
                    <p for="file_pendukung_kualifikasi3" class="text-start mt-2" style="font-size: 15px; font-weight:bold;">File Bukti</p>
                    <input type="file" class="form-control"
                        placeholder="Unggah File" id="file_pendukung_kualifikasi3" name="file_pendukung_kualifikasi3"
                        value="">
                    <?php if (!empty($data['file_pendukung_kualifikasi3'])): ?>
                        <a href="/file/<?= esc($data['file_pendukung_kualifikasi3']) ?>" target="_blank" class="btn btn-primary mt-2">
                            Lihat File
                        </a>
                    <?php else: ?>
                        <p class="text-danger">Tidak ada file yang tersedia.</p>
                    <?php endif; ?>
                </div>
                <input type="text" name="event_id"
                    value="<?= esc($data['event_id']) ?>" hidden>
                <input type="text" name="status_dpt_id"
                    value="<?= esc($data['status_dpt_id']) ?>" hidden>
                <button type="submit" class="btn btn-primary mt-3">Edit Administrasi Perusahaan</button>
            </div>
        </div>
</div>
</form>
</div>

<?= $this->endSection() ?>