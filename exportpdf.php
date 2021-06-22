<?php
//include file koneksidbs.php untuk koneksi ke database
include ('connect.php');
//mengambil file dari library dompdf
require_once("dompdf/autoload.inc.php");
//menggunakan namespace Dompdf
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//perintah query untuk mendapatkan data pada tabel di database
$query = mysqli_query($koneksi,"SELECT im.id_mhs, npm_mhs, nama_mhs, jurusan, d.domisili, kesediaan_kuliah, status_ver,
fb.file_bebascov, f.file_ketsehat FROM tb_mhs im JOIN tb_data d USING (id_mhs) 
JOIN tb_bebascov fb USING (id_mhs) 
JOIN tb_ketsehat f USING (id_mhs)");
//membuat judul serta header menggunakan kode html menggunakan operator concatination
$html = '<center><h3>Daftar Verifikasi Data Mahasiswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>ID Mahasiswa</th>
<th>NPM Mahasiswa</th>
<th>Nama Mahasiswa</th>
<th>Domisili</th>
<th>Kesediaan Kuliah</th>
<th>Status</th>
<th>Surat Ket. Sehat</th>
<th>Surat Bebas Covid</th>
</tr>';
$no = 1;
//membaca data pada tabel didatabase serta meng-extractnya ke dalam variabel $row
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['id_mhs']."</td>
    <td>".$row['npm_mhs']."</td>
    <td>".$row['nama_mhs']."</td>
    <td>".$row['jurusan']."</td>
    <td>".$row['domisili']."</td>
    <td>".$row['kesediaan_kuliah']."</td>
    <td>".$row['status']."</td>
    <td>".$row['file_ketsehat']."</td>
    <td>".$row['file_bebascov']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
//konversi dari kode html menjadi bentuk pdf
$dompdf->loadHtml($html);
//setting ukuran dan orientasi kerras
$dompdf->SetPaper('Legal','landscape');
//rendering dari HTML ke PDF
$dompdf->render();
//melakukan output file pdf
$dompdf->stream('Export Daftar Verifikasi Data.pdf');
?>