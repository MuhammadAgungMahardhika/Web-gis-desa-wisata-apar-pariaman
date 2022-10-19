<?= $this->extend('layout/template.php') ?>
<?= $this->section('head') ?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1.0.11/dist/filepond-plugin-media-preview.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/pages/form-element-select.css'); ?>">
<style>
    .filepond--root {
        width: 100%;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <form class="form form-vertical" action="<?= base_url('manage_event/save_insert'); ?>" method="post">
        <div class="row">
            <!-- Object Detail Information -->
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('manage_event'); ?>" role="button" class="btn btn-primary justify-item-center" title="List event"><i class="fa fa-arrow-left"></i></a>
                        <h4 class="card-title text-center">Insert event</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="name" class=" col col-form-label">Name</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col col-form-label">Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date_start" autocomplete="off" required>
                                    </div>
                                    <div class="col ">
                                        <p class="text-center">to</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date_end" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col col-form-label">Time</label>
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" name="time_start" autocomplete="off" required>
                                    </div>
                                    <div class="col ">
                                        <p class="text-center">to</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" name="time_end" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class=" col col-form-label">Price</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="price" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_person" class=" col col-form-label">Contact person</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="contact_person" autocomplete="off">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row my-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px" name="description"></textarea>
                                            <label for="floatingTextarea">Description</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group  mb-4">
                                            <label for="gallery" class="form-label">Gallery</label>
                                            <input class="form-control" accept="image/*" type="file" name="gallery[]" id="gallery" multiple>
                                        </div>
                                        <div class="form-group  mb-4">
                                            <label for="video" class="form-label">Video</label>
                                            <input class="form-control" accept="video/*, .mkv" type="file" name="video" id="video">
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                <button type="reset" class="btn btn-danger btn-sm">cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <!-- Object Location on Map -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12 mb-3">
                                <h5 class="card-title">Google Maps</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Object Map body -->
                    <?= $this->include('layout/map-body'); ?>
                    <div class="card-footer">
                        <table class="table table-border">
                            <thead>
                                <th>Data spasial </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Geom area</td>
                                    <td>
                                        <input type="text" id="geo-json" class="form-control" name="geojson" placeholder="GeoJSON" readonly="readonly">
                                    </td>
                                    <td>
                                        <a onclick="clearGeomArea()" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clear geom area" class="btn icon btn-outline-primary" id="clear-drawing"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td colspan="2"><input type="text" class="form-control" id="latitude" name="latitude" autocomplete="off" readonly="readonly" required></td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td colspan="2"><input type="text" class="form-control" id="longitude" name="longitude" autocomplete="off" readonly="readonly" required></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <small>*Insert spatial data on map</small>
                            <div class="col-sm-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1.0.11/dist/filepond-plugin-media-preview.min.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="<?= base_url('assets/js/extensions/form-element-select.js'); ?>"></script>
<script>
    $(document).ready(function() {
        initDrawingManager(url)
    });
    let datas
    let url = '<?= $url ?>'
    let geomApar = JSON.parse('<?= $aparData->geoJSON; ?>')
    let latApar = parseFloat(<?= $aparData->lat; ?>)
    let lngApar = parseFloat(<?= $aparData->lng; ?>)

    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageResize,
        FilePondPluginMediaPreview,
    );

    // Get a reference to the file input element
    const photo = document.querySelector('input[id="gallery"]');
    const video = document.querySelector('input[id="video"]');

    // Create a FilePond instance
    const pond = FilePond.create(photo, {
        imageResizeTargetHeight: 650,
        imageResizeUpscale: false,
        credits: false,
    })
    const vidPond = FilePond.create(video, {
        credits: false,
    })
    pond.setOptions({
        server: "<?= base_url('upload/photo') ?>"
    })
    vidPond.setOptions({
        server: "<?= base_url('upload/video') ?>"
    })
</script>
<script src="<?= base_url('/assets/js/map.js') ?>"></script>
<!-- Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&callback=initMap&libraries=drawing"></script>
<?= $this->endSection() ?>