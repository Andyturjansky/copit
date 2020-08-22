<?php
include_once "dbCopIt.php";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
if (isset($_REQUEST['Guardar'])) {

    $email = mysqli_real_escape_string($con, $_REQUEST['Email'] ?? '');
    $password = mysqli_real_escape_string($con, $_REQUEST['Password'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['Nombre'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['IdUsuario'] ?? '');

    $query = "UPDATE usuarios SET
        Email='" . $email . "',Password='" . $password . "',Nombre='" . $nombre . "'
        where IdUsuario='".$id."';
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre.' editado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$id= mysqli_real_escape_string($con,$_REQUEST['IdUsuario']??'');
$query="SELECT IdUsuario,Email,Password,Nombre from usuarios where IdUsuario='".$id."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar usuario</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="panel.php?modulo=editarUsuario" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="Email" class="form-control" value="<?php echo $row['Email'] ?>" required="required" >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="Password" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="Nombre" class="form-control" value="<?php echo $row['Nombre'] ?>"  required="required" >
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="IdUsuario" value="<?php echo $row['IdUsuario'] ?>" >
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