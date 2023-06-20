<?php 
session_start();
 
$id_produk = $_GET["id_produk"];

unset($_SESSION["pesanan"][$id_produk]);

echo "<script>alert('Produk berhasil dihapus');</script>"; 
echo "<script>location= 'pesanan-anda.php'</script>";
