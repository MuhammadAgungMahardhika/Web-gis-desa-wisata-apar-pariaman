<header class="mb-3">
    <a class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col order-md-2 order-first">
                <h3>Tourism Village</h3>
                <p class="text-subtitle text-muted">Desa Wisata Apar Pariaman</p>
            </div>
            <div class="col  d-flex order-md-2 order-second justify-content-end">
                <!-- Facebook -->
                <?php if (isset($aparData->facebook)) : ?>
                    <a href="https://www.facebook.com/<?= $aparData->facebook ?>" title="Facebook" class="m-1">
                        <i class="fab fa-facebook fa-2x text-primary p-2 bg-white shadow-sm rounded"></i>
                    </a>
                <?php endif; ?>
                <!-- Tiktok -->
                <?php if (isset($aparData->tiktok)) : ?>
                    <a href="https://www.tiktok.com/<?= $aparData->tiktok ?>" title="Tiktok" class="m-1">
                        <i class="fab fa-tiktok fa-2x text-secondary p-2 bg-white shadow-sm rounded"></i>
                    </a>
                <?php endif; ?>
                <!-- Instagram -->
                <?php if (isset($aparData->instagram)) : ?>
                    <a href="https://www.instagram.com/<?= $aparData->instagram ?>" title="Instagram" class="m-1">
                        <i class="fab fa-instagram fa-2x text-danger p-2 bg-white shadow-sm rounded"></i>
                    </a>
                <?php endif; ?>
                <!-- Youtube -->
                <?php if (isset($aparData->youtube)) : ?>
                    <a href="https://www.youtube.com/<?= $aparData->youtube ?>" title="Youtube" class="m-1">
                        <i class="fab fa-youtube fa-2x text-danger p-2 bg-white shadow-sm rounded"></i>
                    </a>
                <?php endif ?>
            </div>
            <?php if (in_groups('admin')) : ?>
                <div class="col order-md-2 order-last mb-md-0 mb-3">
                    <div class="float-end">
                        <div class="btn-group mb-1">
                            <div class="dropdown">
                                <a class="" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="card mb-0">
                                        <div class="card-body py-3 px-4">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-lg me-0">
                                                    <?php if (in_groups('admin') || in_groups('user')) : ?>
                                                        <img src="<?= base_url('/assets/images/user-photos/') . "/" . user()->user_image; ?>" />
                                                    <?php else : ?>
                                                        <img src=" <?= base_url('assets/images/user-photos/default.png') ?>" />
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php if (in_groups('admin') || in_groups('user')) : ?>
                                        <a class="dropdown-item <?php if (current_url() == base_url('user/profile')) echo 'active'; ?>" href="<?= base_url('user/profile') ?>">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                    <?php endif; ?>
                                    <?php if (in_groups('admin') || in_groups('user')) : ?>
                                        <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    <?php else : ?>
                                        <a class="dropdown-item" href="<?= base_url('login') ?>">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Login
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>