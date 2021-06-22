<?php 
 
include 'koneksi.php';
$id_mhs = $_POST['id_mhs'];
$status_ver = $_POST['status_ver'];
 
mysql_query("UPDATE tb_mhs SET status_ver='$status_ver' WHERE id_mhs='$id_mhs'");
 
header("location:verifikasi.php?pesan=update");
 
?>