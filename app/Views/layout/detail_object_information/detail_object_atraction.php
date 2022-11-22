<tr>
    <td class="fw-bold">Name</td>
    <td><?= $objectData->name; ?></td>
</tr>
<tr>
    <td class="fw-bold">Employe</td>
    <td><?= $objectData->employe; ?></td>
</tr>
<tr>
    <td class="fw-bold">Category</td>
    <td><?= $objectData->category; ?></td>
</tr>
<tr>
    <td class="fw-bold">Open</td>
    <td><?= $objectData->open; ?></td>
</tr>
<tr>
    <td class="fw-bold">Close</td>
    <td><?= $objectData->close; ?></td>
</tr>
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

<tr>
    <td class="fw-bold">Contact Person</td>
    <td><?= $objectData->contact_person; ?></td>
</tr>