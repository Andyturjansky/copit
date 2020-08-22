<?php
if (isset($_REQUEST['Guardar'])) {
    include_once "dbCopIt.php";
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

    $email = mysqli_real_escape_string($con, $_REQUEST['Email'] ?? '');
    $password = mysqli_real_escape_string($con, $_REQUEST['Password'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['Nombre'] ?? '');

    $query = "INSERT INTO usuarios 
        (Email       ,Password       ,Nombre) VALUES
        ('" . $email . "','" . $password . "','" . $nombre . "');
        ";   
     
    $res = mysqli_query($con,$query);

    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario creado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear usuario</h1>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="panel.php?modulo=crearUsuario" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="Email" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="Password" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="Nombre" class="form-control" required="required" >
                            </div>                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="Guardar">Guardar</button>
                                <a href="panel.php?modulo=usuarios" class="btn btn-warning">Cancelar</a>
                            </div>
                 </form> 
                
            </div>

                  <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

            </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>           