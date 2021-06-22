<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" href="assets/css/csslogin.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


  </head>

  <body>
    <div id="login">

        <?php
        session_start();

        if(isset($_GET['pesanlog'])){
          if($_GET['pesanlog'] == "gagal"){
            echo "Login gagal! username dan password salah!";
          }else if($_GET['pesanlog'] == "logout"){
            echo "Anda telah berhasil logout";
          }else if($_GET['pesanlog'] == "belum_login"){
            echo "Anda harus login untuk mengakses halaman";
          }
        }


        ?>



        <div class="container">
         <div id="login-row" class="row justify-content-center align-items-center">
           <div id="login-column" class="col-md-6">
             <div id="login-box" class="col-md-12">
             <form class="form-signin" method="post" action="login-proses-adm.php">
                <h2 class="form-signin-heading text-center text-info">
                <strong>LOGIN ADMIN</strong>          
                </h2>
                <div class="form-group">
                  <label for="user_name" class="text-info">Username :</label><br>
                  <input type="text" name="user_name" class="form-control" placeholder="Username" autofocus required>
                </div>        
                <div class="form-group">
                  <label for="password_mhs" class="text-info">Password :</label><br>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div> 
                <div class="form-group">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">
                  <i class="glyphicon glyphicon-log-in"></i> Log in
                  </button>
                </div>
                <div id="register-link" class="text-right">
                  <p class="message">Anda mahasiswa?
                  <a href="login.php" class="text-info">Login Di sini</a>
                  </p>
                </div> 
              </form>

             </div>


           </div>
         </div>
        </div>
    </div> <!-- /container -->

    </body>
</html>
