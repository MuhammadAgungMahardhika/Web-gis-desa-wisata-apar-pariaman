<?php if (isset($objectData->name)) : ?>
    <tr>
        <td class="fw-bold">Name</td>
        <td><?= $objectData->name; ?></td>
    </tr>
<?php endif; ?>
<?php if (isset($objectData->employe)) : ?>
    <tr>
        <td class="fw-bold">Employe</td>
        <td><?= $objectData->employe; ?></td>
    </tr>
<?php endif; ?>
<?php if (isset($objectData->category)) : ?>
    <tr>
        <td class="fw-bold">Category</td>
        <td><?= $objectData->category; ?></td>
    </tr>
<?php endif; ?>
<?php if (isset($objectData->open)) : ?>
    <tr>
        <td class="fw-bold">Open</td>
        <td><?= $objectData->open; ?></td>
    </tr>
<?php endif; ?>
<?php if (isset($objectData->close)) : ?>
    <tr>
        <td class="fw-bold">Close</td>
        <td><?= $objectData->close; ?></td>
    </tr>
<?php endif; ?>
<?php if (isset($objectData->price)) : ?>
    <tr>
        <td class="fw-bold">Ticket Price</td>
        <td>
            <?php if ($objectData->price == '0') : ?>
                FREE IDR
            <?php else : ?>
                <?= $objectData->price; ?> IDR
            <?php endif; ?>
        </td>
    </tr>
<?php endif; ?>
<?php if (isset($objectData->contact_person)) : ?>
    <tr>
        <td class="fw-bold">Contact Person</td>
        <td><?= $objectData->contact_person; ?></td>
    </tr>
<?php endif; ?>