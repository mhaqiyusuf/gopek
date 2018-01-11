<?php
require_once ("koneksi.php");

$username = $_POST["username"];
$password = md5($_POST["password"]);

// proteksi MySQL terhadap injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM user";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);

if($password <> $row['password']) {
	echo "<script>alert(\"Username atau Password salah!\");</script>";
	echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
}

$sql="SELECT * FROM user WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

$count = mysql_num_rows($result);
$row = mysql_fetch_array($result);	

if($count==1){
	$_SESSION['SESS_LOGGEDIN'] = 1;
	$_SESSION["id"] = $row["id"];
	$_SESSION["nama_lengkap"] = $row["nama_lengkap"];
	$_SESSION["foto"] = $row["foto"];
	
	$ordersql = "SELECT id FROM transaksi WHERE id_user = " . $_SESSION["id"] . " AND status < 2";
	$orderres = mysql_query($ordersql);
	$orderrow = mysql_fetch_assoc($orderres);
	$_SESSION['SESS_ORDERNUM'] = $orderrow['id'];

	header("location:index.php");
}
?>