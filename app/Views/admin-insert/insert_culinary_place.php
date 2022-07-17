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
                            <h6 class="m-0 font-weight-bold text-primary text-center">Add Culinary Place</h6>
                            <!-- display flash data message -->
                        </div>
                        <div class="card-body">

                            <form action="<?= site_url('manage_culinary_place/save_insert'); ?>" method="post" autocomplete="off">

                                <div class="form-group row">
                                    <label for="id" class=" col-sm-2 col-form-label">Id of culinary Place</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class=" col-sm-2 col-form-label">Name of culinary Place</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name">

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
<?= $this->endSection() ?>