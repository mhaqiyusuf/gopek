<?php 
require_once ("koneksi.php");
?>
<!doctype html>
<html lang="en">

<head>
  <title>GoPek</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/carousel.css">
  <link rel="stylesheet" href="assets/css/buat.css">
  <link rel="stylesheet" href="assets/font/font-awesome-4.7.0/css/font-awesome.min.css">
  <style>
    daftar {
      font-size: 15px;
    }
  </style>

  <script src="assets/font/fontawesome/js/fontawesome-all.js"></script>
</head>

<body id="awal">
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
            <a class="nav-link js-scroll-trigger" href="#awal">Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#makanan">Makanan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#alamat">Alamat</a>
          </li>
        </ul>
        <ul class="nav nav-pills justify-content-end">
          <?php if (isset($_SESSION['id'])) { ?>
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
            </div>
          </li>
          <a class="btn btn-outline-danger" type="submit" href="logout.php">Log Out</a>
          <?php } else { ?>
          <li class="nav-item">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modal">Login</button>
            <a class="btn btn-success" type="submit" href="daftar.php">Daftar</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Modal -->
  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Silahkan Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <form action="proses_login.php" method="POST">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Masukkan Password" required>
                  <br>
                  <input class="btn btn-primary" type="submit" value="Login">
                  <daftar> Belum punya akun ?
                    <a href="daftar.php">Daftar disini</a>
                  </daftar>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<section id="beranda">
  <main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="assets/img/kapal-selam.png" alt="First slide">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1 class="huruf">Pempek Kapal Selam</h1>
              <p class="huruf">Pempek Kapal Selam yaitu telur ayam yang dibungkus dengan adonan Pempek dan digoreng dalam minyak panas yang
                berbentuk seperti kapal selam atau biasa juga disebut Pempek telor besar yang terbuat dari ikan tenggiri/gabus</p>
              <p>
                <?php if (isset($_SESSION['id'])) { ?>
                <a class="btn btn-lg btn-primary" href="#" role="button">Pesan</a>
                <?php } else { ?>
                <button class="btn btn-lg btn-primary" type="button" data-toggle="modal" data-target="#Modal">Pesan</button>
                <?php } ?>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="assets/img/adaan.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1 class="huruf">Pempek Adaan</h1>
              <p class="huruf">Pempek adaan yang terbuat dari bahan-bahan pilihan seperti ikan tenggiri sebagai bahan utamanya. Kualitas rasanya
                dijamin enak, jika anda berminat silahkan langsung pesan.</p>
              <p>
                <?php if (isset($_SESSION['id'])) { ?>
                <a class="btn btn-lg btn-primary" href="#" role="button">Pesan</a>
                <?php } else { ?>
                <button class="btn btn-lg  btn-primary" type="button" data-toggle="modal" data-target="#Modal">Pesan</button>
                <?php } ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </main>
                </section>
  <div class="container">
  
    <section id="makanan">

      <hr class="garis">
      
      <div class="row">
        <div class="col-md-4 mb-4">
        <?php if (isset($_SESSION['id'])) { ?>
          <div class="card mb-4">
          <?php } else { ?>
            <div class="card">
            <?php } ?>
            <h5 class="card-header">
              <i class="fa fa-search fa-fw"></i> Pencarian</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Makanan">
                <span class="input-group-btn">
                  <button class="btn btn-info" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
        </div>
  <div class="col-md-8">
    <?php
          // jumlah data yang akan ditampilkan per halaman

            $dataPerPage = 2;

          // perhitungan offset
          $noPage = (isset($_GET['page'])) ? $_GET['page'] : 1;          
          $offset = ($noPage - 1) * $dataPerPage;
          // query SQL untuk menampilkan data perhalaman sesuai offset

            $query = "SELECT * FROM makanan LIMIT $offset, $dataPerPage";
          $result = mysql_query($query) or die('Error');
						
						while($data = mysql_fetch_assoc($result)){ 
						?>
      <div class="card efek mb-4">

        <img class="card-img-top" style="height:280px;" src="assets/img/<?php echo $data['foto'];?>" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $data['nama_makanan'];?>
          </h4>
          <p class="card-text">
            <?php echo $data['deskripsi'];?>
          </p>
          <?php if (isset($_SESSION['id'])) { ?>
            <a href="pesan.php?id=<?php echo $data['id'];?>" class="btn btn-primary">Pesan</a>
          <?php } else { ?>
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modal">Pesan</button>
          <?php } ?>
          <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
          5.0 stars
        </div>
        <div class="card-footer text-muted">
          Diposting pada 28 Desember 2017 oleh
          <a href="#">Admin</a>
        </div>
      </div>
      <?php } ?>
      <?php
            // mencari jumlah semua data dalam tabel siswa

            $query   = "SELECT COUNT(*) AS jumData FROM makanan";
            $hasil   = mysql_query($query);
            $data    = mysql_fetch_array($hasil);

            $jumData = $data['jumData'];
            // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
            $jumPage = ceil($jumData/$dataPerPage);
            ?>
        <ul class="pagination justify-content-center mb-4">
          <!-- LINK FIRST AND PREV -->
          <?php
            if ($noPage == 1) { 
            ?>
            <li class="page-item disabled">
              <a class="page-link" href="#">First</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">&laquo;</a>
            </li>
            <?php
            } else { 
                $link_prev = ($noPage > 1) ? $noPage - 1 : 1;
            ?>
              <li class="page-item">
                <a class="page-link" href="index.php?page=1">First</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a>
              </li>
              <?php
            }
            ?>

                <!-- LINK NUMBER -->
                <?php
              $jumlah_number = 1; 
              $start_number = ($noPage > $jumlah_number) ? $noPage - $jumlah_number : 1; 
              $end_number = ($noPage < ($jumPage - $jumlah_number)) ? $noPage + $jumlah_number : $jumPage; 
  
              for ($i = $start_number; $i <= $end_number; $i++) {
                  $link_active = ($noPage == $i) ? 'class="page-item active"' : '';
                  if ($i == $noPage) {
                    ?>
                     <li class="page-item active">
              <a class="page-link" href="#"><?php echo $i; ?></a>
            </li>
                    <?php
                  }else {
            ?>
                  <li <?php echo $link_active; ?>>
                    <a class="page-link" href="index.php?page=<?php echo $i; ?>">
                      <?php echo $i; ?>
                    </a>
                  </li>
                  <?php
                  }
            }
            ?>

                    <!-- LINK NEXT AND LAST -->
                    <?php
            if ($noPage == $jumPage) { 
            ?>
                      <li class="page-item disabled">
                        <a class="page-link" href="#">&raquo;</a>
                      </li>
                      <li class="page-item disabled">
                        <a class="page-link" href="#">Last</a>
                      </li>
                      <?php
            } else { 
                $link_next = ($noPage < $jumPage) ? $noPage + 1 : $jumPage;
            ?>
                        <li class="page-item">
                          <a class="page-link" href="index.php?page=<?php echo $link_next; ?>">&raquo;</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="index.php?page=<?php echo $jumPage; ?>">Last</a>
                        </li>
                        <?php
            }
            ?>
        </ul>

  </div>


  </section>
  <hr class="garis">
  <section class="content-section text-center">
      <div class="container">
        <div class="content-section-heading">
          <h2 class="mb-5">Saat Ini Sudah Ada :</h2>
        </div>
        <div class="row">
            <?php $tampil=mysql_query("select * from transaksi order by id desc");
                  $total1=mysql_num_rows($tampil);
                    ?>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon efek rounded-circle mx-auto mb-3">
            <strong><?php echo "$total1"; ?></strong>
            </span>
            <h4>
              <strong>Transaksi</strong>
            </h4>
          </div>
          <?php $tampil=mysql_query("select * from user order by id desc");
                $total=mysql_num_rows($tampil);
           ?>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-0">
            <span class="service-icon efek rounded-circle mx-auto mb-3">
            <strong><?php echo "$total"; ?></strong>
            </span>
            <h4>
              <strong>Pengguna Terdaftar</strong>
            </h4>
          </div>
          <?php $tampil=mysql_query("select * from makanan order by id desc");
                $total2=mysql_num_rows($tampil);
          ?>
          <div class="col-lg-4 col-md-6">
            <span class="service-icon efek rounded-circle mx-auto mb-3">
            <strong><?php echo "$total2"; ?></strong>
            </span>
            <h4>
              <strong>Jenis Makanan</strong>
            </h4>
          </div>
        </div>
      </section>
      <hr class="garis">
  </div>
  </div>
  <a class="scroll-to-top rounded js-scroll-trigger" href="#awal">
      <i class="fa fa-angle-up"></i>
</a>
  <section id="alamat">
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; GoPek 2017</p>
      </div>
    </footer>
  </section>
  
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.easing.min.js"></script>

  <script>
    (function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 54
  });

})(jQuery); 
    </script>
</body>

</html>