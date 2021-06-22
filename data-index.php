<?php
include('connect.php');

// hitung data mhs
$query_data_mhs = "SELECT COUNT(*) AS total FROM tb_data";
$hasil_data_mhs = mysqli_query($koneksi, $query_data_mhs);
$jumlah_data_mhs = mysqli_fetch_assoc($hasil_data_mhs);

// hitung verifikasi data
$query_data_ver = "SELECT COUNT(*) AS total FROM tb_mhs WHERE status_ver='Belum diverifikasi'";
$hasil_data_ver = mysqli_query($koneksi, $query_data_ver);
$jumlah_data_ver = mysqli_fetch_assoc($hasil_data_ver);

//menampilkan rekapitulasi data
$query_rekap = "SELECT im.id_mhs, npm_mhs, nama_mhs, jurusan, d.domisili, kesediaan_kuliah, fb.file_bebascov, f.file_ketsehat 
FROM tb_mhs im LEFT JOIN tb_data d USING (id_mhs) 
LEFT JOIN tb_bebascov fb USING (id_mhs) 
LEFT JOIN tb_ketsehat f USING (id_mhs)";
$hasil_rekap=mysqli_query($koneksi, $query_rekap);
$tampil_rekap=mysqli_fetch_array($hasil_rekap);

//menampilkan data pengisian
$query_data_form = "SELECT im.id_mhs, npm_mhs, nama_mhs, jurusan, a.alamat, domisili,
riwayat_cov, kontak_cov, riwayat_vaksin,kesediaan_kuliah
FROM tb_mhs im JOIN tb_data a USING (id_mhs)";
$hasil_data_form=mysqli_query($koneksi, $query_data_form);
$tampil_data_form=mysqli_fetch_array($hasil_data_form);

//menampilkan upload berkas
$query_data_upload = "SELECT im.id_mhs, npm_mhs, nama_mhs, jurusan, 
kk.kategori_ketsehat, file_ketsehat, kb.kategori_bebascov, file_bebascov 
FROM tb_mhs im LEFT JOIN tb_ketsehat kk USING (id_mhs) 
LEFT JOIN tb_bebascov kb USING (id_mhs)";
$hasil_data_upload=mysqli_query($koneksi, $query_data_upload);
$tampil_data_upload=mysqli_fetch_array($hasil_data_upload);

//menampilkan detail data
$query_detail = "SELECT im.id_mhs, npm_mhs, nama_mhs, jurusan, status_ver, d.domisili, kesediaan_kuliah, 
fb.file_bebascov, f.file_ketsehat FROM tb_mhs im LEFT JOIN tb_data d USING (id_mhs) 
LEFT JOIN tb_bebascov fb USING (id_mhs) 
LEFT JOIN tb_ketsehat f USING (id_mhs)";
$hasil_detail=mysqli_query($koneksi, $query_detail);
$tampil_detail=mysqli_fetch_assoc($hasil_detail);

//menghitung jumlah baris pada data 'Belum diverifikasi'
$query_pie_belum=mysqli_query($koneksi,"SELECT * FROM `tb_mhs` WHERE status_ver='Belum diverifikasi'");
$tampil_jmlbaris=mysqli_num_rows($query_pie_belum);

//menghitung jumlah baris pada data 'Diverifikasi'
$query_pie_sudah=mysqli_query($koneksi,"SELECT * FROM `tb_mhs` WHERE status_ver='Diverifikasi'");
$tampil_jmldiver=mysqli_num_rows($query_pie_sudah);

//menghitung jumlah baris pada data 'Kuliah tatap muka'
$query_pie_kuliah=mysqli_query($koneksi,"SELECT * FROM `tb_mhs` WHERE status_ver='Kuliah tatap muka'");
$tampil_jmlkul=mysqli_num_rows($query_pie_kuliah);
