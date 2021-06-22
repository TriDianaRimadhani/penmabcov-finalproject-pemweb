<?php
session_start();
include('connect.php');

// ambil data
$user_name = htmlspecialchars($_POST['user_name']);
$password = htmlspecialchars($_POST['password']);

// periksa username dan password
$query = "SELECT * FROM tb_admin WHERE user_name = '$user_name' and password = '$password'";
$hasil = mysqli_query($koneksi, $query);
$hitung_data = mysqli_num_rows($hasil);

// cek
if ($hitung_data > 0) {
  // jika user dan password cocok
  $_SESSION['user_name'] = $user_name;
  $_SESSION['statuslog'] = "login";
  header('Location: index.php');
} else {
  // jika user dan password tidak cocok
  header("location:index.php?pesan=gagal");
}
?>