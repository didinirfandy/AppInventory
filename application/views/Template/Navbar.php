<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('assetsApp/dist/img/clipart.png'); ?>" alt="stock" height="60" width="60">
</div>
<!-- Preloader -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <!-- <span id="the-day"></span><span id="the-time"></span> -->
            <h3>Sistem Inventori Furniture Toko Plaza Meubel</h3>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fa fa-binoculars fa-fw mr-2"></i> Log login
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-cogs fa-fw mr-2"></i> Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('Login/actionLogout') ?>" class="dropdown-item">
                    <i class="fa fa-sign-out-alt fa-fw mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>