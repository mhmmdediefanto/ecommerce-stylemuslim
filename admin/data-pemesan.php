<?php
require "App/function.php";
include "templates/header-user-login.php";

$query = query("SELECT * FROM pemesan");
?>
<link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
<?php include("templates/header.php"); ?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "templates/sidebar.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include "templates/navbar.php" ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">List Data Pesanan</h1>
                </div>
                <div class="card shadow mb-4  mt-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tanggal Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $produk) : ?>
                                        <tr>
                                            <td><?= $produk['tanggal_pemesan']; ?></td>
                                            <td>Rp. <?= number_format($produk['total_harga'], 2, ",", ".") ?></td>
                                            <td>Rp. <?= number_format($produk['total_bayar'], 2, ",", ".") ?></td>
                                            <td>
                                                <a href="App/hapus-rekap-data.php?id_pemesan=<?= $produk['id_pemesan']; ?>" onclick="return confirm('apakah anda yakin ingin menghapus rekap data pemesan?')">
                                                    <span class="material-symbols-outlined text-danger">
                                                        delete
                                                    </span>
                                                </a>
                                                <a href="details-data-pemesan.php?id_pemesan=<?= $produk['id_pemesan'] ?>">
                                                    <span class="material-symbols-outlined">
                                                        visibility
                                                    </span>
                                                </a>
                                                <a href="print-nota.php?id_pemesan=<?= $produk['id_pemesan'] ?>">
                                                    <span class="material-symbols-outlined">
                                                        print
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "templates/footer.php" ?>
        </div>
    </div>
</div>
<?php include("templates/logout-modal.php") ?>
<!-- Bootstrap core JavaScript-->
<script src="asset/vendor/jquery/jquery.min.js"></script>
<script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/chart-area-demo.js"></script>
<script src="asset/js/demo/chart-pie-demo.js"></script>