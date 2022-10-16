<div class="row">
    <div class="col table-responsive">
        <table class="table table-borderless">
            <tbody>
                <?php
                if ($url == 'atraction') {
                    echo $this->include('/layout/detail_object_information/detail_object_atraction');
                }
                if ($url == 'event') {
                    echo $this->include('/layout/detail_object_information/detail_object_event');
                }
                if ($url == 'culinary_place') {
                    echo $this->include('/layout/detail_object_information/detail_object_cp');
                }
                if ($url == 'souvenir_place') {
                    echo $this->include('/layout/detail_object_information/detail_object_sp');
                }
                if ($url == 'worship_place') {
                    echo $this->include('/layout/detail_object_information/detail_object_wp');
                }

                if ($url == 'facility') {
                    echo $this->include('/layout/detail_object_information/detail_object_f');
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Description -->
<div class="row">
    <div class="col">
        <p class="fw-bold">Description</p>
        <p style="text-align: justify;"><?= $objectData->description; ?>
        </p>
    </div>
</div>


<!-- Product Souvenir -->
<?php if (isset($productData)) : ?>
    <div class="row">
        <div class="col">
            <p class="fw-bold">List product</p>
            <table class="table table-border">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Product name</td>
                        <td>Product price</td>
                        <td>Product image</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($productData as $product) :  ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $product->name; ?></td>
                            <td><?= $product->price; ?></td>
                            <td> <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#gallery">
                                    <span class="material-icons" style="font-size: 1.5rem; vertical-align: bottom">image</span> Product image
                                </button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<!-- Menu Culinary -->
<?php if (isset($menuData)) : ?>
    <div class="row">
        <div class="col">
            <p class="fw-bold">List menu</p>
            <table class="table table-border">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Menu name</td>
                        <td>Menu price</td>
                        <td>Menu image</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($menuData as $menu) :  ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $menu->name; ?></td>
                            <td><?= $menu->price; ?></td>
                            <td> <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#gallery">
                                    <span class="material-icons" style="font-size: 1.5rem; vertical-align: bottom">image</span> Menu image
                                </button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>