<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid ">
    <div class="row ">
        <div class="col">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <div class="col-md">
                                <img src="<?= base_url('/assets/images/user-photos/' . user()->user_image); ?>" class="img-fluid rounded-circle py-4" width="250" />
                            </div>
                        </div>
                        <div class="row text-center ">
                            <div class="col-md">
                                <a role="button" class="btn btn-outline-primary" href="<?= base_url('user/edit_profile'); ?>">
                                    <i class="fa fa-edit"></i>
                                    Edit profile</a>
                                <a role="button" class="btn btn-outline-primary" href="<?= base_url('user/change_password/' . user()->id); ?>">
                                    <i class="fa fa-key"></i>
                                    Change password</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <span class="form-control"><?= user()->email ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <span class="form-control"><?= user()->username ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                                <span class="form-control"><?= user()->name ?>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contact</label>
                                <span class="form-control"><?= user()->contact ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <span class="form-control"><?= user()->address ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Flass message -->

<?php
if (session()->getFlashdata('success')) : ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '<?php echo session()->getFlashdata('success') ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

<?php elseif (session()->getFlashdata('failed')) : ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '<?php echo session()->getFlashdata('failed') ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

<?php endif; ?>
<!-- Akhir Flash Message -->



<?= $this->endSection() ?>