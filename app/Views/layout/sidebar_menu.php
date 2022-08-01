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
                <a href="" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Atraction</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a class="sidebar-link" onclick="showObject('atraction')"><i class="fa fa-list"></i><span> List atraction</span></a>
                    </li>
                    <li class="submenu-item sidebar-item has-sub">
                        <a href="" class="sidebar-link"><i class="fa fa-compass"></i><span> Arround you</span> </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <input type="range" onchange="mainNearby(this.value,'atraction')" class="form-range autofocus" min="0" max="2000" step="10" id="radiusSlider" value="0">
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-item sidebar-item has-sub ">
                        <a href="" class="sidebar-link"><i class="fa fa-search"></i><span> Search</span> </a>
                        <ul class="submenu">
                            <li class="submenu-item sidebar-item has-sub">
                                <a href="" class="sidebar-link"><i class="fa fa-compass"></i><span> By Name</span> </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <div class="input-group">
                                            <a class="bi bi-search" onclick="getAtractionByName($('#atractionName').val())"></a>
                                            <input id="atractionName" type="text" class="form-control" onchange="getAtractionByName(this.value)">
                                        </div>
                                    </li>

                                    <!-- <select onchange="getAtractionByName()" class="form-select" id="basicSelect">
                                        <option>Select Atraction</option>
                                        <option>Mangrove Edupark</option>
                                        <option>Konservasi Penyu</option>
                                   </select> -->
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-item sidebar-item has-sub">
                        <a href="" class="sidebar-link"><i class="fa fa-compass"></i><span> By Rating</span> </a>
                        <ul class="submenu">
                            <li class="submenu-item">

                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

    </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Event</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a class="sidebar-link" onclick="showObject('event')"><i class="fa fa-list"></i><span> List event</span></a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="" class="sidebar-link"><i class="fa fa-compass"></i><span> Arround you</span> </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <input id="inputRange" type="range" onchange="mainNearby(this.value,'event')" class="form-range autofocus" min="0" max="2000" step="10" id="radiusSlider" value="0">
                    </li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub ">
                <a href="" class="sidebar-link"><i class="fa fa-search"></i><span> Search</span> </a>
                <ul class="submenu">
                    <li class="submenu-item sidebar-item has-sub">
                        <a href="" class="sidebar-link"><i class="fa fa-compass"></i><span> By Name</span> </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <div class="input-group">
                                    <a class="bi bi-search" onclick="getEventByName($('#eventName').val())"></a>
                                    <input id="eventName" type="text" class="form-control" onchange="getEventByName(this.value)">
                                </div>
                            </li>
                    </li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="" class="sidebar-link"><i class="fa fa-compass"></i><span> By Rating</span> </a>
                <ul class="submenu">
                    <li class="submenu-item">

                    </li>
                </ul>
            </li>

        </ul>
    </li>
<?php endif; ?>
<?php if (in_groups('admin')) : ?>
    <li class="sidebar-item  has-sub">
        <a href="" class='sidebar-link'>
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