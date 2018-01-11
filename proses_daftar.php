<?php
include "koneksi.php";
$username = $_POST["username"];
$cek = mysql_query("select * from user where username = '$username'");
if(mysql_num_rows($cek) > 0){
    echo " &#10060; Username tidak tersedia ";
    echo "<meta http-equiv='refresh' content='1;URL=daftar.php'>";	
}elseif (!$username) {
    echo " &#10071; Username tidak boleh kosong ";
}else{
	echo " &#10004; Username masih tersedia";
if (isset($_POST["simpan"])) {

$nama_lengkap = $_POST["nama_lengkap"];
$alamat = $_POST["alamat"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$email = $_POST["email"];
$password = md5($_POST["password"]);

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
    echo "<meta http-equiv='refresh' content='1;URL=daftar.php'>";
    exit();
    } elseif ($file_type != "image/gif" && $file_type != "image/jpg" && $file_type != "image/jpeg" && $file_type != "image/png") {
        echo "<script>alert(\"file ($file_name) tidak di support, hanya untuk upload gambar (gif, jpg, jpeg, png) \");</script>";
        echo "<meta http-equiv='refresh' content='1;URL=daftar.php'>";
        exit();
} else {
    move_uploaded_file($source, $direktori)
    or die ("Unggah foto gagal!");
}
$sql = "INSERT INTO user VALUES('','$nama_lengkap','$alamat','','','$jenis_kelamin','$email','','$username','$password','$file_name')";
$query = mysql_query($sql);

if (!$query) {
    die ('Gagal menambahkan data' . mysql_error());
}

    echo "<script>alert(\"Pendaftaran Berhasil!\");</script>";
    echo "<meta http-equiv='refresh' content='1;URL=index.php'>";

}
}
?>