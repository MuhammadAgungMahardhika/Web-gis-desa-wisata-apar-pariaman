<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Object Information</h4>
                    <div class="text-center">
                        <?php if (isset($count_like->likes)) : ?>
                            <p> <i id="count_like" class="fa fa-thumbs-up btn btn-primary"> <?= $count_like->likes ?></i> People like this atraction</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Name</td>
                                        <td><?= $objectData->name; ?></td>
                                    </tr>

                                    <?php
                                    if (isset($objectData->status)) : ?>
                                        <tr>
                                            <td class="fw-bold">Status</td>
                                            <td><?= $objectData->status; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php
                                    if (isset($objectData->schedule)) : ?>
                                        <tr>
                                            <td class="fw-bold">Schedule</td>
                                            <td><?= $objectData->schedule; ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="fw-bold">Ticket Price</td>
                                        <td>Rp 20.000</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Contact Person</td>
                                        <td>08123456789</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Description</p>
                            <p><?= $objectData->description; ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <?php if ($url == 'atraction') : ?>
                <!--Rating and Review Section-->
                <?= $this->include('layout/review'); ?>
            <?php endif; ?>
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
            <!-- Object Media -->
            <?= $this->include('layout/gallery_video'); ?>
        </div>
    </div>
</section>
<script>
    // Global variabel
    let datas = [<?= json_encode($objectData) ?>];
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)
    let ajaxUrl = <?= json_encode($url) ?>
</script>
<script src="/assets/js/map.js"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&region=ID&language=en&callback=initMap"></script>

<?= $this->endSection() ?>