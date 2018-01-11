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
                    <a class="btn btn-outline-danger" type="submit" href="logout.php">Log Out</a> </ul>
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
                    <li class="breadcrumb-item active" aria-current="page">Pesan</li>
                </ol>
            </nav>

            <br>
            <?php
            $prodsql = "SELECT * FROM makanan WHERE id = " . $_GET['id'] . ";";
            $prodres = mysql_query($prodsql);
            $numrows = mysql_num_rows($prodres);
            $prodrow = mysql_fetch_assoc($prodres);
            if($numrows == 0){
                header("Location: index.php");
            }else{
                if(isset($_POST['submit']))
            {

            if(isset($_SESSION['SESS_ORDERNUM'])){
                $itemsql = "INSERT INTO transaksi_detail(id_transaksi,id_makanan, jumlah) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", ". $_GET['id'] . ", ". $_POST['amountBox'] . ")";
                mysql_query($itemsql) or die(mysql_error());
            }else{
                if(isset($_SESSION['SESS_LOGGEDIN'])) {
                    $sql = "INSERT INTO transaksi(id_user, tanggal) VALUES(". $_SESSION['id'] . ", NOW())";
                    mysql_query($sql) or die(mysql_error());
                    $_SESSION['SESS_ORDERNUM'] = mysql_insert_id();
                    $itemsql = "INSERT INTO transaksi_detail(id_transaksi,id_makanan, jumlah) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", ". $_GET['id'] . ", ". $_POST['amountBox'] . ")";
                    mysql_query($itemsql) or die(mysql_error());
                }
            }

            $totalprice = $prodrow['harga'] * $_POST['amountBox'] ;
            $updsql = "UPDATE transaksi SET jumlah = jumlah + ". $totalprice . " WHERE id = ". $_SESSION['SESS_ORDERNUM'] . ";";
            mysql_query($updsql) or die(mysql_error());
            header("Location: keranjang.php");
            }
            else
            {
            ?>
            <form action="pesan.php?id=<?php echo $_GET['id'];?>" method="post">
            <table class="table table-bordered">
            <thead>
              <tr align="center">
                <th scope="col">Gambar</th>
                <th scope="col">Nama Makanan</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Jumlah Pesan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <td><img class="foto-profil" src="assets/img/<?php echo $prodrow['foto']; ?>" width="100px" height="100px">
                </td>
                <td><?php echo $prodrow['nama_makanan']; ?></td>
                <td>Rp. <?php echo $prodrow['harga']; ?></td>
                <td>
                <select class="form-control" style="margin:0 60px 0 0;" name="amountBox">
                <?php
                    for($i=1;$i<=100;$i++)
                    {
                ?>
                    <option><?php echo $i;?></option>
                <?php
                    }
                ?>
                </select>
                </td>
                <td>
                <input type="submit" name="submit" value="Pesan" class="btn btn-success btn-sm" data-toggle="tooltip" title="Pesan">
                </td>
              </tr>
            </tbody>
          </table>
            </form>
            <?php
                }
            }
            ?>
    
            <br>

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