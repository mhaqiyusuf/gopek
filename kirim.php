<?php 
require_once ("koneksi.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>GoPek Keranjang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/buat.css">
    <link rel="stylesheet" href="assets/font/font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
        img {
            max-width: 100%;
            height: auto;
        }

        .jarak {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
            <a class="navbar-brand logo" href="#">GoPek</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#makanan">Makanan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php#alamat">Alamat</a>
                    </li>
                </ul>
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle menu" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="assets/img/<?php echo $_SESSION['foto'];?>" class="user-image" style="margin:0px 3px;" alt="User Image"></img>
                    <span style="font-size: 15px;">
                      <?php echo $_SESSION['nama_lengkap']; ?>
                    </span>
                  </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="profil.php?id=<?php echo $_SESSION['id'];?>">
                                <i class="fa fa-user fa-fw"></i> Profil</a>
                            <a class="dropdown-item" href="keranjang.php">
                                <i class="fa fa-shopping-cart fa-fw"></i> Keranjang</a>
                    </li>
                    <a class="btn btn-outline-danger" type="submit" href="logout.php">Log Out</a </ul>
                    </div>
        </nav>
    </header>
    <div class="container">
        <div class="jarak">
        <br>
        <br>
</div>
</div>
            <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/jquery.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script> $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })
            </script>

</body>

</html>