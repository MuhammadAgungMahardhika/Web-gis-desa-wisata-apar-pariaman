<!-- Begin of Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Text -->
    <span class="mr-2 d-none d-lg-inline text-gray-600 medium" id="nav-title">Tourism Village |</span>
    <br>
    <span class="text-gray-600 medium" id="nav-title">Desa Wisata Apar Pariaman</span>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->

        <li class="nav-item dropdown no-arrow">

            <?php if (in_groups('admin') || in_groups('user')) : ?>

                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->username; ?></span>
                    <img class="img-profile rounded-circle" src="/img/<?= user()->user_image; ?> ">
                </a>
            <?php else : ?>
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Guest</span>
                    <img class="img-profile rounded-circle" src="/img/default.svg ">
                </a>
            <?php endif; ?>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if (in_groups('admin') || in_groups('user')) : ?>
                    <a class="dropdown-item" href="<?= base_url('/user') ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                <?php endif; ?>

                <?php if (in_groups('admin') || in_groups('user')) : ?>

                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
        </li>

    </ul>

</nav>
<!-- End of Topbar -->