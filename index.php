<?php
include("templates/header.php");
require("db/conn.php");
session_start();

if (isset($_SESSION['login'])) {
    header("Location: user/index.php");
}

$result = mysqli_query($conn, "SELECT * FROM produk");
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
?>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="asset/img/pexels-edgars-kisuro-1488463.jpg" class="d-block w-100" style="height: 400px;">
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
            <img src="asset/img/pexels-mart-production-7679863.jpg" class="d-block w-100" style="height: 400px;">
        </div>
        <div class="carousel-item">
            <img src="asset/img/pexels-rdne-stock-project-5698851.jpg" class="d-block w-100" style="height: 400px;">
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

<?php include("templates/navbar.php"); ?>
<div class="container">
    <div class="row mt-3 ">
        <h4 class="text-secondary text-center ">Kategori</h4>
        <div class="col mt-3 ">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Koko Pria</a>
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Hijab</a>
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Peci terbaru</a>
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Sarung</a>
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Fashion Wanita</a>
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Baju Wanita</a>
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Tas Wanita</a>
                <a href="" class="btn btn-primary" style="border-radius: 24px;">Pakaian Pria</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col">
            <h4 class="fw-bold text-secondary text-center">Rekomendasi Produk</h4>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach ($rows as $produk) : ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="admin/asset/img/produk/<?= $produk['gambar']; ?>" class="card-img-top" style="height: 180px;overflow:hidden;">
                    <div class="card-body">
                        <p class="card-text"><?= $produk['nama_produk']; ?></p>
                        <div class="row">
                            <div class="col-md-8 ">
                                <small class="text-danger">Rp. <?= number_format($produk['harga'], 2, ",", ".") ?></small>
                            </div>
                            <div class="col-md-4  justify-conten-center">
                                <p class="text-secondary"><small>Stock: <?= $produk['stok'] ?></small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="fetch_product.php?id_produk=<?= $produk['id_produk']; ?>" class="seeDetail btn btn-success btn-sm d-flex align-items-center justify-content-center" data-id="<?= $produk['id_produk']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</a>
                            </div>
                            <div class="col-md-6 ">
                                <a href="user/index.php" class="btn btn-primary btn-sm d-flex align-items-center justify-content-center"><span class="text-center">Beli</span> <span class="material-symbols-outlined fs-5 inline text-center">
                                        shopping_cart
                                    </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row" id="produkList"></div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Details Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include("templates/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="asset/js/script.js"></script>