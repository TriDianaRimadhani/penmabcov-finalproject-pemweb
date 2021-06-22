<?php
include 'connect.php';
$jurusan_ketsehat = $_POST['jurusan_ketsehat'];
$id_mhs = $_POST['id_mhs'];
 
$rand = rand();
$ekstensi =  array('png','jpg');
$filename = $_FILES['file']['name'];
$ukuran = $_FILES['file']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(in_array($ext,$ekstensi)===true ) {
	header("location:up-berkas.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['file']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		$query=mysqli_query($koneksi, "INSERT INTO tb_ketsehat VALUES(NULL,'$jurusan_ketsehat','Surat Keterangan Sehat','$xx','1','$id_mhs')");
		
		if($query){
			header("location:up-berkas.php?alert=berhasil");
		}else{
			header("location:up-berkas.php?alert=gagal");
		}
	}else{
		header("location:up-berkas.php?alert!=besar");
	}
}