<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_users') ?>">List users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Insert users</li>

        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md">
                        <div class="card-header py-3">
                            <a href="<?= base_url('manage_users'); ?>" role="button" class="btn btn-primary justify-item-center" title="Back to list admin"><i class="fa fa-arrow-left"></i></a>
                            <h6 class="m-0 font-weight-bold text-primary text-center">Add New Admin</h6>
                            <!-- display flash data message -->
                        </div>
                        <div class="card-body">
                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= route_to('manage_users/register') ?>" class="user" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label for="email" class=" col col-form-label">Email</label>
                                    <div class="col">
                                        <input type="email" autocomplete="off" class="form-control  <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class=" col col-form-label">Username</label>
                                    <div class="col">
                                        <input type="text" autocomplete="off" class="form-control  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class=" col col-form-label">Password</label>
                                    <div class="col">
                                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pass_confirm" class=" col col-form-label">Confirm Password</label>
                                    <div class="col">
                                        <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-success btn-sm"><?= lang('Auth.register') ?></button>
                                <button type="reset" class="btn btn-danger btn-sm">cancel</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>