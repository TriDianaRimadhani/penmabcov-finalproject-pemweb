<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="assets/css/pendataan.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


  </head>

  <body>
  <?php
  session_start();
  include 'connect.php';
  if($_SESSION['statuslog']!="login"){
    header("location: login.php?pesanlog=belum_login");
  }

  $querymhs= mysqli_query($koneksi,"SELECT * FROM tb_mhs WHERE email='$_SESSION[email]'");
  $tampil=mysqli_fetch_array($querymhs);

  
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
              <a href="logout.php" class="nav-link"><i class="fa fa-power-off"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </nav>

      
        <!-- The sidebar -->
        <div class="sidebar">
          <a class="active" href="index-user.php"><i class="fa fa-user"></i> Profil</a>
          <a href="isi-form.php"><i class="fa fa-pencil-square-o"></i> Mengisi Form</a>
          <a  href="up-berkas.php"><i class="fa fa-cloud-upload"></i> Upload Berkas</a>
        </div>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <h1>Profil Mahasiswa</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fa fa-user"></i> Profil</li>
                </ol>
            </nav>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Selamat datang <?=$tampil['nama_mhs']?>
            </div>
          </div>
        </div><!--row-->
        
        <div class="row container d-flex justify-content-center">
          <div class="col-lg-4">
            <div class="card user-card-full" style="width:300px">
              <img class="card-img-top" src="userimg.png" alt="Card image" style="width=100%">
              <div class="card-body">
                <h4 class="card-tittle">Mahasiswa</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header">Profil Pribadi</div>
              <div class="card-body">
                <form class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="npm_mhs">NPM</label>
                      <input type="text" name="npm_mhs" class="form-control" id="npm_mhs" value="<?=$tampil['npm_mhs']?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama_mhs">Nama</label>
                      <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" value="<?=$tampil['nama_mhs']?>" disabled>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="jurusan_us">Jurusan</label>
                      <input type="text" name="jurusan" class="form-control" id="jurusan_us" value="<?=$tampil['jurusan']?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fakultas_us">Fakultas</label>
                      <input type="text" name="fakultas" class="form-control" id="fakultas_us" value="<?=$tampil['fakultas']?>" disabled>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <hr>
                    <h5 class="author-card-name text-lg mb-3">
                      <b>Informasi</b>
                    </h5>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email_us">Email</label>
                      <input type="text" name="email" class="form-control" id="email_us" value="<?=$tampil['email']?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="status_ver">Status Verifikasi Data</label>
                      <input type="text" name="status_ver" class="form-control" id="status_ver" value="<?=$tampil['status_ver']?>" disabled>
                    </div>
                  </div>
                </form>
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