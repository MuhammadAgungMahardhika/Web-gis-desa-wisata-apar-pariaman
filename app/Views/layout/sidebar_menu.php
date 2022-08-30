<div class="sidebar-menu">
    <?= $this->include('layout/sidebar_detail'); ?>
    <ul class="menu">
        <li class="sidebar-item  ">
            <a href="<?= base_url('list_object') ?>" class='sidebar-link'>
                <i class="fa fa-home"></i>
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
                                <output class="text-primary" id="atSliderVal">0 m</output>
                                <input type="range" onchange="mainNearby(this.value,'atraction')" class="form-range autofocus" min="0" max="2000" step="100" id="atSlider" value="0">
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-item sidebar-item has-sub ">
                        <a href="" class="sidebar-link"><i class="fa fa-search"></i><span> Search by</span> </a>
                        <ul class="submenu">
                            <li class="submenu-item sidebar-item has-sub">
                                <a onclick="setObjectByName('atraction')" href="" class="sidebar-link"><span>Name</span> </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <select onchange="getObjectByName(this.value,'atraction')" class="form-select" id="basicSelect">
                                        </select>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu-item sidebar-item has-sub">
                                <a onclick="setObjectByCategory()" href="" class="sidebar-link"><span>Category</span> </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <select onchange="getObjectByCategory(this.value)" class="form-select" id="categorySelect">
                                        </select>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu-item sidebar-item has-sub">
                                <a onclick="removeAllStar()" href="" class="sidebar-link"><span>Rating</span> </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <div class="star-containter mb-3">
                                            <i class="fa-solid fa-star fs-6" id="star-1" onclick="getObjectByRate('1','atraction');"></i>
                                            <i class="fa-solid fa-star fs-6" id="star-2" onclick="getObjectByRate('2','atraction');"></i>
                                            <i class="fa-solid fa-star fs-6" id="star-3" onclick="getObjectByRate('3','atraction');"></i>
                                            <i class="fa-solid fa-star fs-6" id="star-4" onclick="getObjectByRate('4','atraction');"></i>
                                            <i class="fa-solid fa-star fs-6" id="star-5" onclick="getObjectByRate('5','atraction');"></i>
                                        </div>
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
                                <output class="text-primary" id="evSliderVal">0 m</output>
                                <input type="range" onchange="mainNearby(this.value,'event')" class="form-range autofocus" min="0" max="2000" step="100" id="evSlider" value="0">
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-item sidebar-item has-sub ">
                        <a href="" class="sidebar-link"><i class="fa fa-search"></i><span> Search by</span> </a>
                        <ul class="submenu">
                            <li class="submenu-item sidebar-item has-sub">
                                <a onclick="setObjectByName('event')" href="" class="sidebar-link"><span>Name</span> </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <select onchange="getObjectByName(this.value,'event')" class="form-select" id="basicSelect2">
                                        </select>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu-item sidebar-item has-sub">
                                <a href="" class="sidebar-link"><span>Date</span> </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <div class="input-group input-daterange">
                                            <div class="input-group-addon">from</div>
                                            <input id="date_1" type="date" onchange="getObjectByDate()" class="date">
                                            <div class="input-group-addon">to</div>
                                            <input id="date_2" type="date" onchange="getObjectByDate()" class="date">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu-item sidebar-item has-sub">
                                <a onclick="removeAllStar()" href="" class="sidebar-link"><span>Rating</span> </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <div class="star-containter mb-3">
                                            <i class="fa-solid fa-star fs-6" id="sstar-1" onclick="getObjectByRate('1','event');"></i>
                                            <i class="fa-solid fa-star fs-6" id="sstar-2" onclick="getObjectByRate('2','event');"></i>
                                            <i class="fa-solid fa-star fs-6" id="sstar-3" onclick="getObjectByRate('3','event');"></i>
                                            <i class="fa-solid fa-star fs-6" id="sstar-4" onclick="getObjectByRate('4','event');"></i>
                                            <i class="fa-solid fa-star fs-6" id="sstar-5" onclick="getObjectByRate('5','event');"></i>
                                        </div>
                                    </li>
                                </ul>
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