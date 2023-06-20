<?php
include("../templates/header.php");
require("../db/conn.php");

if (isset($_POST['register'])) {
    global $conn;
    $username = stripslashes(strtolower(htmlspecialchars($_POST['username'])));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_tlp = htmlspecialchars($_POST['no_hp']);
    $role = htmlspecialchars($_POST['rule']);

    // cek apakah username sudah ada
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Maaf username Sudah Ada');
                document.location='register.php';
            </script>";

        return false;
    }

    // password hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    $insert = "INSERT INTO users (username, password, nama_lengkap, jenis_kelamin, tanggal_lahir, alamat, no_tlp, role)
    VALUES ('$username', '$password', '$nama_lengkap', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$no_tlp', '$role')";

    if (mysqli_query($conn, $insert)) {
        echo "<script>
                alert('Anda berhasil Registrasi')
                document.location='login.php';
            </script>";
    }
}

?>
<div class="container mb-5">
    <div class="row justify-content-center mt-5">
        <h2 class="text-center mb-2 fw-bold">HALAMAN REGISTER</h2>
        <div class="col-md-10 shadow p-5 rounded">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Username..">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="passowrd" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="passowrd" placeholder="Password..">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="passowrd" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="passowrd" placeholder="Nama Lengkap..">
                </div>
                <div class="mb-3 ">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                        <option>Open this select menu</option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="" placeholder="Alamat..">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No HP</label>
                            <input type="number" name="no_hp" class="form-control" placeholder="No Hp..">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Rule Position</label>
                            <select class="form-select" name="rule" aria-label="Default select example">
                                <option>Open this select menu</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="register">Register</button>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <small class="">Sudah Punya Akun ?</small>
                        <a href="login.php">Login Sekarang</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../templates/footer.php"); ?>