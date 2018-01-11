<?php
include "koneksi.php";
if(isset($_SESSION['id'])){
    echo "<script>alert(\"Anda sedang login!\");</script>";
    echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
}else{
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
    <link href="assets/css/carousel.css" rel="stylesheet">
    <style>
      .jarak {
        margin-top: 30px;
      }

      daftar {
        font-size: 15px;
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
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modal">Login</button>
            </li>
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
    <div class="container">
      <div class="jarak">
        <h1> Form Daftar </h1>
        <hr>
        <br>
        <form action="proses_daftar.php" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-5">
              <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap Anda" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-5">
              <textarea class="form-control" name="alamat" placeholder="Alamat Anda" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="inputState">Jenis Kelamin</label>
            <div class="col-sm-5">
              <select id="inputState" class="form-control" name="jenis_kelamin" required>
                <option value="" selected>...</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-5">
              <input type="file" name="foto" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
              <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-5">
              <input type="text" name="username" class="form-control" placeholder="Username Anda" id="username" required>
            </div>
            <span style="margin-top:5px;" id="pesan"></span>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-5">
              <input type="password" name="password" class="form-control" placeholder="Password Anda" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
              <button type="submit" name="simpan" class="btn btn-success">Daftar</button>
              <a class="btn btn-danger" href="index.php"> Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; GoPek 2017</p>
      </div>
    </footer>
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script>
      $(document).ready(function () {
        $('#username').blur(function () {
          $('#pesan').html('<img style="margin-left:10px; width:10px" src="loading.gif">');
          var username = $(this).val();
          $.ajax({
            type: 'POST',
            url: 'proses_daftar.php',
            data: 'username=' + username,
            success: function (data) {
              $('#pesan').html(data);
            }
          })
        });
      });
    </script>
  </body>

  </html>
  <?php
}
?>