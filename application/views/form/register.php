<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head.php") ?>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content" class="mb-3">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-3 text-center"><b>OURUMKM - Register</b></h3>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="<?= base_url('auth/register') ?>">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="username">Username</label>
                                            <input class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" id="username" name="username" type="text" placeholder="Enter username" required autofocus />
                                            <div class="invalid-feedback">
                                                <?= form_error('username') ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" type="email" placeholder="Enter email address" required autofocus />
                                            <div class="invalid-feedback">
                                                <?= form_error('email') ?>
                                            </div>
                                        </div>
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="password">Password</label>
                                                    <input class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" type="password" placeholder="Enter password" required autofocus />
                                                    <div class="invalid-feedback">
                                                        <?= form_error('password') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                                    <input class="form-control <?= form_error('confirmPassword') ? 'is-invalid' : '' ?>" id="confirmPassword" name="confirmPassword" type="password" placeholder="Enter Confirm password" required autofocus />
                                                    <div class="invalid-feedback">
                                                        <?= form_error('confirmPassword') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-block form-control">Register Account</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= base_url('auth/login') ?>">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php $this->load->view("admin/important/footer.php") ?>
        </div>
    </div>
    <?php $this->load->view("templates/js.php") ?>
</body>

</html>