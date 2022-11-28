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
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_package') ?>">List package</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_package/detail/' . $objectData->id); ?>">Detail package</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit package</li>
        </ol>
    </nav>
    <form class="form form-vertical" action="<?= base_url('manage_package/save_update/' . $objectData->id); ?>" method="post">
        <div class="row">
            <!-- Object Detail Information -->
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('manage_package/detail/' . $objectData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="back to detail"><i class="fa fa-arrow-left"></i></a>
                        <h4 class="card-title text-center">Edit Package</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-body">
                                <!-- Form data nonspasial -->
                                <div class="form-group">
                                    <label for="name" class="col col-form-label">Name</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" value="<?= $objectData->name; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="min_capacity" class="col col-form-label">Min Capacity</label>
                                    <div class="col">
                                        <input type="number" class="form-control" name="min_capacity" value="<?= $objectData->min_capacity; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class=" col col-form-label">Price</label>
                                    <div class="col">
                                        <input type="number" class="form-control" name="price" value="<?= $objectData->price; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_person" class=" col col-form-label">Contact person</label>
                                    <div class="col">
                                        <input type="number" class="form-control" name="contact_person" value="<?= $objectData->contact_person; ?>">
                                    </div>
                                </div>
                                <!-- Facility -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table  table-borderless">
                                                <thead>
                                                    <label for="contact_person" class=" col col-form-label">Facility</label>
                                                </thead>
                                                <tbody id="listFacility">
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" name="facility" placeholder="Write available facility here" autocomplete="off" id="facility">
                                                        </td>
                                                        <td>
                                                            <a title="add facility" class="btn btn-success btn-sm form-control" onclick="addNewFacility(`${$('#facility').val()}`)"> Add</a>
                                                        </td>
                                                    </tr>
                                                    <?php foreach ($facilityPackages as $fp) : ?>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control" name="facility_package[]" required value="<?= $fp->name; ?>">
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Description -->
                                <div class="row my-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px" name="description"><?= $objectData->description; ?></textarea>
                                            <label for="floatingTextarea">Description</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group  mb-4">
                                            <label for="gallery" class="form-label">Brosur Image</label>
                                            <input class="form-control" accept="image/*" type="file" name="gallery[]" id="gallery">
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
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12 mb-3">
                                <a class="btn btn-outline-success btn-sm my-2" title="add new activity" data-bs-toggle="modal" data-bs-target="#addModal">
                                    <i class="fa fa-plus"></i>Add new activity
                                </a>
                                <h5 class="card-title my-2 text-secondary">List activities</h5>
                                <table class="table table-borderless">
                                    <tbody>
                                        <?php foreach ($activitiesData as $activity) : ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" <?php foreach ($activitiesPackage as $ac) : ?> <?php if ($activity->id == $ac->id) : ?> checked <?php endif; ?> <?php endforeach; ?> type="checkbox" value="<?= $activity->id; ?>" name="activities[]" multiple>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            <?= $activity->name; ?>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Add activity Modal-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form form-vertical" action="<?= base_url('manage_package/save_activity/' . $objectData->id); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adding new activity</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form data nonspasial -->
                        <div class="form-group">
                            <label for="name" class="col col-form-label">Activity name</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col col-form-label">Description</label>
                            <div class="col">
                                <textarea class="form-control" id="description" name="description" autocomplete="off"></textarea>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="url" value="edit" autocomplete="off" required>
                        <div class="form-group">
                            <label for="galleryActivity" class="form-label">Gallery</label>
                            <input class="form-control" accept="image/*" type="file" name="gallery[]" id="galleryActivity" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageResize,
        FilePondPluginMediaPreview,
    );

    // Get a reference to the file input element
    const photo = document.querySelector('input[id="gallery"]');


    // Create a FilePond instance
    const pond = FilePond.create(photo, {
        imageResizeTargetHeight: 720,
        imageResizeUpscale: false,
        credits: false,
    })

    <?php if ($objectData->url) : ?>
        pond.addFiles(
            "<?= base_url('media/photos/package/'); ?>/<?= $objectData->url; ?>"
        );
    <?php endif; ?>

    pond.setOptions({
        server: "<?= base_url('upload/photo') ?>"
    })

    // add new activity gallery
    // Get a reference to the file input element
    const photoActivity = document.querySelector('input[id="galleryActivity"]');

    // Create a FilePond instance
    const pondActivity = FilePond.create(photoActivity, {
        imageResizeTargetHeight: 720,
        imageResizeUpscale: false,
        credits: false,
    })

    pondActivity.setOptions({
        server: "<?= base_url('upload/photo') ?>"
    })

    function addNewFacility(val) {
        $('#listFacility').append(`<tr><td><input type="text" class="form-control" name="facility_package[]" required value="${val}"></td></tr>`)
        $('#facility').val('');

    }
</script>

<?= $this->endSection() ?>