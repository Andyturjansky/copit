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
      <p class="login-box-msg">Inicia sesion</p>

      <?php
      if( isset($_REQUEST['login'])){
        session_start();
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
        $query = "SELECT IdCliente,NombreCliente,Email  FROM clientes where Email='" . $email . "' and Password='" . $password . "';  ";
        $res = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($res);
        if($row){
          $_SESSION['IdCliente'] = $row['IdCliente'];
          $_SESSION['EmailCliente'] = $row['Email'];
          $_SESSION['NombreDelCliente'] = $row['NombreCliente'];
          header("location: index.php?mensaje=Usuario logueado con exito");
        }
        else{
          ?>
          <div class="alert alert-danger" role="alert">
              Email o contraseña incorrecta 
            </div>
            <?php
        }
      }
      ?>

      <form method="post">
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
            <button type="submit" class="btn btn-primary btn-block" name = "login">Log in</button>
            <a href="registro.php" class="btn btn-warning btn-block" >Registrarse</a>
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
