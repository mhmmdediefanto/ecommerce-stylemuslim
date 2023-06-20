<?php
session_start();
require("../../db/conn.php");
$user  = $_SESSION['login'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

foreach ($rows as $role) {
    $role = $role['role'];
}

if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
}
if (isset($_SESSION['login'])) {
    if ($role != 'admin') {
        header("Location: ../user/index.php");
    }
}
?>

<link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">
<?php include("../templates/header.php"); ?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "../templates/sidebar.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include "../templates/navbar.php" ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include "../templates/footer.php" ?>

    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="../asset/vendor/jquery/jquery.min.js"></script>
<script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../asset/js/demo/chart-area-demo.js"></script>
<script src="../asset/js/demo/chart-pie-demo.js"></script>