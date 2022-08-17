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
                            <input id="radiusSlider" type="range" onchange="supportNearby(this.value)" class="form-range autofocus" min="0" max="2000" step="10" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card shadow">
                <div class="overflow-auto" id="panel">
                </div>
            </div>
        </div>
        <!--Basic Modal -->
        <div class="modal fade text-left" id="supportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="supportTitle"></h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="supportData">
                        </div>
                        <div id="supportGallery" class="my-2">
                            <div>
                                <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#carouselSupport" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    show photo gallery
                                </a>
                            </div>
                            <div class="card-body m-0">
                                <div id="carouselSupport" class="collapse carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class=""></li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class=""></li>
                                    </ol>
                                    <div class="carousel-inner" id="carouselSupportInner">

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselSupport" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselSupport" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<script>
    // Global variabel
    let datas, url
    let indexUrl = '<?= $url; ?>'
    let geomApar = JSON.parse('<?= $aparData->geoJSON; ?>')
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)
</script>
<script src="/assets/js/map.js"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&region=ID&language=en&callback=initMap"></script>
<?= $this->endSection() ?>