<?= $this->extend('admin/penerimaandpt/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Penerimaan DPT</h1>
    </div>
    <div class="container-fluid pt-2 px-2">
        <form action="<?= base_url('admin/penerimaandpt/updateStatusParticipant/' . $eventid) ?>" method="POST">
            <div class="mb-3">
                <label for="currentStatus" class="form-label">Current Status</label>
                <input type="text" class="form-control" id="currentStatus" value="<?= esc($ParticipantData['status']) ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="newStatus" class="form-label">New Status</label>
                <select class="form-control" name="new_status" id="newStatus" required>
                    <?php foreach ($statusOptions as $value => $label): ?>
                        <option value="<?= $value ?>" <?= ($value == $ParticipantData['status_dpt_id']) ? 'selected' : '' ?>><?= esc($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
            <a href="<?= base_url('admin/penerimaandpt') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>