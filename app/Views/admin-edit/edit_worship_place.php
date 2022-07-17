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
                            <h6 class="m-0 font-weight-bold text-primary text-center">Edit worship Place</h6>
                            <a href="<?= base_url('manage_worship_place/detail/' . $worshipPlaceData->id) ?>" title="Back to detail " class="small btn btn-success btn-sm text-right"><i class="fa fa-arrow-left"></i> Back</a>
                            <!-- display flash data message -->
                        </div>
                        <div class="card-body">

                            <form action="<?= site_url('manage_worship_place/save_update/' . $worshipPlaceData->id); ?>" method="post" autocomplete="off">

                                <div class="form-group row">
                                    <label for="name" class=" col-sm-2 col-form-label">Name of Event</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="<?= $worshipPlaceData->name; ?>">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class=" col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="description" value="<?= $worshipPlaceData->description; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lat" class=" col-sm-2 col-form-label">Lat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lat" value="<?= $worshipPlaceData->lat; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lng" class=" col-sm-2 col-form-label">Lng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lng" value="<?= $worshipPlaceData->lng; ?>">
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