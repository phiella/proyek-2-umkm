<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head.php") ?>
</head>

<body class="nav-fixed">
    <?php $this->load->view("admin/important/navbar.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("admin/important/sidebar.php") ?>

        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-xl px-4">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="user"></i></div>
                                        <?= str_replace("_", " ", ucfirst($this->uri->segment(2))) ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('assets/images/profiles/profile-1.png'); ?>" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                            <input class="form-control" id="inputUsername" type="text" value="<?= htmlentities($current_user->username) ?>" readonly />
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" value="<?= htmlentities($current_user->email) ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputRole">Role</label>
                                                <input class="form-control" id="inputRole" type="text" value="<?= htmlentities($current_user->role) ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputCreatedAt">Created At</label>
                                                <input class="form-control" id="inputCreatedAt" type="text" value="<?= htmlentities($current_user->created_at) ?>" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastLogin">Last Login</label>
                                                <input class="form-control" id="inputLastLogin" type="text" name="LastLogin" value="<?= htmlentities($current_user->last_login) ?>" readonly />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-12">
                            <?php if ($this->session->flashdata('alert-error')) : ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <?= $this->session->flashdata('alert-error') ?>
                                </div>
                            <?php endif; ?>
                            <div class="card mb-4" id="change-pw">
                                <div class="card-header">Change Password</div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="<?= base_url('admin/profile/change_password') ?>">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="oldpassword">Old Password</label>
                                            <input class="form-control <?= form_error('oldpassword') ? 'is-invalid' : '' ?>" id="oldpassword" name="oldpassword" type="password" placeholder="Enter Old Password" required />
                                            <div class="invalid-feedback">
                                                <?= form_error('oldpassword') ?>
                                            </div>
                                        </div>
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="newpassword">New Password</label>
                                                    <input class="form-control <?= form_error('newpassword') ? 'is-invalid' : '' ?>" id="newpassword" name="newpassword" type="password" placeholder="Enter New Password" required />
                                                    <div class="invalid-feedback">
                                                        <?= form_error('newpassword') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="confirmPassword">Confirm New Password</label>
                                                    <input class="form-control <?= form_error('confirmPassword') ? 'is-invalid' : '' ?>" id="confirmPassword" name="confirmPassword" type="password" placeholder="Enter Confirm New Password" required />
                                                    <div class="invalid-feedback">
                                                        <?= form_error('confirmPassword') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <?php $this->load->view("templates/js.php") ?>
</body>

</html>