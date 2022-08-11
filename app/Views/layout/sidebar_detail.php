<div class="d-flex justify-content-center avatar avatar-xl me-3" id="avatar-sidebar">
    <img src="<?= base_url('/assets/images/pesona_apar.png'); ?>" alt="" srcset="">
</div>
<?php if (in_groups('user') || in_groups('admin')) : ?>
    <div class="p-2 d-flex justify-content-center">Hello, <?= user()->username; ?></div>
<?php else : ?>
    <div class="p-2 d-flex justify-content-center">Hello, Visitor</div>
<?php endif; ?>