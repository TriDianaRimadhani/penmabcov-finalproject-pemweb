<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Update Verifikasi</title>
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
                    <li class="breadcrumb-item active"><i class="fa fa-check"></i> Verifikasi Data</li>
                    <li class="breadcrumb-item active"> Update Verifikasi</li>
                </ol>
            </nav>
            <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan']=="update"){
                            echo "<div class='alert alert-success'>Update Verifikasi Berhasil!</div>";
                        }else{
                            echo "<div class='alert alert-danger'>Update Verifikasi Gagal!</div>";
                        }
                    }
            ?>

          </div>
        </div><!--row-->
        
        <?php 
	      //$id_mhs = $_GET['id_mhs'];



  	    $tampil_detail=mysqli_fetch_assoc($hasil_detail)
	      ?>
          <div class="row">
            <div class="col-lg-12">
              <form action="update.php" method="post">		
    		      <table>
	    		      <tr>
		    		      <td class="table-primary" width="30%" >ID Mahasiswa</td>
			    	      <td>
				    	      <input name="id_mhs" value="<?php echo $tampil_detail['id_mhs']?>" disabled>
      				    </td>					
	      	    	</tr>	
      	    		<tr>
                    <td class="table-primary" width="30%" >NPM</td>
				            <td>
					            <input name="npm_mhs" value="<?php echo $tampil_detail['npm_mhs']?>" disabled>
				            </td>					
	    		      </tr>	
    	    		  <tr>
                    <td class="table-primary" width="30%" >Nama</td>
				          <td>
					          <input name="nama_mhs" value="<?php echo $tampil_detail['nama_mhs']?>" disabled>
				          </td>					
    			      </tr>	
	    		      <tr>
                    <td class="table-primary" width="30%" >Jurusan</td>
			    	        <td>
				    	        <input name="jurusan" value="<?php echo $tampil_detail['jurusan']?>" disabled>
				            </td>					
		    	      </tr>   
                <tr>
                  <td class="table-primary" width="30%" >Domisili</td>
		    		      <td>
			    		      <input name="domisili" value="<?php echo $tampil_detail['domisili']?>" disabled>
				          </td>					
    		    	  </tr>
                <tr>
                  <td class="table-primary" width="30%" >Kesediaan Kuliah</td>
			    	      <td>
				    	      <input name="kesediaan_kuliah" value="<?php echo $tampil_detail['kesediaan_kuliah']?>" disabled>
				          </td>					
    		    	  </tr>
                <tr>
                  <td class="table-primary" width="30%" >Surat Ket. Sehat</td>
			    	      <td>
				    	      <input name="file_ketsehat" value="<?php echo $tampil_detail['file_ketsehat']?>" disabled>
				          </td>					
    		    	  </tr>
                <tr>
                  <td class="table-primary" width="30%" >Surat Bebas Covid</td>
			    	      <td>
				    	      <input name="file_bebascov" value="<?php echo $tampil_detail['file_bebascov']?>" disabled>
				          </td>					
    		    	  </tr>
                <tr>
                  <td class="table-primary" width="30%" >Status</td>
			    	      <td>
				    	      <select name="status_ver" class="form-control">
                        <option value="Belum diverifikasi" selected>Belum diverifikasi</option>
                        <option value="Sedang diverifikasi">Diverifikasi</option>
                        <option value="Kuliah tatap muka">Kuliah tatap muka</option>
                      </select>
			    	      </td>					
		    	      </tr>				
		          </table>
              <div class="form-group row">
                   <div class="col-sm-10">
                         <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
	            </form>
            </div>
         </div>
        <?php  ?>
      </div>
	   
    </div>
 

    </body>
</html>