<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Masuk</title>
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
          <a class="active" href="data-masuk.php"><i class="fa fa-table"></i> Data Masuk</a>
          <a href="ver-data.php"><i class="fa fa-check"></i> Verifikasi Data</a>
        </div>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <h1>Data Masuk <small>Data Mahasiswa yang Masuk</small></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-dashboard"></i> Dashboard</li>
                    <li class="breadcrumb-item active"><i class="fa fa-table"></i> Data Masuk</li>
                </ol>
            </nav>
          </div>
        </div><!--row-->
        
        <div class="row" >
           <div class="col-lg-12">
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
                 <h2>Data Pengisian Formulir</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <th>No.<i class="fa fa-sort"></i></th>
                      <th>ID Mahasiswa<i class="fa fa-sort"></i></th>
                      <th>NPM<i class="fa fa-sort"></i></th>
                      <th>Nama<i class="fa fa-sort"></i></th>
                      <th>Jurusan<i class="fa fa-sort"></i></th>
                      <th>Alamat<i class="fa fa-sort"></i></th>
                      <th>Domisili<i class="fa fa-sort"></i></th>
                      <th>Riwayat Covid<i class="fa fa-sort"></i></th>
                      <th>Kontak Covid<i class="fa fa-sort"></i></th>
                      <th>Riwayat Vaksin<i class="fa fa-sort"></i></th>
                      <th>Kesediaan Kuliah<i class="fa fa-sort"></i></th>
                    </thead>
                    <tbody>
                      <?php
                      $no_form=1;
                        while ($tampil_data_form=mysqli_fetch_array($hasil_data_form)){
                          echo '<tr>
                              <td>'.$no_form++.'</td>
                              <td>'.$tampil_data_form['id_mhs'].'</td>
                              <td>'.$tampil_data_form['npm_mhs'].'</td>
                              <td>'.$tampil_data_form['nama_mhs'].'</td>
                              <td>'.$tampil_data_form['jurusan'].'</td>
                              <td>'.$tampil_data_form['alamat'].'</td>
                              <td>'.$tampil_data_form['domisili'].'</td>
                              <td>'.$tampil_data_form['riwayat_cov'].'</td>
                              <td>'.$tampil_data_form['kontak_cov'].'</td>
                              <td>'.$tampil_data_form['riwayat_vaksin'].'</td>
                              <td>'.$tampil_data_form['kesediaan_kuliah'].'</td>
                          </tr>';
                        }
                      ?>
                      
                    </tbody>
                  </table>
                </div>
             </div>

            </div>
        </div>

        <div class="row" >
            <div class="col-lg-12">
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
              <h2>Data File Upload yang masuk</h2>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <th>No.<i class="fa fa-sort"></i></th>
                      <th>ID Mahasiswa<i class="fa fa-sort"></i></th>
                      <th>NPM<i class="fa fa-sort"></i></th>
                      <th>Nama<i class="fa fa-sort"></i></th>
                      <th>Jurusan<i class="fa fa-sort"></i></th>
                      <th>Kategori File<i class="fa fa-sort"></i></th>
                      <th>File Upload<i class="fa fa-sort"></i></th>
                      <th>Kategori File<i class="fa fa-sort"></i></th>
                      <th>File Upload<i class="fa fa-sort"></i></th>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                        while ($tampil_data_upload=mysqli_fetch_array($hasil_data_upload)){
                          echo '<tr>
                              <td>'.$no++.'</td>
                              <td>'.$tampil_data_upload['id_mhs'].'</td>
                              <td>'.$tampil_data_upload['npm_mhs'].'</td>
                              <td>'.$tampil_data_upload['nama_mhs'].'</td>
                              <td>'.$tampil_data_upload['jurusan'].'</td>
                              <td>'.$tampil_data_upload['kategori_ketsehat'].'</td>
                              <td>'.$tampil_data_upload['file_ketsehat'].'</td>
                              <td>'.$tampil_data_upload['kategori_bebascov'].'</td>
                              <td>'.$tampil_data_upload['file_bebascov'].'</td>
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