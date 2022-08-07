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
                        <span class="material-symbols-outlined rating-color" id="s-1">star</span>
                        <span class="material-symbols-outlined rating-color" id="s-2">star</span>
                        <span class="material-symbols-outlined rating-color" id="s-3">star</span>
                        <span class="material-symbols-outlined rating-color" id="s-4">star</span>
                        <span class="material-symbols-outlined rating-color" id="s-5">star</span>
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
    let indexUrl
    let datas = [<?= json_encode($objectData) ?>]
    let url = '<?= $url ?>'
    avgRating()
    let geomApar = JSON.parse('<?= $aparData->geoJSON; ?>')
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)

    function avgRating() {
        let countRating = '<?= $count_rating->rating ?>'

        console.log(countRating)
        if (countRating == 5) {
            $("#s-1,#s-2,#s-3,#s-4,#s-5").addClass('star-checked');
        }
        if (countRating == 4) {
            $("#s-1,#s-2,#s-3,#s-4").addClass('star-checked');
            $("#s-5").removeClass('star-checked');
        }
        if (countRating == 3) {
            $("#s-1,#s-2,#s-3").addClass('star-checked');
            $("#s-4,#s-5").removeClass('star-checked');
        }
        if (countRating == 2) {
            $("#s-1,#s-2").addClass('star-checked');
            $("#s-3,#s-4,#s-5").removeClass('star-checked');
        }
        if (countRating == 1) {
            $("#s-1").addClass('star-checked');
            $("#s-2,#s-3,#s-4,#s-5").removeClass('star-checked');
        }
    }
</script>
<script src="/assets/js/map.js"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&region=ID&language=en&callback=initMap"></script>

<?= $this->endSection() ?>