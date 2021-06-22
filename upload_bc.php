<?php
include 'connect.php';
$jurusan_bebascov = $_POST['jurusan_bebascov'];
$id_mhs = $_POST['id_mhs'];
 
$rand = rand();
$ekstensi =  array('png','jpg');
$filename = $_FILES['file_bebascov']['name'];
$ukuran = $_FILES['file_bebsacov']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(in_array($ext,$ekstensi)===true ) {
	header("location:up-berkas.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['file_bebascov']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		$query=mysqli_query($koneksi, "INSERT INTO tb_bebascov VALUES(NULL,'$jurusan_bebascov','Surat Bebas Covid','$xx','$id_mhs','1')");
		if($query){
			header("location:up-berkas.php?alert=berhasil");
		}else{
			header("location:up-berkas.php?alert=gagal");
		}
		
	}else{
		header("location:up-berkas.php?alert=besar");
	}
}