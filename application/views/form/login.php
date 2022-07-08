<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head.php") ?>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-3 text-center"><b>OURUMKM Login</b></h3>
                                </div>
                                <?php if ($this->session->flashdata('alert-error')) : ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?= $this->session->flashdata('alert-error') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <form class="user" action="" method="POST">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="username">Username</label>
                                            <input class="form-control" <?= set_value('username'); ?> id="username" name="username" type="text" placeholder="Enter username" required autofocus />
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="password">Password</label>
                                            <input class="form-control" <?= set_value('password'); ?> id="password" name="password" type="password" placeholder="Enter password" required autofocus />
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-block form-control">Login</button>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <a class="small" href="<?= base_url('auth/forgot_password') ?>">Forgot Password?</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= base_url('auth/register') ?>">Need an account? Sign up!</a></div>
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