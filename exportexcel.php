<?php
//memasukkan file dari luar yaitu file dari library PhpSpreasheet dan file koneksi ke database
include ('connect.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//mendeklarasikan variabel 
$spreadsheet =  new Spreadsheet();
$sheet = $spreadsheet->getActivesheet();
//mengatur isi tabel
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'ID Mahasiswa');
$sheet->setCellValue('C1', 'NPM');
$sheet->setCellValue('D1', 'Nama');
$sheet->setCellValue('E1', 'Jurusan');
$sheet->setCellValue('F1', 'Domisili');
$sheet->setCellValue('G1', 'Kesediaan Kuliah');
$sheet->setCellValue('H1', 'Status');
$sheet->setCellValue('I1', 'Surat Ket. Sehat');
$sheet->setCellValue('J1', 'Surat Bebas Covid');

//mengirim statement pada database untuk mengambil query
$query = mysqli_query($koneksi,"SELECT im.id_mhs, npm_mhs, nama_mhs, jurusan, d.domisili, kesediaan_kuliah, status_ver,
fb.file_bebascov, f.file_ketsehat FROM tb_mhs im JOIN tb_data d USING (id_mhs) 
JOIN tb_bebascov fb USING (id_mhs) 
JOIN tb_ketsehat f USING (id_mhs)");
$i= 2;
$no = 1;
//mengambil data dari database dan memasukkan ke dalam tabel spreadsheet
while ($row = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['id_mhs']);
    $sheet->setCellValue('C'.$i, $row['npm_mhs']);
    $sheet->setCellValue('D'.$i, $row['nama_mhs']);
    $sheet->setCellValue('E'.$i, $row['jurusan']);
    $sheet->setCellValue('F'.$i, $row['domisili']);
    $sheet->setCellValue('G'.$i, $row['kesediaan_kuliah']);
    $sheet->setCellValue('H'.$i, $row['Status']);
    $sheet->setCellValue('I'.$i, $row['Surat Ket. Sehat']);
    $sheet->setCellValue('J'.$i, $row['Surat Bebas Covid']);
    $i++;
}

//membuat border tabel
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$i = $i-1;
//menerapkan style membuat border
$sheet->getStyle('A1:AI'.$i)->applyFromArray($styleArray);

//menyimpan data pada file xlsx
$writer = new Xlsx($spreadsheet);
$writer->save('Export Daftar Verifikasi Data.xlsx');

header("location:ver-data.php?pesan=downloaded");
?>