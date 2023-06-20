<?php
include "templates/header-user-login.php";
require("App/function.php");

$query = query("SELECT * FROM produk ORDER BY id_produk DESC");

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
                    <h1 class="h3 mb-0 text-gray-800">List Menu</h1>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <a href="tambah-produk.php" class="btn btn-primary shadow-sm">Tambah Menu</a>
                        <?php
                        $sql = ("SELECT * FROM produk");
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        ?>
                        <small>Total produk : <?= $count ?> </small>
                    </div>
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
                                        <th>Nama Produk</th>
                                        <th>Jenis produk</th>
                                        <th>Harga</th>
                                        <th>Stock</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $produk) : ?>
                                        <tr>
                                            <td><?= $produk['nama_produk']; ?></td>
                                            <td><?= $produk['jenis_produk']; ?></td>
                                            <td>Rp. <?= number_format($produk['harga'], 2, ",", "."); ?></td>
                                            <td><?= $produk['stok']; ?></td>
                                            <td><img src="asset/img/produk/<?= $produk['gambar']; ?>" style="width: 50px;" alt=""></td>
                                            <td><a href="update-produk.php?id_produk=<?= $produk['id_produk']; ?>"><span class="material-symbols-outlined ">
                                                        edit_square
                                                    </span></a>
                                                <a href="App/hapus-produk.php?id_produk=<?= $produk['id_produk']; ?>">
                                                    <span class="material-symbols-outlined text-danger">
                                                        delete
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
        </div>
        <?php include "templates/footer.php" ?>
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