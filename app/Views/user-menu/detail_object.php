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
                    <?= $this->include('/layout/detail_object_body'); ?>
                </div>
            </div>

            <!--Rating and Review Section-->
            <?= $this->include('layout/review'); ?>
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
    let geomApar = JSON.parse('<?= $aparData->geoJSON; ?>')
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)
    let url = <?= json_encode($url) ?>
</script>
<script src="/assets/js/map.js"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&region=ID&language=en&callback=initMap"></script>

<?= $this->endSection() ?>