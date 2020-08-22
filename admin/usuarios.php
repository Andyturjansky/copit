 <?php
  include_once "dbCopIt.php";
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
  if(isset($_REQUEST['IdBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['IdBorrar']??'');
    $query="DELETE from usuarios where IdUsuario='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>
        <div class="alert alert-warning float-right" role="alert">
            Usuario borrado con exito
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
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
            <h1>Usuarios</h1>
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones   
                    <a href="panel.php?modulo=crearUsuario"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     </th>
                  </tr>
                              </thead>
                              <tbody>
                                  <?php                                    
                                    $query = "SELECT IdUsuario,Nombre,Email  FROM usuarios";
                                    $res = mysqli_query($con, $query);                                    

                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                      <tr>
                                          <td><?php echo $row['Nombre'] ?></td>
                                          <td><?php echo $row['Email'] ?></td>
                                          <td>
                                              <a href="panel.php?modulo=editarUsuario&IdUsuario=<?php echo $row['IdUsuario'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                              <a href="panel.php?modulo=usuarios&IdBorrar=<?php echo $row['IdUsuario'] ?>" class="text-danger BorrarUsuario"> <i class="fas fa-trash"></i> </a>
                                          </td>
                                      </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>
                          </table>
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
                  