<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah DPT</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="bg-white justify-content-between rounded-bottom shadow p-3 mb-3">
                <div class="form-group">
                    <label for="No_Surat">Field A</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nomor Surat" id="" name=""
                        value="">
                </div>
                <div class="form-group">
                    <label for="No_Surat">Field B</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nomor Surat" id="" name=""
                        value="">
                </div>
                <div class="form-group">
                    <label for="No_Surat">Field C</label>
                    <input type="text" class="form-control"
                        placeholder="Masukan Nomor Surat" id="" name=""
                        value="">
                </div>
                <div class="row mr-0">
                    <div class="col-md-6">
                        <a href="<?= base_url('managedpt'); ?>" class="col-md-12 mb-3 btn btn-secondary btn-icon-split"
                            >
                            <span class="text">Batal</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="col-md-12 mb-3 btn btn-primary btn-icon-split" >
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <?= $this->endSection() ?>