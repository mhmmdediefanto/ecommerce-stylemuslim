<?php
require("function.php");


$id_produk = $_GET['id_produk'];

if (hapusProduk($id_produk) > 0) {
    echo "
        <script>
            alert ('Data Produk $id_produk Berhasil Dihapus')
            document.location.href = '../data-produk.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('Data Gagal Dihapus')
            document.location.href = '../data-produk.php';
        </script>";
}
