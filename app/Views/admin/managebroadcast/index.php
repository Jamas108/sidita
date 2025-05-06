<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pengumuman</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <div class="bg-white justify-content-between rounded shadow p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 bg-white datatable" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">Pesan</th>
                            <th class="text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($broadcast)): ?>
                            <?php foreach ($broadcast as $key => $broadcast): ?>
                                <tr>
                                    <td class="text-center" style="width: 95%;"><?= $broadcast['pesan'] ?></td>
                                    <td class="text-center" style="width: 5%;">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn-sm btn-warning mr-2 ml-2" data-toggle="modal" data-target="#modalEditBroadcast"
                                                data-id="<?= $broadcast['id']; ?>" data-pesan="<?= $broadcast['pesan']; ?>" style="text-decoration:none">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada pengumuman yang tersedia</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modalEditBroadcast" tabindex="-1" aria-labelledby="modalEditBroadcastLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditBroadcastLabel">Edit Broadcast</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('updatebroadcast/' . $broadcast['id']); ?>" method="POST"> <!-- Action akan diubah melalui JavaScript -->
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea type="text" name="pesan" id="pesan" class="form-control" placeholder="Masukkan Pesan" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>