<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid ">

    <div class="row ">
        <div class="col">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a role="button" class="btn btn-outline-primary" href="<?= base_url('user/profile'); ?>">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h5>Change password</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <form action="<?= base_url('User/save_password/' . user()->id) ?>" method="post">
                        <div class="row my-2">
                            <div class="col-md-6 ">
                                <label for="password" class="form-label">New password</label>
                                <input type="password" class="form-control" name="password" placeholder="input you new password" required autocomplete="off">
                            </div>
                            <div class="col-md-6 ">
                                <label for="repeat_password" class="form-label">Repeat password</label>
                                <input type="password" class="form-control" name="repeat_password" placeholder="repeat your new password" required autocomplete="off">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-4 ">
                                <button class="btn btn-success" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
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