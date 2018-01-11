<?php
 
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['foto']);
unset($_SESSION['nama_lengkap']);
session_destroy();
header ("location:index.php");
 
?>