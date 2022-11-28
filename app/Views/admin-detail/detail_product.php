<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<section class="section">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_product') ?>">List product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail product</li>
        </ol>
    </nav>
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="row">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="text-end">
                            <a href="<?= base_url('manage_product/edit/' . $objectData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit"><i class="fa fa-edit"></i></a>
                        </div>
                        <h5 class="m-0 font-weight-bold  text-center"> Detail Product</h5>
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
                                        <td>Category</td>
                                        <td><?= $objectData->category; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><?= $objectData->price; ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">Description</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: justify;" colspan="2"><?= $objectData->description; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <img class="d-block w-100 rounded" src="<?= base_url('media/photos/product/'); ?>/<?= $objectData->url; ?>" alt="">

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