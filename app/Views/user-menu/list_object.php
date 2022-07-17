<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <!--map-->
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-auto">
                            <h5 class="card-title">Google Maps with Location</h5>
                        </div>
                        <div class="col">
                            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Current Location" class="btn icon btn-primary mx-1" id="current-position" onclick="currentLocation()">
                                <span class="material-symbols-outlined">my_location</span>
                            </a>
                            <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Set Manual Location" class="btn icon btn-primary mx-1" id="manual-position" onclick="manualLocation()">
                                <span class="material-symbols-outlined">pin_drop</span>
                            </a>
                            <span id="legendButton">
                                <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Toggle Legend" class="btn icon btn-primary mx-1" id="legend-map" onclick="legend();">
                                    <span class="material-symbols-outlined">visibility</span>
                                </a>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="googlemaps" id="map" onload="initMap();" style="height: 60vh;">
                    </div>
                </div>
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
                            <input type="range" oninput="sliderChange(this.value)" class="form-range autofocus" min="0" max="500" step="10" id="radiusSlider" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card shadow">
                <div class="card-header">
                    <h5 class="card-title text-center" id="panelListTittle">List Object</h5>
                </div>
                <div class="card-body">
                    <table class="table-responsive overflow-auto" id="panelTabel" width="100%">
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    // Global variabel
    let datas = JSON.parse('<?= json_encode($objectData) ?>');
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)
    let ajaxUrl = null
</script>
<script src="/assets/js/map.js"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&region=ID&language=en&callback=initMap">
</script>
<?= $this->endSection() ?>