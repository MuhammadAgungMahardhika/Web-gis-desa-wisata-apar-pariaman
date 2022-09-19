<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<style>
    .efek:hover {
        transform: translate(0px, -10px);
        transition: .5s;
    }

    .card-content:hover {
        box-shadow: inset 0 0 20px 5px #eaeaea;
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
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card-group">
                            <div class="card m-1 shadow efek" id="users">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_users') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/users.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Users</h4>
                                            <p class="card-text">
                                                Manage all users at Apar Tourism Village</p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card m-1 shadow efek" id="village">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_apar') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/village.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Village</h4>
                                            <p class="card-text">
                                                Manage village of Apar Tourism Village
                                            </p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card m-1 shadow efek" id="at">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_atraction') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/atraction.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Atraction</h4>
                                            <p class="card-text">
                                                Manage atraction at Apar Tourism Village
                                            </p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card m-1 shadow efek" id="ev">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_event') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/event.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Event</h4>
                                            <p class="card-text">
                                                Manage event at Apar Tourism Village
                                            </p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card-group">
                            <div class="card m-1 shadow efek" id="sp">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_souvenir_place') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/sp.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Souvenir place</h4>
                                            <p class="card-text">
                                                Manage souvenir place at Apar tourism Village</p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card m-1 shadow efek" id="cp">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_culinary_place') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/cp.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Culinary place</h4>
                                            <p class="card-text">
                                                Manage culinary place at Apar Tourism Village
                                            </p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card m-1 shadow efek" id="wp">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_worship_place') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/wp.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Worship place</h4>
                                            <p class="card-text">
                                                Manage worship place at Apar Tourism Village
                                            </p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card m-1 shadow efek" id="f">
                                <div class="card-content">
                                    <a href="<?= base_url('manage_facility') ?>">
                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/images/dashboard-images/f.JPG') ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Facility</h4>
                                            <p class="card-text">
                                                Manage facility at Apar Tourism Village
                                            </p>
                                            <small class="text-muted">Click to go <i class="fa fa-arrow-right fa-xs"></i> </small>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>