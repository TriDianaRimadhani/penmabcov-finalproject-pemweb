<?php
session_start();
include('connect.php');

// ambil data
$email = htmlspecialchars($_POST['email']);
$password_mhs = htmlspecialchars($_POST['password_mhs']);

// periksa username dan password
$query = "SELECT * FROM tb_mhs WHERE email = '$email' and password_mhs = '$password_mhs'";
$hasil = mysqli_query($koneksi, $query);
$hitung_data = mysqli_num_rows($hasil);

// cek
if ($hitung_data > 0) {
  // jika user dan password cocok
  $_SESSION['email'] = $email;
  $_SESSION['statuslog'] = "login";
  header('Location: index-user.php');
} else {
  // jika user dan password tidak cocok
  header("location:index.php?pesan=gagal");
}
?>