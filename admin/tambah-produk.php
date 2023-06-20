<?php
require ("App/function.php");

if (isset($_POST['addPorduk'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert ('Data Berhasil Ditambahkan')
            document.location.href = 'data-produk.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Data Gagal Ditambahkan')
            document.location.href = 'tambah-produk.php';
        </script>
        ";
    }
}

?>
<?php include "templates/header-user-login.php" ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
                    <h1 class="h3 mb-0 text-gray-800">New Produk</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                <select class="form-select" name="jenis_produk" aria-label="Default select example">
                                    <option>Open this select menu</option>
                                    <option value="pakaian pria">Pakaian Pria</option>
                                    <option value="pakaian wanita">Pakaian Wanita</option>
                                    <option value="sepatu">Sepatu</option>
                                    <option value="baju anak">Baju Anak</option>
                                    <option value="topi">Topi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock Produk</label>
                                <input type="number" name="stock" class="form-control" id="stock" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Produk</label>
                                <input type="number" name="harga" class="form-control" id="harga" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Produk</label>
                                <input class="form-control" name="gambar" type="file" id="gambar">
                            </div>
                            <div class="mb-5">
                                <button name="addPorduk" type="submit" class="btn btn-primary">Add Produk</button>
                            </div>
                        </form>
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