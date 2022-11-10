<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<style>
    .efek:hover {
        transform: translate(0px, -10px);
        transition: .5s;
    }

    .card-content:hover {
        box-shadow: 0 0 20px 5px #eaeaea;
    }
</style>
<div class="container-fluid">
    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-center text-uppercase">Dashboard</h3>
        </div>
        <div class="card-body">
            <section id="groups">
                <div class="row d-flex ">
                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="users">
                            <div class="card-content">
                                <a href="<?= base_url('manage_users') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/users.JPG') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Admin</h4>
                                        <p class="card-text">
                                            Manage all admin </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="village">
                            <div class="card-content">
                                <a href="<?= base_url('manage_apar') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/village.JPG') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Village</h4>
                                        <p class="card-text">
                                            Manage village information
                                        </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="at">
                            <div class="card-content">
                                <a href="<?= base_url('manage_atraction') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/mangrove.jpg') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Atraction</h4>
                                        <p class="card-text">
                                            Manage atraction
                                        </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="package">
                            <div class="card-content">
                                <a href="<?= base_url('manage_package') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/jelajah_hutan_mangrove_kano.jpeg') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Package</h4>
                                        <p class="card-text">
                                            Manage tourism package
                                        </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="package">
                            <div class="card-content">
                                <a href="<?= base_url('manage_product') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/sandal_rajutan_benang.jpeg') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Product</h4>
                                        <p class="card-text">
                                            Manage culinary & souvenir
                                        </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="sp">
                            <div class="card-content">
                                <a href="<?= base_url('manage_souvenir_place') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/sp.JPG') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Souvenir place</h4>
                                        <p class="card-text">
                                            Manage souvenir place </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="cp">
                            <div class="card-content">
                                <a href="<?= base_url('manage_culinary_place') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/cp.JPG') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Culinary place</h4>
                                        <p class="card-text">
                                            Manage culinary place
                                        </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">


                        <div class="card  shadow-sm efek" id="wp">
                            <div class="card-content">
                                <a href="<?= base_url('manage_worship_place') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/wp.JPG') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Worship place</h4>
                                        <p class="card-text">
                                            Manage worship place
                                        </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card  shadow-sm efek" id="f">
                            <div class="card-content">
                                <a href="<?= base_url('manage_facility') ?>">
                                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/f.JPG') ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Facility</h4>
                                        <p class="card-text">
                                            Manage facility
                                        </p>
                                        <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>

<?= $this->endSection() ?>