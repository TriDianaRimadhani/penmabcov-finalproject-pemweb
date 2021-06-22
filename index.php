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
    <script type="text/javascript" src="chartjs/Chart.js"></script>


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
        <a class="navbar-brand" href="index.php">Pendataan Mahasiswa Bebas Covid</a>
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
          <a class="active" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
          <a href="data-masuk.php"><i class="fa fa-table"></i> Data Masuk</a>
          <a href="ver-data.php"><i class="fa fa-check"></i> Verifikasi Data</a>
        </div>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
              <h1>Dashboard</h1>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active"><i class="fa fa-dashboard"></i> Dashboard</li>
              </ol>
            </nav>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Selamat datang <?=$tampil['nama_admin']?>
            </div>
          </div>
        </div><!--row-->
        
        <div class="row" >
          
            <div class="col-lg-4">
              <div class="card bg-primary text-white ">
                <div class="card-body text-right">
                  <div class="row">
                    <div class="col-xs-6">
                      <i class="fa fa-table fa-4x "></i>
                    </div>
                    <div class="col-xs-6 text-right">
                      <p class="card-text announcement-heading"><?php echo $jumlah_data_mhs['total']?></p>
                      <p class="card-text announcement-text">Data Masuk</p>
                    </div>
                  </div>
                </div>
                <a href="data-masuk.php" class="text-white">
                  <div class="card-footer announcement-bottom">
                    <div class="row">
                        <div class="col-xs-6">
                          Lihat Data Masuk
                        </div>
                        <div class="col-xs-6 text-right">
                          <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card bg-info text-white ">
                <div class="card-body text-right">
                  <div class="row">
                    <div class="col-xs-6">
                      <i class="fa fa-check fa-4x "></i>
                    </div>
                    <div class="col-xs-6 text-right">
                      <p class="card-text announcement-heading"><?php echo $jumlah_data_ver['total']?></p>
                      <p class="card-text announcement-text">Verifikasi Data</p>
                    </div>
                  </div>
                </div>
                <a href="ver-data.php" class="text-white">
                  <div class="card-footer announcement-bottom">
                    <div class="row">
                        <div class="col-xs-6">
                          Lihat Verifikasi Data
                        </div>
                        <div class="col-xs-6 text-right">
                          <i class="fa fa-arrow-circle-right"></i>
                        </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div> <!--row-->
        <br>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary ">
              <div class="card-heading bg-primary">
                <p class="card-title text-white "><i class="fa fa-table"></i> Data Masuk Terakhir</p>
              </div>
              <div class="card-body ">
               <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
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
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped tablesorter">
                      <thead>
                        <tr>
                          <th>ID Mahasiswa<i class="fa fa-sort"></i></th>
                          <th>NPM<i class="fa fa-sort"></i></th>
                          <th>Nama<i class="fa fa-sort"></i></th>
                          <th>Jurusan<i class="fa fa-sort"></i></th>
                          <th>Domisili<i class="fa fa-sort"></i></th>
                          <th>Kesediaan Kuliah<i class="fa fa-sort"></i></th>
                          <th>Surat Ket. Sehat<i class="fa fa-sort"></i></th>
                          <th>Surat Bebas Covid<i class="fa fa-sort"></i></th>
                       </tr>
                      </thead>
                      <tbody>
                        <?php

                          while ($tampil_rekap=mysqli_fetch_array($hasil_rekap)){
                            echo '<tr>
                                <td>'.$tampil_rekap['id_mhs'].'</td>
                                <td>'.$tampil_rekap['npm_mhs'].'</td>
                                <td>'.$tampil_rekap['nama_mhs'].'</td>
                                <td>'.$tampil_rekap['jurusan'].'</td>
                                <td>'.$tampil_rekap['domisili'].'</td>
                                <td>'.$tampil_rekap['kesediaan_kuliah'].'</td>
                                <td>'.$tampil_rekap['file_bebascov'].'</td>
                                <td>'.$tampil_rekap['file_ketsehat'].'</td>
                            </tr>';
                          }
                        ?>
                      
                      </tbody>
                    </table>
                  </div>

                </div><!--row table-->
               </div>

              </div>
            </div>
          </div>
        </div><!--row card table-->

        <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-heading bg-primary">
                <p class="card-title text-white"><i class="fa fa-bar-chart-o"></i> Grafik Verifikasi Data</p>
              </div>
              <div class="card-body">
                    <div style="width:800px;height:800px">
                      <canvas id="myChart"></canvas>
                    </div>
                    <script>
                      var ctx = document.getElementById("myChart").getContext('2d');
                      var myChart = new Chart(ctx,{
                        type: 'pie',
                        data: {
                          labels: ["Belum diverifikasi", "Diverifikasi", "Kuliah tatap muka",],
                          datasets: [{
                            label: '',
                            data:[
                              <?php
                                echo $tampil_jmlbaris;
                              ?>,
                              <?php
                                echo $tampil_jmldiver;
                              ?>,
                              <?php
                                echo $tampil_jmlkul;
                              ?>
                            ],
                            backgroundColor: [
                              'rgba(225,99,132,0.2)',
                              'rgba(54,162, 235,0.2)',
                              'rgba(255, 206, 86, 0.2)'
                            ],
                            borderColor: [
                              'rgba(255,99,132,1)',
                              'rgba(54,162,235,1)',
                              'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                          }]
                        },
                        options: {
                          scales: {
                            yAxes: [{
                              ticks: {
                                beginAtZero:true
                              }
                            }]
                          }
                        }
                      })
                 </script>

                  
                
                <div class="text-right">
                  <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                </div>
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