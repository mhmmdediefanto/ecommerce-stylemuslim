<?php include("../templates/header.php");
session_start();
require("../db/conn.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        // cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            if ($row['role'] == 'admin') {
                $_SESSION['login'] = $row['username'];
                header("Location: ../admin/index.php");
                exit;
            }
            if ($row['role'] == 'user') {
                $_SESSION['login'] = $row['username'];
                header("Location: ../user/index.php");
                exit;
            }
        }
    }
}

?>
<div class="container mb-5 ">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 shadow p-5 rounded">
            <form action="" method="post">
                <h2 class="text-center mb-2 fw-bold">LOGIN</h2>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Username..">
                </div>
                <div class="mb-3">
                    <label for="passowrd" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="passowrd" placeholder="Password..">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="login">Login</button>
                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <small>Belum Punya Akun ?</small>
                </div>
                <div class="col-md-6">
                    <a href="register.php">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../templates/footer.php"); ?>