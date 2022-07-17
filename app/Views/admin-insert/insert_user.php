<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">

                    <div class="col-md">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Add User</h6>

                            <!-- display flash data message -->
                        </div>
                        <div class="card-body">

                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= route_to('manage_users/register') ?>" class="user" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <label for="email" class=" col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" autocomplete="off" class="form-control  <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class=" col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" autocomplete="off" class="form-control  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class=" col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pass_confirm" class=" col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
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