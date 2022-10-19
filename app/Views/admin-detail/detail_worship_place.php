<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="text-end">
                            <a href="<?= base_url('manage_worship_place/edit/' . $objectData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit"><i class="fa fa-edit"></i></a>
                        </div>
                        <h4 class="card-title text-center"><?= $objectData->name; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-border">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Category</td>
                                        <td><?= $objectData->category; ?></td>
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
                                        <td class="fw-bold">Bulding size</td>
                                        <td><?= $objectData->building_size; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Capacity</td>
                                        <td><?= $objectData->capacity; ?></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="fw-bold" colspan="2">Description</td>
                                    </tr>
                                    <tr class="border">
                                        <td style="text-align: justify;" colspan="2"><?= $objectData->description; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row my-2">
                            <h4 class="card-title text-center">Gallery</h4>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <?php $no = 0; ?>
                                <ol class="carousel-indicators">
                                    <?php foreach ($galleryData as $gallery) : ?>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= esc($no); ?>" class="<?php if ($no == 0) echo 'active'; ?>"></li>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </ol>
                                <div class="carousel-inner">
                                    <!-- List gallery -->
                                    <?php $no = 0; ?>
                                    <?php if (!$galleryData) : ?>
                                        <?= '<div class="text-center">
                                        <button class="col-sm-4 btn btn-outline-primary text-center">Gallery is empty!</button>
                                        </div>' ?>
                                    <?php endif; ?>
                                    <?php foreach ($galleryData as $gallery) : ?>
                                        <div class="carousel-item <?php if ($no == 0) echo 'active'; ?>">
                                            <img src="<?= base_url('media/photos/'); ?>/<?= $gallery->url; ?>" class="d-block w-100">
                                        </div>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </div>
                                <a class=" carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
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