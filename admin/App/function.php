<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "db_muslim";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama_porduk = htmlspecialchars($data['nama_produk']);
    $jenis_produk = htmlspecialchars($data['jenis_produk']);
    $stock = htmlspecialchars($data['stock']);
    $harga = htmlspecialchars($data['harga']);

    $gambar = uploadGambar();
    if (!$gambar) {
        return false;
    }

    // query
    $query = "INSERT INTO produk 
                    VALUES
            ('', '$nama_porduk','$jenis_produk','$stock', '$harga', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadGambar()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar yang diuplod
    if ($error === 4) {
        echo "
            <script>
                alert('pilih gambar terlebih dahulu!')
            </script>
            ";
        return false;
    }
    // cek apakah gambar yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('yang anda upload bukan gambar!')
            </script>
            ";
        return false;
    }

    //Lolos pengecekan, ganbar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // jalankan upload ke database
    move_uploaded_file($tmpName, 'asset/img/produk/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapusProduk($id_produk)
{
    global $conn;
    // ambil gambarnya dulu
    $sql = "SELECT gambar FROM produk WHERE id_produk = '$id_produk' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar'];
        // cek pacth gambar ada dimana
        $pacthGambar = '../asset/img/produk/';
        // gabungkan antara id gambar dengan patch gambar
        $imageFullPacth = $pacthGambar . $gambar;

        // cek jika file gambarnya ada
        if (file_exists($imageFullPacth)) {
            // hapus gambarnya
            unlink($imageFullPacth);
        } else {
            echo "File gambar tidak ditemuka";
        }
        mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id_produk' ");

        return mysqli_affected_rows($conn);
    }
}

function updateProduk($data)
{
    global $conn;
    $id_produk = $data['id_produk'];
    $nama_porduk = htmlspecialchars($data['nama_produk']);
    $jenis_produk = htmlspecialchars($data['jenis_produk']);
    $stok = htmlspecialchars($data['stock']);
    $harga = htmlspecialchars($data['harga']);
    $gambarLama = $data['gambarLama'];

    // cek apakah user memperbaru gambarnya apa tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadGambar();
    }

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambarPatchLama = $gambarLama;
        // cek pacth gambar ada dimana
        $pacthGambar = 'asset/img/produk/';
        // gabungkan antara id gambar dengan patch gambar
        $imageFullPacth = $pacthGambar . $gambarPatchLama;

        // cek jika file gambarnya ada
        if (file_exists($imageFullPacth)) {
            // hapus gambarnya
            unlink($imageFullPacth);
        } else {
            echo "File gambar tidak ditemukan";
        }
    }
    mysqli_query($conn, "UPDATE produk SET
                                    nama_produk = '$nama_porduk',
                                    jenis_produk = '$jenis_produk',
                                    stok = '$stok',
                                    harga = '$harga',
                                    gambar = '$gambar'
                                WHERE id_produk = '$id_produk' ");
    // masukkan query update ke database

    return mysqli_affected_rows($conn);
}

function hapusRekapData($id_pemesan)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM detail_pemesan WHERE id_pemesan = '$id_pemesan' ");
    mysqli_query($conn, "DELETE FROM pemesan WHERE id_pemesan = '$id_pemesan' ");

    return mysqli_affected_rows($conn);
}
