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

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="cekout.php">Checkout</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                </ol>
            </nav>

            <br>
            <?php
            if(isset($_POST['paypal']))
            {
            $upsql = "UPDATE transaksi SET status = 2, bayar = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
            $upres = mysql_query($upsql);
            $itemssql = "SELECT jumlah FROM transaksi WHERE id = " . $_SESSION['SESS_ORDERNUM'];
            $itemsres = mysql_query($itemssql);
            $row = mysql_fetch_assoc($itemsres);

            if($_SESSION['SESS_LOGGEDIN'])
            {
            unset($_SESSION['SESS_ORDERNUM']);
            }
            header("Location: https://paypal.com");
            }
            else if(isset($_POST['tunai']))
            {
            $upsql = "UPDATE transaksi SET status = 2,bayar = 2 WHERE id = ". $_SESSION['SESS_ORDERNUM'];
            $upres = mysql_query($upsql);

            if($_SESSION['SESS_LOGGEDIN'])
            {
            unset($_SESSION['SESS_ORDERNUM']);
            }
            ?>
            <h1>Membayar dengan Uang Tunai</h1>
            Selamat pemesanan anda sedang diantar kurang dari 24 jam akan sampai ke alamat anda.
            <?php
            }else{
            ?>
            <h3><strong>Pilih Metode Pembayaran</strong></h3>
            <br>
            <form action="pembayaran.php" metode="post">
            <table class="table">
            <tr>
            <td>
            <strong>Paypal</strong>
            </td>
            <td>
            PayPal merupakan sistem pembayaran secara elektronik yang menggantikan transaksi konvensional berupa cek dan transfer uang.
            </td>
            <td>
            <button name="paypal" class="btn btn-primary" type="submit">Bayar dengan Paypal</button>
            </td>
            </tr>
            <tr>
            <td>
            <strong>Tunai</strong>
            </td>
            <td>
            Bayar langsung pada hari itu juga saat pesanan sudah sampai ditempat anda.
            </td>
            <td>
            <button name="tunai" class="btn btn-success" type="submit">Bayar tunai</button>
            </td>
            </tr>
            </table>
            </form>
            <?php
            }
            ?>
            </div>
    </div>
    <br>
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

</body>

</html>