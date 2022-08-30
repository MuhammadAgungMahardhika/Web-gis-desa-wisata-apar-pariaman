<?= $this->extend('layout/template.php') ?>

<?= $this->section('content') ?>


<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <i class="iconify text-primary" data-icon="fontisto:holiday-village" data-width="300" data-height="300"></i>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
                        </div>
                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <!-- Form Register -->
                        <form action="<?= base_url('register') ?>" class="user" method="post">
                            <?= csrf_field() ?>

                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" autocomplete="off" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                            </div>

                            <!-- Username -->
                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                </div>
                            </div>

                            <!-- Password & Repeat Password -->

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>

                        </form>
                        <hr>
                        <!-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div> -->
                        <div class="text-center">

                            <a href="<?= base_url('login') ?>" class="small">
                                <?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>