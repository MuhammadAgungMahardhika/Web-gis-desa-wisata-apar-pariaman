<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid ">

    <div class="row ">
        <div class="col">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        <img src="<?= base_url('/assets/images/user-photos/') . "/" . user()->user_image; ?>" class="img-fluid rounded-circle py-4" width="250" />
                    </div>
                    <div class="col-md-8">
                        <?= $validation->listErrors('list'); ?>
                        <form action="<?= base_url('User/save_update/' . user()->id) ?>" method="post" autocomplete="off">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="<?= user()->email ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= user()->username ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                                    <input type="text" class="form-control" autocomplete="off" name="name" value="<?= user()->name ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact</label>
                                    <input type="number" class="form-control" autocomplete="off" name="contact" value="<?= user()->contact ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                                    <input type="text" class="form-control" autocomplete="off" name="address" value="<?= user()->address ?>">
                                </div>

                                <button type="submit" class="btn btn-success ">Save</button>
                                <button type="reset" class="btn btn-danger">Reset</button>

                            </div>
                        </form>
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