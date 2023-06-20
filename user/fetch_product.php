<?php
include("../db/conn.php");

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Query ke database untuk mendapatkan data produk berdasarkan id
    $query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $produk = mysqli_fetch_assoc($result);

        // Mengonversi data produk menjadi format JSON dan mengirimkannya sebagai respons
        header('Content-Type: application/json');
        echo json_encode($produk);
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID Produk tidak ditemukan.";
}

mysqli_close($conn);
