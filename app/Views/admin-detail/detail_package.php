<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<section class="section">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_package') ?>">List package</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail package</li>
        </ol>
    </nav>
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="text-end">
                            <a href="<?= base_url('manage_package/edit/' . $objectData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit"><i class="fa fa-edit"></i></a>
                        </div>
                        <h5 class="m-0 font-weight-bold  text-center"> Detail Package</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?= $objectData->name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><?= $objectData->price; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Capacity</td>
                                        <td><?= $objectData->min_capacity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td><?= $objectData->contact_person; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Description</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: justify;" colspan="2"><?= $objectData->description; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php if ($facilityPackage) : ?>
                                <h5 class=" ps-2">Facility</h5>
                                <?php $no = 1; ?>
                                <?php foreach ($facilityPackage as $facility) : ?>
                                    <table class="">
                                        <tr>
                                            <td class="ps-2">
                                                <?= $no++; ?>. <?= $facility->name; ?>
                                            </td>
                                        </tr>
                                    </table>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card shadow-sm">
                <?php if (isset($objectData->url)) : ?>
                    <div class="p-4">
                        <img class="d-block w-100 rounded" src="<?= base_url('media/photos/package/'); ?>/<?= $objectData->url; ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php if ($activitiesData) : ?>
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold  text-start ps-1"> Activities to do</h5>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="row d-flex">
                        <?php foreach ($activitiesData as $activities) : ?>
                            <div class="col-md-12">
                                <div class="card mb-3 border">
                                    <div class="row g-0">
                                        <div class="col-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $activities->name; ?></h5>
                                                <p class="card-text"><?= $activities->description; ?></p>
                                                <button onclick="showGalleryModal('<?= $activities->id; ?>')" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#activitiesModal">
                                                    <span class="material-icons" style="font-size: 1.5rem; vertical-align: bottom">image</span> Open Gallery
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!--Gallery Modal -->
        <div class="modal fade text-left" id="activitiesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Gallery</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselSupport" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" id="carouselSupportIndicator">
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
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    function showGalleryModal(id) {
        console.log("<?= base_url('getActivityGallery') ?>" + "/" + id)
        $.ajax({
            url: "<?= base_url('package/getActivityGallery') ?>" + "/" + id,
            method: "get",
            dataType: "json",
            success: function(response) {
                let no = 0
                let data = response.objectData[0]
                let gallery = response.galleryData
                if (gallery.length != 0) {
                    $('#carouselSupportIndicator').html('')
                    $('#carouselSupportInner').html('')
                    $('#myModalLabel17').html(data.name)
                    for (i in gallery) {
                        $('#carouselSupportIndicator').append(`<li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="${no}" class="${(() => { if (no == 0) { return `active` } else { return '' } })()}"></li>`)
                        $('#carouselSupportInner').append(`<div class="carousel-item ${(() => { if (no == 0) { return `active` } else { return '' } })()}"><img class="d-block w-100" src="<?= base_url('media/photos/activities/') ?>/${gallery[i].url}" style="cursor: pointer;"></div>`)
                        no++
                    }
                } else {
                    $('#carouselSupportInner').html(`<div class="carousel-item text-center active">no photo found!</div>`)
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