<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <!--map-->
        <div class="col-md-8 col-12">
            <div class="card">
                <?= $this->include('layout/map-head'); ?>
                <?= $this->include('layout/map-body'); ?>
            </div>
        </div>

        <div class="col-md-4 col-12" id="list">
            <!-- List Object -->
            <div class="row card shadow mb-2" id="rowObjectArround" style="display:none;">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Object Arround</h6>
                </div>
                <div class="card-body">
                    <div class="card shadow mb-4">
                        <div class="card-body" id="panelContainer">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cpCheck">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Culinary place
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="wpCheck">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Worship place
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="spCheck">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Souvenir place
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="fCheck">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Facility
                                </label>
                            </div>
                            <output id="sliderVal"></output>
                            <input type="range" onchange="supportNearby(this.value)" class="form-range autofocus" min="0" max="2000" step="1" id="radiusSlider" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card shadow" id="panel">

            </div>
        </div>
    </div>

</section>
<script>
    // Global variabel
    let datas, url
    let geomApar = JSON.parse('<?= $aparData->geoJSON; ?>')
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)
</script>
<script src="/assets/js/map.js"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&region=ID&language=en&callback=initMap"></script>
<?= $this->endSection() ?>