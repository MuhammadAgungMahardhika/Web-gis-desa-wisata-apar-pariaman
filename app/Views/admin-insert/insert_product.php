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
            <li class="breadcrumb-item "><a href="<?= base_url('manage_product') ?>">List product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Insert product</li>

        </ol>
    </nav>
    <form class="form form-vertical" action="<?= base_url('manage_product/save_insert'); ?>" method="post">
        <div class="row">
            <!-- Object Detail Information -->
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('manage_product'); ?>" role="button" class="btn btn-primary justify-item-center" title="List product"><i class="fa fa-arrow-left"></i></a>
                        <h4 class="card-title text-center">Insert product</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-body">
                                <!-- Form data nonspasial -->
                                <div class="form-group">
                                    <label for="name" class="col col-form-label">Name</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category" class="col col-form-label">Category</label>
                                    <div class="col">
                                        <select class="form-select" id="category" name="category">
                                            <?php foreach ($categoryData as $category) : ?>
                                                <option value="<?= $category->id; ?>"><?= esc($category->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="price" class=" col col-form-label">Price</label>
                                    <div class="col">
                                        <input type="number" class="form-control" name="price" autocomplete="off">
                                    </div>
                                </div>
                                <!-- Description -->
                                <div class="row my-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px" name="description" autocomplete="off"></textarea>
                                            <label for="floatingTextarea">Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group  mb-4">
                            <label for="gallery" class="form-label">Brosur image</label>
                            <input class="form-control" accept="image/*" type="file" name="gallery[]" id="gallery">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                        <button type="reset" class="btn btn-danger btn-sm">cancel</button>
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

    pond.setOptions({
        server: {
            timeout: 3600000,
            process: {
                url: '<?= base_url("upload/photo") ?>',
                onload: (response) => {
                    console.log("processed:", response);
                    return response
                },
                onerror: (response) => {
                    console.log("error:", response);
                    return response
                },
            },
            revert: {
                url: '<?= base_url("upload/photo") ?>',
                onload: (response) => {
                    console.log("reverted:", response);
                    return response
                },
                onerror: (response) => {
                    console.log("error:", response);
                    return response
                },
            },
        }
    })
</script>

<?= $this->endSection() ?>