<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>

<section class="section">
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('manage_atraction/detail/' . $objectData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit apar info"><i class="fa fa-arrow-left"></i></a>
                    <h4 class="card-title text-center"><?= $objectData->name; ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="<?= base_url('manage_atraction/save_update/' . $objectData->id); ?>" method="post">
                            <div class="form-group row">
                                <label for="name" class=" col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="<?= $objectData->name; ?>">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category" value="1">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Open</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" name="open" value="<?= $objectData->open; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Close</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" name="close" value="<?= $objectData->close; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Employe</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="employe" value="<?= $objectData->employe; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class=" col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="price" value="<?= $objectData->price; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact_person" class=" col-sm-2 col-form-label">Contact person</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact_person" value="<?= $objectData->contact_person; ?>">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea" style="height: 150px" name="description"><?= $objectData->description; ?></textarea>
                                        <label for="floatingTextarea">Description</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                            <button type="reset" class="btn btn-danger btn-sm">cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <!-- Object Location on Map -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Google Maps</h5>
                </div>
                <!-- Object Map body -->
                <?= $this->include('layout/map-body'); ?>
            </div>

        </div>
    </div>
</section>
<script>
    let indexUrl
    let datas = [<?= json_encode($objectData) ?>]
    let url = '<?= $url ?>'
    let geomApar = JSON.parse('<?= $aparData->geoJSON; ?>')
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)
</script>
<script src="<?= base_url('/assets/js/map.js') ?>"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&region=ID&language=en&callback=initMap"></script>
<?= $this->endSection() ?>