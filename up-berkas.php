<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Upload Berkas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="assets/css/pendataan.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


  </head>

  <body>
  <?php
  session_start();
  include 'connect.php';
  if($_SESSION['statuslog']!="login"){
    header("location: login.php?pesan=belum_login");
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
          <a  href="index-user.php"><i class="fa fa-user"></i> Profil</a>
          <a  href="isi-form.php"><i class="fa fa-pencil-square-o"></i> Mengisi Form</a>
          <a  class="active" href="up-berkas.php"><i class="fa fa-cloud-upload"></i> Upload Berkas</a>
        </div>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <h1>Upload Berkas Persyaratan</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fa fa-cloud-upload"></i> Upload Berkas</li>
                </ol>
            </nav>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Upload berkas dengan format file PDF.
              Format penamaan file :
              <br> 
              Surat Keterangan Sehat = NPM_SKSehat
              <br>
              Surat Bebas Covid = NPM_SBCovid
            </div>
            <?php
                  if(isset($_GET['alert'])){
                    if($_GET['alert']=="berhasil"){
                        echo "<div class='alert alert-success'>Upload berkas berhasil!</div>";
                    }else if ($_GET['alert']=="gagal"){
                        echo "<div class='alert alert-danger'>Upload berkas gagal!</div>";
                    }else if ($_GET['alert']=="besar"){
                      echo "<div class='alert alert-danger'>Ukuran file terlalu besar!</div>";
                    }
                }
            ?>
          </div>
        </div><!--row-->
        
        <div class="row" >
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                Upload Surat Keterangan Sehat
              </div>
              <div class="card-body">
                <form action="upload_ks.php" method="POST" enctype="mutipart/form-data">
                <div class="form-group">
                    <label>Jurusan :</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
                  </div>
                  <div class="form-group">
                    <label>Kategori File :</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Surat Keterangan Sehat" disabled>
                  </div>
                  <div class="form-group">
                    <label>Upload File :</label>
                    <input type="file" name="file_ketsehat" required="required">
                    <p style="color:red">Ekstensi yang diperbolehkan .pdf</p>
                  </div>
                  <div class="form-group">
                    <label>NPM :</label>
                    <input type="number" class="form-control" id="id_mhs" name="id_mhs" value="<?=$tampil['id_mhs']?>" placeholder="ID" disabled>
                  </div>
                  <input type="submit" name="" value="Simpan" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div> <!--row-->

        <div class="row" >
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                Upload Surat Bebas Covid
              </div>
              <div class="card-body">
                <form action="upload_bc.php" method="POST" enctype="mutipart/form-data">
                <div class="form-group">
                    <label>Jurusan :</label>
                    <input type="text" class="form-control" id="jurusan_bebascov" name="jurusan_bebascov" placeholder="Jurusan">
                  </div>
                  <div class="form-group">
                    <label>Kategori File :</label>
                    <input type="text" class="form-control" id="kategori_bebascov" name="kategori_bebascov" placeholder="Surat Bebas Covid" disabled>
                  </div>
                  <div class="form-group">
                    <label>Upload File :</label>
                    <input type="file" name="file_bebascov" required="required">
                    <p style="color:red">Ekstensi yang diperbolehkan .pdf</p>
                  </div>
                  <div class="form-group">
                    <label>NPM :</label>
                    <input type="number" class="form-control" id="id_mhs" name="id_mhs" value="<?=$tampil['id_mhs']?>" placeholder="ID" disabled>
                  </div>
                  <input type="submit" name="" value="Simpan" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div> <!--row-->
          


      </div><!--page-wrapper-->

      
    </div> <!--wrapper-->

    <script src="assets/js/jquery.js"></script> 
    <script src="assets/js/popper.js"></script> 
    <script src="assets/js/bootstrap.js"></script>
    
  </body>

</html>