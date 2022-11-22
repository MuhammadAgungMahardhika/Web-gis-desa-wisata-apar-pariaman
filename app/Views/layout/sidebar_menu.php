<div class="sidebar-menu">
    <?= $this->include('layout/sidebar_detail'); ?>
    <ul class="menu">
        <li class="sidebar-item <?= current_url() === base_url('list_object') ? 'active' : ''; ?>" id="indexMenu">
            <a href="<?= base_url('list_object') ?>" class='sidebar-link'>
                <i class="iconify" data-icon="ant-design:home-filled" data-width="25" data-height="25"></i>
                <span>Home</span>
            </a>
        </li>
        <?php if (current_url() == base_url('list_object')) : ?>
            <!-- Apar mangrove Menu -->
            <li class="sidebar-item" id="mangroveMenu">
                <a class='sidebar-link' onclick="showObject('atraction','1')" style="cursor: pointer;">
                    <i class="iconify" data-icon="material-symbols:forest-rounded" data-width="25" data-height="25"></i>
                    <span>Apar Mangrove Park</span>
                </a>

            </li>
            <!-- Turtle Menu -->
            <li class="sidebar-item" id="turtleMenu">
                <a class='sidebar-link' onclick="showObject('atraction','2')" style="cursor: pointer;">
                    <i class="iconify" data-icon="mdi:turtle" data-width="25" data-height="25"></i>
                    <span>Turtle Conservation</span>
                </a>

            </li>

        <?php endif; ?>
        <!-- Package Menu -->
        <li class="sidebar-item <?= current_url() == base_url('package') ? 'active' : '' ?>" id="packageMenu">
            <a href="<?= base_url('package') ?>" class="sidebar-link">
                <i class="iconify" data-icon="material-symbols:package-outline-rounded" data-width="25" data-height="25"></i>
                <span> Tourism Package </span>
            </a>

        </li>
        <!-- Product Menu -->
        <li class="sidebar-item  has-sub <?= (current_url() == base_url('product/culinary') || current_url() == base_url('product/souvenir')) ? 'active' : '' ?>" id="productMenu">
            <a href="" class='sidebar-link'>
                <i class="iconify" data-icon="emojione-monotone:shopping-cart" data-width="25" data-height="25"></i>
                <span>Product</span>
            </a>
            <ul class="submenu <?= (current_url() == base_url('product/culinary') || current_url() == base_url('product/souvenir')) ? 'active' : '' ?>">
                <li class="submenu-item sidebar-link <?= (current_url() == base_url('product/culinary')) ? 'active' : '' ?>">
                    <i class="iconify" data-icon="fluent:food-20-regular" data-width="25" data-height="25"></i>
                    <a role="button" href="<?= base_url('product/culinary') ?>">Culinary</a>
                </li>
                <li class="submenu-item sidebar-link  <?= (current_url() == base_url('product/souvenir')) ? 'active' : '' ?>">
                    <i class="iconify" data-icon="dashicons:products" data-width="25" data-height="25"></i>
                    <a role="button" href="<?= base_url('product/souvenir') ?>">Souvenir</a>
                </li>
            </ul>
        </li>
        <!-- Admin Menu -->
        <?php if (in_groups('admin')) : ?>
            <li class="sidebar-title">Admin</li>
            <li class="sidebar-item <?= current_url() == base_url('dashboard') ? 'active' : ''; ?>" id="indexMenu">
                <a href="<?= base_url('dashboard') ?>" class='sidebar-link'>
                    <i class="iconify" data-icon="clarity:home-solid" data-width="25" data-height="25"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub 
            <?= (current_url() == base_url('manage_users') || current_url() == base_url('manage_apar') || current_url() == base_url('manage_atraction') || current_url() == base_url('manage_package') || current_url() == base_url('manage_product') || current_url() == base_url('manage_event') || current_url() == base_url('manage_culinary_place') || current_url() == base_url('manage_souvenir_place') || current_url() == base_url('manage_worship_place') || current_url() == base_url('manage_facility')) ? 'active' : '' ?>" id="adminMenu">
                <a href="" class='sidebar-link'>
                    <i class="iconify" data-icon="fa6-solid:gear" data-width="25" data-height="25"></i>
                    <span>Manage menu</span>
                </a>
                <ul class="submenu 
                <?php if (current_url() == base_url('manage_users') || current_url() == base_url('manage_apar') || current_url() == base_url('manage_atraction') || current_url() == base_url('manage_package') || current_url() == base_url('manage_product') || current_url() == base_url('manage_event') || current_url() == base_url('manage_culinary_place') || current_url() == base_url('manage_souvenir_place') || current_url() == base_url('manage_worship_place') || current_url() == base_url('manage_facility')) : echo 'active';
                endif; ?>">
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_users')) echo 'active'; ?>">
                        <i class="iconify" data-icon="clarity:users-solid" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_users') ?>">Admin</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_apar')) echo 'active'; ?>">
                        <i class="iconify" data-icon="fontisto:holiday-village" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_apar') ?>">Village</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_atraction')) echo 'active'; ?>">
                        <i class="iconify" data-icon="ant-design:star-filled" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_atraction') ?>">Uniqe Atraction</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_package')) echo 'active'; ?>">
                        <i class="iconify" data-icon="material-symbols:package-outline-rounded" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_package') ?>">Package</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_product')) echo 'active'; ?>">
                        <i class="iconify" data-icon="emojione-monotone:shopping-cart" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_product') ?>">Product</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_souvenir_place')) echo 'active'; ?>">
                        <i class="iconify" data-icon="typcn:gift" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_souvenir_place') ?>">Souvenir</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_culinary_place')) echo 'active'; ?>">
                        <i class="iconify" data-icon="dashicons:food" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_culinary_place') ?>">Culinary</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_worship_place')) echo 'active'; ?>">
                        <i class="iconify" data-icon="mdi:mosque" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_worship_place') ?>">Worship</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_facility')) echo 'active'; ?>">
                        <i class="iconify" data-icon="mdi:tools" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_facility') ?>">Facility</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

    </ul>
</div>