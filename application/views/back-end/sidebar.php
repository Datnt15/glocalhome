<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu  page-header-fixed <?= isset($page) && $page == 'all-homestay' ? 'page-sidebar-menu-closed' : '' ?>" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="nav-item <?= $method == 'dashboard' ? 'active' : '' ?>">
                    <a href="admin" class="nav-link ">
                        <i class="fa fa-home"></i>
                        <span class="title"><?= lang('guest-menu-dashboard') ?></span>
                    </a>
                </li>
                <li class="nav-item  <?= $method == 'profile' ? 'active' : '' ?>">
                    <a href="admin/profile" class="nav-link ">
                        <i class="fa fa-user-o"></i>
                        <span class="title"><?= lang('guest-menu-profile') ?></span>
                    </a>
                </li>
                <li class="nav-item  <?= $method == 'book' ? 'active' : '' ?>">
                    <a href="admin/book" class="nav-link ">
                        <i class="fa fa-calendar-check-o"></i>
                        <span class="title"><?= lang('guest-menu-booking') ?></span>
                    </a>
                </li>
                <li class="nav-item  <?= $method == 'room' ? 'active' : '' ?>">
                    <a href="admin/room" class="nav-link ">
                        <i class="fa fa-cog"></i>
                        <span class="title"><?= lang('guest-menu-room') ?></span>
                    </a>
                </li>
                <li class="nav-item  <?= $method == 'user' ? 'active' : '' ?>">
                    <a href="admin/user" class="nav-link ">
                        <i class="fa fa-users"></i>
                        <span class="title"><?= lang('admin-menu-user') ?></span>
                    </a>
                </li>
                <?php 
                $lang = $language == 'vietnam' ? 'en/' : 'vi/';
                $actual_link = str_replace('en/', '', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                $actual_link = str_replace('vi/', '', $actual_link);
                $actual_link = str_replace(base_url(),base_url($lang),$actual_link);
                ?>
                <li class="nav-item  ">
                    <a href="<?= $actual_link ?>" class="nav-link ">
                        <i class="fa fa-language"></i>
                        <span class="title"><?= $language == 'vietnam' ? 'English' : 'Tiếng Việt' ?></span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">