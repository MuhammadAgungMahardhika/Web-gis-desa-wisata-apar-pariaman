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
                            <h6 class="m-0 font-weight-bold text-primary text-center">Add Event</h6>
                            <!-- display flash data message -->
                        </div>
                        <div class="card-body">

                            <form action="<?= site_url('manage_event/save_insert'); ?>" method="post" autocomplete="off">

                                <div class="form-group row">
                                    <label for="id" class=" col-sm-2 col-form-label">Id of Event</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class=" col-sm-2 col-form-label">Name of Event</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="schedule" class="col-sm-2 col-form-label">Schedule</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="schedule">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class=" col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact_person" class=" col-sm-2 col-form-label">Contact person</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_person">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class=" col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lat" class=" col-sm-2 col-form-label">Lat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lng" class=" col-sm-2 col-form-label">Lng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lng">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Save</button>
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