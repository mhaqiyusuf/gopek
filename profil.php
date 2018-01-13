<?php
include "koneksi.php";
if(!isset($_SESSION['id'])){
    echo "<script>alert(\"Anda belum login!\");</script>";
    echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
}else if($_GET['id']==$_SESSION['id']){
?>
  <!doctype html>
  <html lang="en">

  <head>
    <title>GoPek Profil Member</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/buat.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.standalone.min.css">
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
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
          </ol>
        </nav>

        <br>
        <?php
        $id = $_GET['id'];
				
				$query = "SELECT * FROM user WHERE id='".$id."'";
				$sql = mysql_query($query);  
				$data = mysql_fetch_array($sql); ?>
        <div class="container-fluid">
          <div class="row profil">
            <div class="col-md-3">
              <a target="_blank" href="assets/img/<?php echo $data['foto']; ?>">
                <img src="assets/img/<?php echo $data['foto']; ?>" class="foto-profil mb-3"></img>
              </a>
            </div>
            <div class="col-md-9">
              <h3 class="mb-2">
                <strong>
                  <?php echo $data['nama_lengkap']; ?>
                </strong>
              </h3>
              
				
              <p>
                <i class="fa fa-envelope fa-fw"></i>
                <?php echo $data['email']; ?> </p>
              <p class="tulisan">
                <i class="fa fa-phone fa-fw"></i>
                <?php if(!$data['no_hp']){ ?>
                -
                <?php } else { ?>
                  <?php echo $data['no_hp']; ?>
                <?php } ?>
              <p class="tulisan">
                <i class="fa fa-map-marker fa-fw"></i>
                <?php echo $data['alamat']; ?>
              </p>
            </div>

          </div>
        </div>
        <br>
        <!-- Judul Tab -->
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
              aria-selected="true">
              <i class="fa fa-user fa-fw"></i> Profil</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
              aria-selected="false">
              <i class="fa fa-pencil-square-o fa-fw"></i> Edit</a>
          </div>
        </nav>
        <!-- Isi Tab -->
        <div class="tab-content" id="nav-tabContent">
          <!-- Tab Profil -->
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-striped">
            <tr>
                <th>Username</th>
                <td>
                  <?php echo $data['username']; ?>
                </td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>
                  <?php echo $data['jenis_kelamin']; ?>
                </td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td>
                <?php if(!$data['tempat_lahir']||!$data['tgl_lahir']){ ?>
                  -
                <?php } else { ?>
                  <?php echo $data['tempat_lahir'].', '.$data['tgl_lahir']; ?>
                <?php } ?>                 
                </td>
              </tr>
            </table>
          </div>

          <!-- Tab Edit -->
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <br>
            <div id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
                      Umum
                    </a>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <form action="proses_update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-5">
                          <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap Anda" value="<?php echo $data['nama_lengkap']; ?>"
                            required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                          <textarea class="form-control" name="alamat" placeholder="Alamat Anda" required><?php echo $data['alamat']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputState">Jenis Kelamin</label>
                        <div class="col-sm-5">
                          <select id="inputState" class="form-control" name="jenis_kelamin" required>
                            <option value="" selected>...</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-5">
                        <img src="assets/img/<?php echo $data['foto'];?>" class="ubah-foto"> 
                          <input type="file" name="foto" class="form-control">
                          <label>
						  <input type="checkbox" name="ubah_foto" value="true" style="margin-top:10px;"> Setuju untuk merubah foto
						</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                          <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" value="<?php echo $data['email']; ?>"
                            required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-5">
                          <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo $data['tempat_lahir']; ?>">
                           
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                        
                          <input type="text" name="tgl_lahir" class="date form-control" id="datepicker" placeholder="DD-MM-YYYY" value="<?php echo $data['tgl_lahir']; ?>">
                            
                            <div class="input-group-addon">
                            <i class="fa fa-calendar fa-fw"></i>
    </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-5">
                          <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Telepon Anda" value="<?php echo $data['no_hp']; ?>">
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                          <button type="submit" name="simpan" class="btn btn-success">
                            <i class="fa fa-floppy-o fa-fw"></i> Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                      Keamanan
                    </a>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password Lama</label>
                      <div class="col-sm-5">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Lama" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password Baru</label>
                      <div class="col-sm-5">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Baru" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ulangi Password</label>
                      <div class="col-sm-5">
                        <input type="password" name="password" class="form-control" placeholder="Ulangi Password Baru" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">&nbsp;</label>
                      <div class="col-sm-10">
                        <button type="submit" name="simpan" class="btn btn-success">
                          <i class="fa fa-floppy-o fa-fw"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                  </div>
          </div>

        </div>
      </div>

      <br>

      <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/bootstrap-datepicker.min.js"></script>
      <script>
         $('#datepicker').datepicker({format: 'dd-mm-yyyy',});
         
      </script>
     
  </body>

  </html>
  <?php
} else {
  echo "<script>alert(\"Forbidden !!!\");</script>";
  echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
}
?>