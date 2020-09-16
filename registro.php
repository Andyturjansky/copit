<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COPIT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>COPIT</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Registrate</p>

      <?php
      if( isset($_REQUEST['registro'])){
        session_start();
        $nombre = $_REQUEST['NombreCliente']??'';      
        $email = $_REQUEST['Email']??'';        
        $password = $_REQUEST['Password']??'';
        $password = md5($password);
        ini_set("display_errors", 1);
        ini_set("display_startup_errors", 1);
        include_once "admin/dbCopIt.php";
        $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
        if ($con == false) {
          die(
              "Error de conexion a Mysql con el codigo: " . mysqli_connect_errno().
              "<br>".mysqli_connect_error()
          );         
      }
        $query = "INSERT into clientes (NombreCliente,Email,Password) values ('$nombre','$email','$password')";
        $res = mysqli_query($con,$query);        
        if($res){          
          ?>
          <div class="alert alert-primary" role="alert">
                <strong>Registro exitoso</strong> <a href="login.php">Ir a login</a>
          </div>
          <?php
        }
        else{
          ?>
          <div class="alert alert-danger" role="alert">
              Error al registrarse
            </div>
            <?php
        }
      }
      ?>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre" name = "NombreCliente" value=<?php echo $_REQUEST['NombreCliente']??'';?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name = "Email" value=<?php echo $_REQUEST['Email']??'';?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name = "Password" value=<?php echo $_REQUEST['Password']??'';?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name = "registro">Registrarse</button>
            <a href="login.php" class="btn btn-warning btn-block" >Ir a login</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
