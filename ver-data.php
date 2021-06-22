<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Verifikasi Data</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="assets/css/pendataan.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


  </head>

  <body>
    <?php
    session_start();
      include 'data-index.php';
      if($_SESSION['statuslog']!="login"){
        header("location: login-adm.php?pesanlog=belum_login");
      }
    
      $queryadm= mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE user_name='$_SESSION[user_name]'");
      $tampil=mysqli_fetch_array($queryadm);

    ?>

    <!--Header navigation-->
    <div id="wrapper">
      <nav class="navbar navbar-inverse fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pendataan Mahasiswa Bebas Covid</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">       
            <li class="nav-item ">
              <a href="logout-adm.php" class="nav-link"><i class="fa fa-power-off"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </nav>

      
        <!-- The sidebar -->
        <div class="sidebar">
          <a  href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
          <a href="data-masuk.php"><i class="fa fa-table"></i> Data Masuk</a>
          <a class="active" href="ver-data.php"><i class="fa fa-check"></i> Verifikasi Data</a>
        </div>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <h1>Verifikasi Data<small> Verifikasi Data Mahasiswa</small></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-dashboard"></i> Dashboard</li>
                    <li class="breadcrumb-item active"><i class="fa fa-table"></i> Verifikasi Data</li>
                </ol>
            </nav>
            <?php
                  if(isset($_GET['pesan'])){
                    if($_GET['pesan']=="downloaded"){
                        echo "<div class='alert alert-success'>Export file telah terdownload</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Export file gagal!</div>";
                    }
                }
            ?>

          </div>
        </div><!--row-->
        
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary ">
              <div class="card-heading bg-light" >
                <p class="card-title text-black "><i class="fa fa-table"></i> Detail Data</p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="dataTables_length" id="datatable_length">
                      <label>
                        Show 
                        <select class="datatable_length" 
                        aria-controls="datatable" class="form-control input-sm">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select> >
                         entries
                      </label>
                    </div>
                 </div>
                <div class="col-sm-8">
                        <a href="exportexcel.php"><button type="button" class="btn btn-primary">Export to Excel</button></a>
                           <!--tombol untuk export ke pdf-->
                        <a href="exportpdf.php"><button type="button" class="btn btn-primary">Export to PDF</button></a>
                </div>
                <br>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr role="row">
                      <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="ID Mahasiswa: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">No.<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="ID Mahasiswa: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">ID Mahasiswa<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="NPM: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">NPM<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Nama<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Jurusan: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Jurusan<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Status<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Domisili: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Domisili<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Tgl. Transaki: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Kesediaan Kuliah<i class="fa fa-sort"></i></th>

                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Surat Ket.Sehat: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Surat Ket. Sehat<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Surat Bebas Covid: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Surat Bebas Covid<i class="fa fa-sort"></i></th>
                        <th class="sorting_desc"tabindex="0" aria-controls="datatable"
                        rowspan="1" colspan="1" aria-label="Verifikasi: activate to sort column ascending"
                        style="width: 102px;" aria-sort="descending">Verifikasi<i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      
                        while ($tampil_detail=mysqli_fetch_assoc($hasil_detail)){
                          echo '<tr>
                              <td>'.$no++.'</td>
                              <td>'.$tampil_detail['id_mhs'].'</td>
                              <td>'.$tampil_detail['npm_mhs'].'</td>
                              <td>'.$tampil_detail['nama_mhs'].'</td>
                              <td>'.$tampil_detail['jurusan'].'</td>
                              <td>'.$tampil_detail['status_ver'].'</td>
                              <td>'.$tampil_detail['domisili'].'</td>
                              <td>'.$tampil_detail['kesediaan_kuliah'].'</td>
                              <td>'.$tampil_detail['file_bebascov'].'</td>
                              <td>'.$tampil_detail['file_ketsehat'].'</td>
                              <td><a class="btn btn-primary" href="verifikasi.php?id_mhs='.$tampil_detail['id_mhs'].'">
                              <i class="icon-edit"></i>Update</a></td>
                          </tr>';
                        }
                      ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          


      </div><!--page-wrapper-->

      
    </div> <!--wrapper-->

    <script src="assets/js/jquery.js"></script> 
    <script src="assets/js/popper.js"></script> 
    <script src="assets/js/bootstrap.js"></script>
    
  </body>

</html>