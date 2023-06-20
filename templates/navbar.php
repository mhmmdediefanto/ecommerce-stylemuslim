<nav class="navbar navbar-expand-lg bg-primary shadow-lg" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Style SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"> 
                    <?php if (isset($_SESSION['login'])) : ?>
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <?php else : ?>
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <?php endif; ?>
                </li>
                <?php if (isset($_SESSION['login'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pesanan-anda.php">Pesanan Anda</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <?php if (isset($_SESSION['login'])) : ?>
                        <a class="nav-link active" href="../login/logout.php">Logout</a>
                    <?php else : ?>
                        <a class=" btn btn-outline-light" href="login/login.php">Login</a>
                    <?php endif; ?>

                </li>
            </ul>
        </div>
    </div>
</nav>