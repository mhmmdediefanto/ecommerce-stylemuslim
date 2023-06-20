<?php
include("../templates/header.php");
require("../db/conn.php");
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
}

if (empty($_SESSION['pesanan']) || !isset($_SESSION['pesanan'])) {
    echo "<script>alert('Pesanan kosong, Silahkan Pesan dahulu');</script>";
    echo "<script>location= 'index.php'</script>";
}
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../asset/img/pexels-edgars-kisuro-1488463.jpg" class="d-block w-100" style="height: 400px;">
            <div class="carousel-caption d-none d-md-block">
                <div class="row top-0">
                    <div class="col">
                        <h1>Weolcome StyleSHOP</h1>
                        <p>Dapatkan produk berkualitas dan terbarik!! Hanya ada di web <span class="fw-bold">Style SHOOP</span></p>
                        <hr class="fw-bold">
                        <p>hanya disini anda bisa mendapatkan produk-produk terbarik</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../asset/img/pexels-mart-production-7679863.jpg" class="d-block w-100" style="height: 400px;">
        </div>
        <div class="carousel-item">
            <img src="../asset/img/pexels-rdne-stock-project-5698851.jpg" class="d-block w-100" style="height: 400px;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<?php include("../templates/navbar.php"); ?>
<div class="container">
    <div class="row mt-3 ">
        <h4 class="text-secondary text-center ">Pesanan Anda</h4>
        <div class="col mt-3 ">
            <table class="table table-bordered" id="example">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subharga</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalBelanja = 0; ?>
                    <?php foreach ($_SESSION['pesanan'] as $id_produk => $jumlah) : ?>
                        <?php

                        $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                        $rows = $result->fetch_assoc();
                        $subHarga = $rows['harga'] * $jumlah;
                        ?>
                        <tr>
                            <td><?= $rows['nama_produk'] ?></td>
                            <td>Rp. <?= number_format($rows['harga'], 2, ",", ".") ?></td>
                            <td><?= $jumlah ?></td>
                            <td>Rp. <?= number_format($subHarga, 2, ",", ".")  ?></td>
                            <td>
                                <a href="hapus-pesanan.php?id_produk=<?= $rows['id_produk'] ?>" class="btn btn-danger btn-sm ">hapus</a>
                            </td>
                        </tr>
                        <?php $totalBelanja += $subHarga ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th colspan="2">Rp. <?= number_format($totalBelanja, 2, ",", ".") ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Konfirmasi dan Bayar
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<form action="" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">StyleSHOP</h1><br>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="hargaBayar" class="form-label">Bayar</label>
                        <input type="number" name="totalBayar" class="form-control" id="hargaBayar">
                    </div>
                </div>
                <div class="modal-footer">
                    <small class="text-danger me-auto">Silahkan Bayar Dahulu</small>
                    <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
if (isset($_POST['bayar'])) {

    $user  = $_SESSION['login'];
    $totalBayar = $_POST['totalBayar'];
    $datePesanan = date("Y-m-d");

    if ($totalBayar > $totalBelanja) {
        // simpan data
            $query = mysqli_query($conn, "INSERT INTO pemesan (tanggal_pemesan, total_harga, total_bayar)
                            VALUES
                        ('$datePesanan', '$totalBelanja' ,'$totalBayar')");
        // ambil id yang baru
        $id_pemesan = $conn->insert_id;
        // simpan data ke detailpesanan
        foreach ($_SESSION['pesanan'] as $id_produk => $jumlah) {
            $queryDetail = mysqli_query($conn, "INSERT INTO detail_pemesan (id_pemesan, username, id_produk, jumlah_produk)
                            VALUES ('$id_pemesan', '$user','$id_produk', '$jumlah')
                            ");
        }
        // Mengosongkan pesanan
        unset($_SESSION["pesanan"]);

        // Dialihkan ke halaman nota
        echo "<script>alert('Pesanan Sukses!');</script>";
        echo "<script>location= 'index.php'</script>";
    }
    echo "<script>alert('Maaf Pembayaran Anda Kurang!');</script>";
    echo "<script>location= 'pesanan-anda.php'</script>";
}
?>
<script src="../asset/js/script.js"></script>
<?php include("../templates/footer.php"); ?>