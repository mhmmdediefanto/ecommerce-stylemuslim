<?php
// fetch_product.php

// Kode untuk menghubungkan ke database
include("db/conn.php");

// Mendapatkan ID produk dari permintaan AJAX
$id_produk = $_GET['id'];

// Query untuk mengambil data produk berdasarkan ID
$query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($conn, $query);

// Mengecek apakah data produk ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Mengirimkan data produk dalam format JSON
    echo json_encode([
        'Response' => 'True',
        'product' => $row
    ]);
} else {
    // Jika produk tidak ditemukan
    echo json_encode([
        'Response' => 'False',
        'message' => 'Produk tidak ditemukan'
    ]);
}
?>
