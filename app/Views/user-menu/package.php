<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card p-2">
        <div class="row d-flex">
            <div class="col-md-12">
                <div class="card mb-3 shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <img src="<?= base_url('assets/images/dashboard-images/mangrove.jpg') ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Paket 1</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis maxime explicabo voluptatibus dicta dolor nam ducimus illum, nulla dolores voluptatem minus aut dolore? Ex reiciendis repudiandae nemo et officiis enim?</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <div class="text-end">
                                    <a role="button" class="btn btn-success" href="<?= base_url('detail_package.php') ?>">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-3 shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <img src="<?= base_url('assets/images/dashboard-images/turtle.jpg') ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Paket 2</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus omnis, rerum voluptates veniam quos doloribus quidem est soluta expedita ducimus magni nulla qui numquam dolore quas odit harum accusamus! Tempora.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <div class="text-end">
                                    <a role="button" class="btn btn-success" href="">Selengkapnya</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-3 shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <img src="<?= base_url('assets/images/dashboard-images/mangrove.jpg') ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Paket 3</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis molestias voluptatem rerum, eligendi vero, ipsum tempora veniam neque unde sunt vitae itaque fuga dicta error, molestiae laboriosam sapiente quas consectetur.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <div class="text-end">
                                    <a role="button" class="btn btn-success" href="">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>

<?= $this->endSection() ?>