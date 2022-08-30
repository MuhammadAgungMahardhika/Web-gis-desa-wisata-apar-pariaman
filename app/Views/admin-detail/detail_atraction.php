<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('manage_atraction/edit/' . $objectData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit apar info"><i class="fa fa-edit"></i></a>
                    <h4 class="card-title text-center"><?= $objectData->name; ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">Category</td>
                                    <td><?= $objectData->category; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Employe</td>
                                    <td><?= $objectData->employe; ?></td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">Open</td>
                                    <td><?= $objectData->open; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Close</td>
                                    <td><?= $objectData->close; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Ticket Price</td>
                                    <td><?= $objectData->price; ?> IDR</td>
                                </tr>

                                <tr>
                                    <td class="fw-bold">Contact Person</td>
                                    <td><?= $objectData->contact_person; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Description -->
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Description</p>
                            <p><?= $objectData->description; ?>
                            </p>
                        </div>
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