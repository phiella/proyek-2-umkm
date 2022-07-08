<nav class="topnav navbar navbar-expand navbar-dark bg-dark" id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="<?= base_url('admin') ?>"><?= SITE_NAME ?></a>
    <!-- Navbar Search Input-->
    <!-- * * Note: * * Visible only on and above the lg breakpoint-->
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- Navbar Search Dropdown-->
        <!-- * * Note: * * Visible only below the lg breakpoint-->
        <li class="nav-item dropdown no-caret me-3 d-lg-none">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
            <!-- Dropdown - Search-->
            <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                <form class="form-inline me-auto w-100">
                    <div class="input-group input-group-joined input-group-solid">
                        <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                        <div class="input-group-text"><i data-feather="search"></i></div>
                    </div>
                </form>
            </div>
        </li>
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="<?= base_url('assets/images/profiles/profile-1.png') ?>" /></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name"><?= htmlentities($current_user->username) ?></div>
                        <div class="dropdown-user-details-email"><?= htmlentities($current_user->email) ?></div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('admin/profile') ?>">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Account
                </a>
                <button class="dropdown-item" onclick="logoutConfirm()" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Logout
                </button>
            </div>
        </li>
    </ul>
</nav>
<?php $this->load->view("admin/important/logout_modal.php") ?>