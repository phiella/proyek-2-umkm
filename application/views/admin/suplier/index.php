<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head.php") ?>
</head>

<body class="nav-fixed">

    <!-- Navbar -->
    <?php $this->load->view("admin/important/navbar.php") ?>

    <div id="layoutSidenav">

        <!-- Sidebar -->
        <?php $this->load->view("admin/important/sidebar.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-3">
                    <div class="container-fluid px-4">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="truck"></i></div>
                                        <?= str_replace("_", " ", ucfirst($this->uri->segment(2))) . " List" ?>
                                    </h1>
                                </div>
                                <div class="col-12 col-xl-auto mb-3">
                                    <button class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
                                        <i class="me-1" data-feather="plus"></i>
                                        <?= "Add New " . str_replace("_", " ", ucfirst($this->uri->segment(2))) ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-fluid px-4">
                    <div class="page-header-content">
                        <?php $this->load->view("admin/important/breadcrumb.php") ?>
                    </div>
                    <?php if ($this->session->flashdata('alert-error')) : ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <?= $this->session->flashdata('alert-error') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Main page content-->
                <div class="container-fluid px-4 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Kota</th>
                                        <th>Kontak</th>
                                        <th>Alamat</th>
                                        <th>Telpon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Kota</th>
                                        <th>Kontak</th>
                                        <th>Alamat</th>
                                        <th>Telpon</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    foreach ($suplier as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->kota ?></td>
                                            <td><?= $row->kontak ?></td>
                                            <td><?= $row->alamat ?></td>
                                            <td><?= $row->telpon ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/sup/edit/' . $this->secure->encrypt_url($row->id)) ?>" class="btn btn-datatable btn-icon btn-warning me-2"><i data-feather="edit"></i></a>
                                                <a onclick="deleteConfirm('<?= site_url('admin/sup/delete/' . $this->secure->encrypt_url($row->id)) ?>')" href="#!" id="btn-delete" class="btn btn-datatable btn-icon btn-danger"><i data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $id++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Modal -->
            <?php $this->load->view("admin/suplier/modal-add.php") ?>


        </div>
    </div>
    <?php $this->load->view("templates/js.php") ?>
</body>

</html>