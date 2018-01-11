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
                    <a class="btn btn-outline-danger" type="submit" href="logout.php">Log Out</a>
                    </ul>
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
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>

            <br>
            <?php
            if(isset($_SESSION['SESS_ORDERNUM']))
            {
            if(isset($_SESSION['SESS_LOGGEDIN']))
            {
            $custsql = "SELECT id, status from transaksi WHERE id_user = ". $_SESSION['id']. " AND status < 2;";
            $custres = mysql_query($custsql)or die(mysql_error());;
            $custrow = mysql_fetch_assoc($custres);

            $itemssql = "SELECT makanan.*, transaksi_detail.*, transaksi_detail.id AS itemid FROM makanan, transaksi_detail WHERE transaksi_detail.id_makanan = makanan.id AND id_transaksi = " . $custrow['id'];
            $itemsres = mysql_query($itemssql)or die(mysql_error());;
            $itemnumrows = mysql_num_rows($itemsres);
            }
            }
            else
            {
            $itemnumrows = 0;
            }
            if($itemnumrows == 0)
            {
            echo "You have not added anything to your shopping cart yet.";
            }

            else
            {
            ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Makanan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            while($itemsrow = mysql_fetch_assoc($itemsres))
            {
            $totalharga = $itemsrow['harga'] * $itemsrow['jumlah'];
            ?>
                            <tr align="center">
                                <td>
                                    <img src="assets/img/<?php echo $itemsrow['foto'];?>" width="100px" height="70px" class="foto-profil">
                                </td>
                                <td>
                                    <?php echo $itemsrow['nama_makanan'];?>
                                </td>
                                <td>
                                    <?php echo $itemsrow['jumlah'];?>
                                </td>
                                <td>Rp.
                                    <?php echo $itemsrow['harga'];?>
                                </td>
                                <td>Rp.
                                    <?php echo $totalharga;?>
                                </td>
                                <td align="center">
                                    <a href="proses_hapus.php?id=<?php echo $itemsrow['itemid'];?>" class="btn btn-danger btn-sm mb-1" data-toggle="tooltip"
                                        title="Hapus">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                @$total = $total + $totalharga;
                $totalsql = "UPDATE transaksi SET jumlah = ". $total . " WHERE id = ". $_SESSION['SESS_ORDERNUM'];
                $totalres = mysql_query($totalsql)or die(mysql_error());;
            }
            ?>
                                <tr>
                                    <th colspan="4" style="text-align:right;background-color:silver;" scope="row">Total:</th>
                                    <td align="center">
                                        <strong>Rp.
                                            <?php echo $total;?>
                                        </strong>
                                    </td>
                                </tr>
                    </tbody>
                </table>
                
                    <a href="index.php#makanan" type="button" class="btn btn-success mb-2">
                        <i class="fa fa-arrow-left fa-fw"></i> Belanja</a>
                    <a href="cekout.php" type="button" class="btn btn-info float-right">Checkout
                        <i class="fa fa-arrow-right fa-fw"></i>
                    </a>
                
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