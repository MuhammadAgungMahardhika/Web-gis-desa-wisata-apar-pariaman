<div class="sidebar-menu">
    <?= $this->include('layout/sidebar_detail'); ?>
    <ul class="menu">
        <!-- <li class="sidebar-title">Menu</li> -->

        <li class="sidebar-item  ">
            <a href="<?= base_url('list_object') ?>" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Home</span>
            </a>
        </li>
        <?php if (current_url() == base_url('list_object')) : ?>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Main Atraction</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a role="button" onclick="showObject('atraction')">List atraction</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" onclick="showObject('event')">event</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Support Object</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a role="button" onclick="showObject('culinary_place')">Culinary place</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" onclick="showObject('souvenir_place')">Souvenir place</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" onclick="showObject('worship_place')">Worship place</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" onclick="showObject('facility')">Facility</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if (in_groups('admin')) : ?>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Manage menu</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_users') ?>">Users</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_atraction') ?>">Atraction</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_apar') ?>">Apar Info</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_event') ?>">Event</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_souvenir_place') ?>">Souvenir Place</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_culinary_place') ?>">Culinary Place</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_worship_place') ?>">Worship Place</a>
                    </li>
                    <li class="submenu-item ">
                        <a role="button" href="<?= base_url('manage_facility') ?>">Facility</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</div>