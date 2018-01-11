<?php
require_once ("koneksi.php");
$itemsql = "SELECT * FROM transaksi_detail WHERE id = ". $_GET['id'] . ";";
$itemres = mysql_query($itemsql) or die(mysql_error());
$numrows = mysql_num_rows($itemres);
if($numrows == 0) {
header("Location: keranjang.php");
}
$itemrow = mysql_fetch_assoc($itemres);
$prodsql = "SELECT harga FROM makanan WHERE id = " . $itemrow['id_makanan'] . ";";
$prodres = mysql_query($prodsql)or die(mysql_error());;
$prodrow = mysql_fetch_assoc($prodres); 
$sql = "DELETE FROM transaksi_detail WHERE id = " . $_GET['id'];
$del=mysql_query($sql)or die(mysql_error());;
if($del){
	header("Location: keranjang.php");
}
?>