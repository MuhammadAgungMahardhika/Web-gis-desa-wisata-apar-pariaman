<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card p-2 shadow-sm">

        <div class="card-body">
            <div class="row d-flex">
                <?php foreach ($objectData as $data) : ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="card  shadow efek" id="cp">
                            <div class="card-content">
                                <a class="hover-efek" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data->id ?>">
                                    <img class=" card-img-top img-fluid" src="<?= base_url('media/photos/product/'); ?>/<?= $data->url; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $data->name; ?></h4>
                                        <?php if (isset($data->price)) : ?>
                                            <small class="text-muted"><?= $data->price; ?> IDR</small>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $data->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $data->name; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img class="img-fluid w-100" src="<?= base_url('media/photos/product/'); ?>/<?= $data->url; ?>" alt="Card image cap">
                                    <p class="card-text my-4" style="text-align: justify;">
                                        <?= $data->description; ?>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <?php if (isset($data->price)) : ?>
                                        <span class="text-lg"><?= $data->price; ?> IDR</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>