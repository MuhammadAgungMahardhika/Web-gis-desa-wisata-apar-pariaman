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
                <a class='sidebar-link' onclick="showObject('atraction','A001')" style="cursor: pointer;">
                    <i class="iconify" data-icon="material-symbols:forest-rounded" data-width="25" data-height="25"></i>
                    <span>Apar Mangrove Park</span>
                </a>

            </li>
            <!-- Turtle Menu -->
            <li class="sidebar-item" id="turtleMenu">
                <a class='sidebar-link' onclick="showObject('atraction','A002')" style="cursor: pointer;">
                    <i class="iconify" data-icon="mdi:turtle" data-width="25" data-height="25"></i>
                    <span>Turtle Conservation</span>
                </a>

            </li>

        <?php endif; ?>
        <!-- Package Menu -->
        <li class="sidebar-item has-sub">
            <a href="" class="sidebar-link">
                <i class="fa-solid fa-square"></i><span>Tourism Package</span>
            </a>

            <ul class="submenu">
                <!-- List Event -->
                <li class="submenu-item" id="package-list">
                    <a href="<?= base_url('package'); ?>"><i class="fa-solid fa-list me-3"></i>List Package</a>
                </li>

                <li class="submenu-item has-sub" id="package-search">
                    <a data-bs-toggle="collapse" href="#subsubmenu-package" role="button" aria-expanded="false" aria-controls="subsubmenu-ev" class="collapse"><i class="fa-solid fa-magnifying-glass me-3"></i>Search by</a>
                    <ul class="subsubmenu collapse" id="subsubmenu-package" style="list-style: none;">
                        <!-- Package by Name -->
                        <li class="submenu-item" id="package-by-name">
                            <a data-bs-toggle="collapse" href="#searchNameEV" role="button" aria-expanded="false" aria-controls="searchNamePackage"><i class="fa-solid fa-arrow-down-a-z me-3"></i>Name</a>
                            <div class="collapse mb-3" id="searchNameEV">
                                <div class="d-grid gap-2">
                                    <input type="text" name="nameEV" id="nameEV" class="form-control" placeholder="Name" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                        <span class="material-icons" style="font-size: 1.5rem; vertical-align: bottom">search</span>
                                    </button>
                                </div>
                            </div>
                        </li>

                        <!-- Package by Category -->
                        <li class="submenu-item" id="package-by-category">
                            <a data-bs-toggle="collapse" href="#searchCategoryEV" role="button" aria-expanded="false" aria-controls="searchCategoryPackage"><i class="fa-solid fa-check-to-slot me-3"></i>Category</a>
                            <div class="collapse mb-3" id="searchCategoryEV">
                                <div class="d-grid">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="categoryEVSelect">
                                        </select>
                                    </fieldset>
                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                        <span class="material-icons" style="font-size: 1.5rem; vertical-align: bottom">search</span>
                                    </button>
                                </div>
                            </div>
                        </li>


                    </ul>
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
            <?php if (current_url() == base_url('manage_users') || current_url() == base_url('manage_apar') || current_url() == base_url('manage_atraction') || current_url() == base_url('manage_event') || current_url() == base_url('manage_culinary_place') || current_url() == base_url('manage_souvenir_place') || current_url() == base_url('manage_worship_place') || current_url() == base_url('manage_facility')) : echo 'active';
            endif; ?>" id="adminMenu">
                <a href="" class='sidebar-link'>
                    <i class="iconify" data-icon="fa6-solid:gear" data-width="25" data-height="25"></i>
                    <span>Manage menu</span>
                </a>
                <ul class="submenu 
                <?php if (current_url() == base_url('manage_users') || current_url() == base_url('manage_apar') || current_url() == base_url('manage_atraction') || current_url() == base_url('manage_event') || current_url() == base_url('manage_culinary_place') || current_url() == base_url('manage_souvenir_place') || current_url() == base_url('manage_worship_place') || current_url() == base_url('manage_facility')) : echo 'active';
                endif; ?>">
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_apar')) echo 'active'; ?>">
                        <i class="iconify" data-icon="fontisto:holiday-village" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_apar') ?>">Village</a>
                    </li>
                    <li class="submenu-item sidebar-link  <?php if (current_url() == base_url('manage_atraction')) echo 'active'; ?>">
                        <i class="iconify" data-icon="ant-design:star-filled" data-width="25" data-height="25"></i>
                        <a role="button" href="<?= base_url('manage_atraction') ?>">Uniqe Atraction</a>
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