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
<div class="container-fluid">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_package') ?>">List package</a></li>
            <li class="breadcrumb-item active" aria-current="page">List activities</li>

        </ol>
    </nav>
    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">List Activities</h5>
            <a class="btn btn-success btn-sm my-2" title="add new activity" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fa fa-plus"> </i>Add new activity
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <?php $no = 1; ?>
                        <tr>
                            <th>No</th>

                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($objectData as $activities) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $activities->name; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary btn-sm" title="Edit activities" onclick="showActivity('<?= $activities->id; ?>')" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i> </a>
                                    <a class="btn btn-outline-danger btn-sm" title="Delete activities" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $activities->id; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- Delete Modal-->
                                    <div class="modal fade" id="deleteModal<?= $activities->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure delete <b>" <?= $activities->name; ?> "</b> activities?</div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="<?= base_url('manage_activities/delete/' . $activities->id) ?>">Delete</a>
                                                </div>
                                            </div>
                                        </div>
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
<!-- /.container-fluid -->
<!-- Update activity Modal-->
<div class="modal fade text-start" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form form-vertical" action="<?= base_url('manage_activities/save_update/'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update activity</h5>
                </div>
                <div class="modal-body">
                    <!-- Form data nonspasial -->
                    <input type="hidden" id="idUpdate" name="id">
                    <div class="form-group">
                        <label for="name" class="col col-form-label">Activity name</label>
                        <div class="col">
                            <input type="text" class="form-control" id="nameUpdate" name="name" " autocomplete=" off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col col-form-label">Description</label>
                        <div class="col">
                            <textarea class="form-control" id="descriptionUpdate" name="description" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="galleryActivityUpdate" class="form-label">Gallery</label>
                        <span id="formGallery">

                        </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add activity Modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="form form-vertical" action="<?= base_url('manage_activities/save_insert/'); ?>" method="post">
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

    function showActivity($id = null) {
        $('#formGallery').html('')
        $('#formGallery').html('<input class="form-control" accept="image/*" type="file" name="gallery[]" id="galleryActivityUpdate" multiple>')
        let photoActivityUpdate = document.querySelector(`input[id="galleryActivityUpdate"]`);
        // Create a FilePond instance
        let pondActivityUpdate = FilePond.create(photoActivityUpdate, {
            imageResizeTargetHeight: 720,
            imageResizeUpscale: false,
            credits: false,
        })
        pondActivityUpdate.setOptions({
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

        $.ajax({
            url: "<?= base_url('manage_activities'); ?>" + "/" + "activity" + "/" + $id,
            method: "get",
            dataType: "json",
            success: function(response) {
                if (response) {

                    $('#idUpdate').val(response.objectData[0].id)
                    $('#nameUpdate').val(response.objectData[0].name)
                    $('#descriptionUpdate').val(response.objectData[0].description)
                    response.galleryData.forEach(element => {
                        pondActivityUpdate.addFiles(
                            `<?= base_url('media/photos/activities/'); ?>/${element.url}`
                        );
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>