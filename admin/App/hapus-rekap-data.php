<?php
require("function.php");


$id_pemesan = $_GET['id_pemesan'];

if (hapusRekapData($id_pemesan) > 0) {
    echo "
        <script>
            alert ('Data Produk $id_pemesan Berhasil Dihapus')
            document.location.href = '../data-pemesan.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('Data Gagal Dihapus')
            document.location.href = '../data-pemesan.php';
        </script>";
}
