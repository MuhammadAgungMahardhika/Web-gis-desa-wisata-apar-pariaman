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
<!-- Begin Page Content -->
<div class="container-fluid ">
    <div class="row ">
        <div class="col">
            <div class="card mb-3" style="max-width: 100%;">
                <form action="<?= base_url('User/save_update/' . user()->id) ?>" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-md-4 text-center p-4">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group  mb-4">
                                        <label for="avatar" class="form-label">User image</label>
                                        <input class="form-control" accept="image/*" type="file" name="avatar" id="avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center ">
                                <div class="col-md">
                                    <a role="button" class="btn btn-outline-primary" href="<?= base_url('user/profile'); ?>">
                                        <i class="fa fa-arrow-left"></i>
                                        Back to profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">

                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="<?= user()->email ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= user()->username ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Fullname</label>
                                    <input type="text" class="form-control" autocomplete="off" name="name" value="<?= user()->name ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="number" class="form-control" autocomplete="off" name="contact" value="<?= user()->contact ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" autocomplete="off" name="address" value="<?= user()->address ?>">
                                </div>

                                <button type="submit" class="btn btn-success ">Save</button>
                                <button type="reset" class="btn btn-danger">Reset</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Flass message -->
<?php
if (session()->getFlashdata('success')) : ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '<?php echo session()->getFlashdata('success') ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

<?php elseif (session()->getFlashdata('failed')) : ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '<?php echo session()->getFlashdata('failed') ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

<?php endif; ?>
<!-- Akhir Flash Message -->
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
    const photo = document.querySelector('input[id="avatar"]');
    // Create a FilePond instance
    const pond = FilePond.create(photo, {
        imageResizeTargetHeight: 400,
        imageResizeUpscale: false,
        credits: false,
        stylePanelLayout: 'circle',
        stylePanelAspectRatio: '1:1'
    })
    <?php if (user()->user_image != 'default.png') : ?>
        pond.addFiles(`<?= base_url('assets/images/user-photos'); ?>/<?= user()->user_image; ?>`)
    <?php else : ?>
        pond.addFiles(`<?= base_url('assets/images/user-photos' . '/' . 'default.png'); ?>`)
    <?php endif; ?>
    pond.setOptions({
        server: "<?= base_url('upload/avatar') ?>"
    })
</script>
<?= $this->endSection() ?>