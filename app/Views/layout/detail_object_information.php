<div class="row">
    <div class="col table-responsive">
        <table class="table table-borderless">
            <tbody>
                <!-- Name of object -->
                <tr>
                    <td class="fw-bold">Name</td>
                    <td><?= $objectData->name; ?></td>
                </tr>
                <!-- Owner culinary -->
                <?php
                if (isset($objectData->owner)) : ?>
                    <tr>
                        <td class="fw-bold">Owner</td>
                        <td><?= $objectData->owner; ?></td>
                    </tr>
                <?php endif; ?>
                <!-- status -->
                <?php
                if (isset($objectData->status)) : ?>
                    <tr>
                        <td class="fw-bold">Status</td>
                        <td><?= $objectData->status; ?></td>
                    </tr>
                <?php endif; ?>
                <!-- schedule -->
                <?php
                if (isset($objectData->schedule)) : ?>
                    <tr>
                        <td class="fw-bold">Schedule</td>
                        <td><?= $objectData->schedule; ?></td>
                    </tr>
                <?php endif; ?>
                <!-- price ticket -->
                <?php
                if (isset($objectData->price)) : ?>
                    <tr>
                        <td class="fw-bold">Ticket Price</td>
                        <td><?= $objectData->price; ?></td>
                    </tr>
                <?php endif; ?>
                <!-- contact person -->
                <?php
                if (isset($objectData->contact_person)) : ?>
                    <tr>
                        <td class="fw-bold">Contact Person</td>
                        <td><?= $objectData->contact_person; ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

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

<!-- Description -->
<div class="row">
    <div class="col">
        <p class="fw-bold">Description</p>
        <p><?= $objectData->description; ?>
        </p>
    </div>
</div>