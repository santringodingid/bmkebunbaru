<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
            <img src="<?= base_url() ?>assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">BM Kebun Baru</span>
        </a>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Menu</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php
                        $uri = $this->uri->segment(1);
                        $menus = getMenu();
                        if ($menus) {
                            foreach ($menus as $menu) {
                        ?>
                                <li class="nav-item mb-1">
                                    <a href="<?= base_url($menu->url) ?>" class="dropdown-item">
                                        <?= $menu->name ?>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>profile" class="nav-link">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>auth/logout">
                        Logout <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <span class="navbar-toggler-icon d-md-none d-xl-none d-inline-block" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"></span>
        </ul>
    </div>
</nav>