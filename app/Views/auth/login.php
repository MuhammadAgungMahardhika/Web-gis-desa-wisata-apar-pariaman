<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block text-center">
                            <i class="iconify text-primary" data-icon="fontisto:holiday-village" data-width="300" data-height="300"></i>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>
                                </div>
                                <!-- Form Login -->
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('login') ?>" class="user" method="post">
                                    <?= csrf_field() ?>

                                    <!-- Email -->
                                    <?php if ($config->validFields === ['email']) : ?>
                                        <div class="form-group">
                                            <input type="email" autocomplete="off" class="form-control form-control-user  <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>

                                        <!-- Email or Username Login Way -->

                                    <?php else : ?>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>

                                    </div>

                                    <!-- Remember Me -->


                                    <?php if ($config->allowRemembering) : ?>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <?= lang('Auth.rememberMe') ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>


                                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                                </form>
                                <hr>

                                <?php if ($config->activeResetter) : ?>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                    </div>
                                <?php endif; ?>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->

                                <?php if ($config->allowRegistration) : ?>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('register') ?>"> Create an Account!</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>