<!DOCTYPE html>
<html>
<!--<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COPIT</title>
   Tell the browser to be responsive to screen width 
  <meta name="viewport" content="width=device-width, initial-scale=1">

   Font Awesome 
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
   Ionicons 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   icheck bootstrap 
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  < Theme style 
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
   Google Font: Source Sans Pro 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>-->


<head>
	<title>Login V13</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/utillogin.css">
	<link rel="stylesheet" type="text/css" href="css/mainlogin.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
  
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

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Registrarse
					</span>

					<div class="wrap-input100 validate-input" data-validate="Se requiere un nombre">
						<span class="label-input100">Nombre y apellido</span>
            <input type="text" class="input100" placeholder="" name = "NombreCliente" value=<?php echo $_REQUEST['NombreCliente']??'';?>>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Se requiere una dirección de correo electrónico">
						<span class="label-input100">Dirección de correo electrónico</span>
						<input type="email" class="input100" placeholder="" name = "Email" value=<?php echo $_REQUEST['Email']??'';?>>
						<span class="focus-input100"></span>
					</div>

				<!--	<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100"></span>
					</div>-->

					<div class="wrap-input100 validate-input" data-validate = "Se requiere una contraseña">
						<span class="label-input100">Contraseña</span>
						<input type="password" class="input100" placeholder="" name = "Password" value=<?php echo $_REQUEST['Password']??'';?>>
						<span class="focus-input100"></span>
					</div>
<!--
					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="text" name="repeat-pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>-->

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									Acepto los 
									<a href="#" class="txt2 hov1">
										Terminos y condiciones
									</a>
								</span>
							</label>
						</div>

						
					</div>


          
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" name ="registro">
								Registrarse
							</button>
						</div>

						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Ya tengo una cuenta
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	
</html>
