<!DOCTYPE html>
<html lang="en">
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
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css"> 
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
  <!-- estilo tarjeta -->
  <link href="home.css" rel="stylesheet" type="text/css">
  <!-- filtros -->  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />  

  <?php
    session_start();
    session_regenerate_id(true);
    $accion=$_REQUEST['accion']??'';
    if($accion=='cerrar'){
        session_destroy();
        header("Refresh:0");
    }
?>
</head>

<body>
<?php
include_once "admin/dbCopIt.php";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database); 
?>
    <div class="container">
        <div class="row">
            <div class="col-12">           
                <!-- Vista -->               
                <?php
                include_once "menu.php";
                $modulo=$_REQUEST['modulo']??'';
                if($modulo=="home" || $modulo=="" ){
                    include_once "home.php";
                }
                if( $modulo=="detalleProducto" ){
                    include_once "detalleProducto.php";
                }
                if( $modulo=="categorias" ){
                    include_once "categorias.php";
                }
                if( $modulo =="publicarProducto"){
                    include_once "publicarProducto.php";
                }
                if( $modulo =="productos"){
                    include_once "productos.php";
                }
                if($modulo=="editarProducto"){
                    include_once "editarProducto.php";
                }
                ?>
            </div>
        </div>
    </div>
    
    

<body>

        <!-- jQuery -->
        <script src="admin/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>    
        <!-- Bootstrap 4 -->
        <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>       
        <!-- daterangepicker -->
        <script src="admin/plugins/moment/moment.min.js"></script>
        <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>             
        <!-- AdminLTE App -->
        <script src="admin/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="admin/dist/js/pages/dashboard.js"></script> 
        <script src="admin/js/ecommerce.js"></script> 
        
        <!-- Borrar producto -->    
        <script>
        $(document).ready(function () {
            $(".BorrarProducto").click(function (e) { 
            e.preventDefault();
            var res=confirm("¿Estas seguro de que quieres borrar este producto?");
            if(res==true){
                var Link=$(this).attr("href");
                window.location=Link;
            }

            });
        });
        </script>
</body>
</html>