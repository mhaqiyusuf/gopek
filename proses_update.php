<?php
include ("koneksi.php");
$id = $_GET['id'];

$nama_lengkap = $_POST["nama_lengkap"];
$alamat = $_POST["alamat"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$email = $_POST["email"];
$tempat_lahir = $_POST["tempat_lahir"];
$tgl_lahir = $_POST["tgl_lahir"];
$no_hp = $_POST["no_hp"];


if (isset($_POST["ubah_foto"])) {
    
//Membaca nama file
$file_name = $_FILES['foto']['name'];
//Membaca ukuran file
$size = $_FILES['foto']['size'];
//Membaca jenis file
$file_type = $_FILES['foto']['type'];
//Source tempat upload file sementara
$source = $_FILES['foto']['tmp_name'];
//Tempat upload file disimpan
$direktori = "assets/img/$file_name"; 
		 
        
if(file_exists ($direktori)) {
    echo "<script>alert(\"file ($file_name) sudah ada, upload dengan nama lain!\");</script>";
    echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
    exit();
    } elseif ($file_type != "image/gif" && $file_type != "image/jpg" && $file_type != "image/jpeg" && $file_type != "image/png") {
        echo "<script>alert(\"file ($file_name) tidak di support, hanya untuk upload gambar (gif, jpg, jpeg, png) \");</script>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
        exit();
} else {
    
    move_uploaded_file($source, $direktori);
    $sql = "SELECT * FROM user WHERE id='".$id."'";
		$query = mysql_query($sql); 
		$data = mysql_fetch_array($query); 

		unlink("assets/img/".$data['foto']);
		
		$sql = "UPDATE user SET nama_lengkap='".$nama_lengkap."', alamat='".$alamat."', jenis_kelamin='".$jenis_kelamin."', email='".$email."' ,tempat_lahir='".$tempat_lahir."', tgl_lahir='".$tgl_lahir."', no_hp='".$no_hp."', foto='".$file_name."' WHERE id='".$id."'";
        $query = mysql_query($sql);

        if($sql) {
            echo "<script>alert(\"Data Berhasil Diubah!\");</script>";
            echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
        }else
             die ("Unggah foto gagal!");
}
}else{
    
    $sql = "UPDATE user SET nama_lengkap='".$nama_lengkap."', alamat='".$alamat."', jenis_kelamin='".$jenis_kelamin."', email='".$email."' ,tempat_lahir='".$tempat_lahir."', tgl_lahir='".$tgl_lahir."', no_hp='".$no_hp."' WHERE id='".$id."'";
    $query = mysql_query($sql);

if (!$query) {
    die ('Gagal menambahkan data' . mysql_error());
}

    echo "<script>alert(\"Data Berhasil Diubah!\");</script>";
    echo "<meta http-equiv='refresh' content='1;URL=index.php'>";

}
?>