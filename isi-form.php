<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mengisi Formulir</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/pendataan.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        "use strict";
  
        window.addEventListener("load", function() {
          var form = document.getElementById("data");
          form.addEventListener("submit", function(event) {
            if (form.checkValidity() == false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add("was-validated");
          }, false);
        }, false);
      }());
    </script>


  </head>

  <body>
  <?php
  session_start();
  include "connect.php";
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
              <a href="logout.php" class="nav-link"><i class="fa fa-power-off"></i>Log Out</a>
            </li>
          </ul>
        </div>
      </nav>

      
        <!-- The sidebar -->
        <div class="sidebar">
          <a  href="index-user.php"><i class="fa fa-user"></i> Profil</a>
          <a class="active" href="isi-form.php"><i class="fa fa-pencil-square-o"></i> Mengisi Form</a>
          <a  href="up-berkas.php"><i class="fa fa-cloud-upload"></i> Upload Berkas</a>
        </div>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <h1>Mengisi Formulir</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fa fa-pencil-square-o"></i> Mengisi Formulir</li>
                </ol>
            </nav>
            <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $alamat = $_POST["alamat"];
                $domisili = $_POST["domisili"];
                $riwayat_cov = $_POST["riwayat_cov"];
                $kontak_cov = $_POST["kontak_cov"];
                $riwayat_vaksin = $_POST["riwayat_vaksin"];
                $kesediaan_kuliah = $_POST["kesediaan_kuliah"];
              
                $query = "INSERT INTO tb_data SET alamat='$alamat', domisili='$domisili',
                riwayat_cov='$riwayat_cov', kontak_cov='$kontak_cov', riwayat_vaksin='$riwayat_vaksin',
                kesediaan_kuliah='$kesediaan_kuliah', id_admin='1', id_mhs='$tampil[id_mhs]'";
                mysqli_query($koneksi,$query);
            
                //pengecekan kondisi berhasil tidaknya eksekusi query
                  if ($query){
                     echo "<div class='alert alert-success'>Selamat $tampil[nama_mhs] anda telah berhasil submit!</div>";
                  } else {
                     echo "<div class=alert alert-danger'>Submit formulir gagal.</div>";
                  }
              }
            
            ?>

            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Silakan mengisi formulir dengan sejujur-jujurnya
            </div>
          </div>
        </div><!--row-->
        
        <div class="row" >
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                Form Pendataan Mahasiswa Kuliah Tatap Muka
              </div>
              <div class="card-body">
                <form class="container" id="data" novalidate method="post">
                  <div class="form-row">
                    <div class="form-group col-lg-12">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-12">
                      <label for="domisili">Domisili Sekarang</label>
                      <input type="text" class="form-control" name="domisili" id="domisili" placeholder="Kabupaten domisili" required>
                    </div>
                  </div>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Penah terinfeksi Covid?</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="riwayat_cov" id="riwayat_covid1" value="Pernah" required>
                          <label for="form-check-label" for="riwayat_covid1">Pernah</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="riwayat_cov" id="riwayat_covid2" value="Belum" required>
                          <label for="form-check-label" for="riwayat_covid2">Belum</label>
                          <div class="invalid-feedback">Pastikan untuk memilih salah satu</div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Penah berkontak dengan penderita Covid?</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="kontak_cov" id="kontak_covid1" value="Pernah" required>
                          <label for="form-check-label" for="kontak_covid1">Pernah</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="kontak_cov" id="kontak_covid2" value="Belum" required>
                          <label for="form-check-label" for="kontak_covid2">Belum</label>
                          <div class="invalid-feedback">Pastikan untuk memilih salah satu</div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Sudah pernah vaksin?</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="riwayat_vaksin" id="riwayat_vaksin1" value="Pernahth1" required>
                          <label for="form-check-label" for="riwayat_vaksin1">Pernah, tahap 1</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="riwayat_vaksin" id="riwayat_vaksin2" value="Pernahth2" required>
                          <label for="form-check-label" for="riwayat_vaksin2">Pernah, tahap 2</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="riwayat_vaksin" id="riwayat_vaksin3" value="Belum" required>
                          <label for="form-check-label" for="riwayat_vaksin3">Belum</label>
                          <div class="invalid-feedback">Pastikan untuk memilih salah satu</div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Bersedia kuliah tatap muka?</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="kesediaan_kuliah" id="kesediaan_kuliah1" value="Bersedia" required>
                          <label for="form-check-label" for="kesediaan_kuliah1">Bersedia</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="kesediaan_kuliah" id="kesediaan_kuliah2" value="Tidak" required>
                          <label for="form-check-label" for="kesediaan_kuliah2">Tidak bersedia</label>
                          <div class="invalid-feedback">Pastikan untuk memilih salah satu</div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group row">
                    <div class="col-sm-10">
                       <button type="submit" class="btn btn-primary">Submit</button>
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