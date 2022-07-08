<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
        <a href="<?= base_url() ?>" class="d-flex align-items-center fs-1 fw-bolder col-md-3 mb-2 mb-md-0 text-light text-decoration-none">
            <?= SITE_NAME ?>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <form class="form-inline me-auto d-none d-lg-block" method="get" action="<?= base_url('search') ?>">
                <div class="input-group input-group-joined input-group-solid">
                    <input class="form-control" placeholder="Cari produk apa?" name="search" type="search">
                    <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                </div>
            </form>
        </ul>

        <div class="col-md-3 text-end">
            <?php if (!$current_user) : ?>
                <a href="<?= base_url('auth/login') ?>" class="btn btn-light rounded-0 me-2">Login</a>
                <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-light rounded-0">Sign-up</a>
            <?php endif; ?>
            <?php if ($current_user) : ?>
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4" style="list-style-type: none;">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="<?= base_url('assets/images/profiles/profile-1.png') ?>" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name"><?= htmlentities($current_user->username) ?></div>
                                <div class="dropdown-user-details-email"><?= htmlentities($current_user->email) ?></div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('public/profil') ?>">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <button class="dropdown-item" onclick="logoutConfirm()" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </button>
                    </div>
                </li>
            <?php endif; ?>
        </div>
    </header>
    <nav class="">
        <ul class="navbar-nav flex-row flex-wrap align-items-center justify-content-center">
            <li class="nav-item"><a href="" class="nav-link px-2 ">Baju</a></li>
            <li class="nav-item"><a href="" class="nav-link px-2 ">Hijab</a></li>
            <li class="nav-item"><a href="" class="nav-link px-2 ">Tas</a></li>
            <li class="nav-item"><a href="" class="nav-link px-2 ">Perhiasan</a></li>
        </ul>
    </nav>
</div>
<?php $this->load->view("admin/important/logout_modal.php") ?>