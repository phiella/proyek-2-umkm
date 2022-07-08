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
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Dashboard</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Total Product</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <h1 class="text-white"><?php $query = $this->db->query('SELECT * FROM produk'); echo $query->num_rows();?></h1>
                                <a class="small text-white stretched-link" href="<?= base_url('admin/produk') ?>">Lihat Detail <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Total Outcome</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <h1 class="text-white">Rp <?php $query = $this->db->query('select SUM(jumlah*harga) as total from pembelian')->row(); echo $query->total;?></h1>
                                <a class="small text-white stretched-link" href="<?= base_url('admin/pembelian') ?>">Lihat Detail <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Order</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <h1 class="text-white"><?php $query = $this->db->query('SELECT * FROM pesanan'); echo $query->num_rows();?></h1>
                                <a class="small text-white stretched-link" href="<?= base_url('admin/pesanan') ?>">Lihat Detail <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Product Category</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <h1 class="text-white"><?php $query = $this->db->query('SELECT * FROM jenis_produk'); echo $query->num_rows();?></h1>
                                <a class="small text-white stretched-link" href="<?= base_url('admin/jenisproduk') ?>">Lihat Detail <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Registered User</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <h1 class="text-white"><?php $query = $this->db->query('SELECT * FROM users'); echo $query->num_rows();?></h1>
                                <a class="small text-white stretched-link" href="<?= base_url('admin/user') ?>">Lihat Detail <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Suplier Total</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <h1 class="text-white"><?php $query = $this->db->query('SELECT * FROM suplier'); echo $query->num_rows();?></h1>
                                <a class="small text-white stretched-link" href="<?= base_url('admin/suplier') ?>">Lihat Detail <i class="fas fa-angle-right"></i></a>
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