<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card p-2">
        <div class="row d-flex">
            <?php foreach ($objectData as $data) : ?>
                <div class="col-md-12">
                    <div class="card mb-3 shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4 p-2">
                                <img src="<?= base_url('assets/images/dashboard-images/mangrove.jpg') ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data->name; ?></h5>
                                    <p class="card-text"><?= $data->description; ?></p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    <div class="text-end">
                                        <a role="button" class="btn btn-success" href="<?= base_url('package/detail') . '/' . $data->id; ?>">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>

<?= $this->endSection() ?>