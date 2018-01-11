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

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>

            <br>
            <h3><strong> Masukkan alamat pengiriman</strong></h3>
            <br>
            <?php
            $statussql = "SELECT status FROM transaksi WHERE id = " .$_SESSION['SESS_ORDERNUM'];
            $statusres = mysql_query($statussql);
            $statusrow = mysql_fetch_assoc($statusres);
            $status = $statusrow['status'];

            if($status == 1) {
                header("Location: pembayaran.php");
            }
            if($status >= 2) {
                header("Location: index.php");
            }
            
            if(isset($_POST['submit'])){
                if(isset($_SESSION['SESS_LOGGEDIN'])){   
                    $addsql = "INSERT INTO pengiriman(nama, alamat, no_hp, email)VALUES('" . strip_tags(addslashes( $_POST['nama_lengkap'])) . "', '" . strip_tags(addslashes( $_POST['alamat'])) . "', '" . strip_tags(addslashes( $_POST['no_hp'])) . "', '" . strip_tags(addslashes( $_POST['email'])) . "')";
                    mysql_query($addsql);
                    $setaddsql = "UPDATE transaksi SET status = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
                    mysql_query($setaddsql);
                    header("Location: pembayaran.php");
                }
            }else{
            ?>
            <form action="<?php $_SERVER['SCRIPT_NAME'] ;?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap Anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="alamat" placeholder="Alamat Anda"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Telepon</label>
                    <div class="col-sm-4">
                        <input type="text" name="no_hp" class="form-control" placeholder="No Telepon Anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-4">
                        <input type="text" name="email" class="form-control" placeholder="E-mail Anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-success">Kirim</button>
                        <a class="btn btn-danger" href="keranjang.php"> Batal</a>
                    </div>
                </div>
            </form>
            <?php
            }
            ?>

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