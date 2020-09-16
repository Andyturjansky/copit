<?php
  
  include_once "dbCopIt.php";
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
  if(isset($_REQUEST['IdBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['IdBorrar']??'');
    $query="DELETE from productos where IdProducto='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>
        <div class="alert alert-warning float-right" role="alert">
            Producto borrado con exito
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

<?php 
  
  if(isset($_REQUEST['IdVerificar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['IdVerificar']??'');
    $query="UPDATE productos set VerificarProducto = 1 where IdProducto='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>
        <div class="alert alert-warning float-right" role="alert">
            Producto verificado con exito
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al verificar <?php echo mysqli_error($con); ?>
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
            <h1>Productos</h1>
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
                <table id="tablaProductos" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Condicion</th>
                    <th>Talle</th>
                    <th>Diseñador</th>
                    <th>Color</th>
                    <th>Descripcion</th>
                    <th>Precio</th> 
                    <th>Email vendedor</th>                    
                    <th>Foto</th>                         
                    <th>Verificar</th>
                    <th>Acciones</th>                     
                  </tr>
                     </thead>
                              <tbody>
                                  <?php                                   
                                    $query = "SELECT IdProducto,Nombre,IdCategoriaProducto,IdCondicionProducto,IdTalleProducto,IdDiseniadorProducto,IdColorProducto,DescripcionProducto,ImagenProducto,VerificarProducto,IdDetalleCliente,Precio,NombreCat,NombreCondicion,NombreTalle,NombreDiseniador,NombreColor,Email FROM productos
                                    INNER JOIN categorias ON categorias.IdCategoria=productos.IdCategoriaProducto
                                    INNER JOIN condicion ON condicion.IdCondicion=productos.IdCondicionProducto
                                    INNER JOIN talles ON talles.IdTalle=productos.IdTalleProducto
                                    INNER JOIN diseniadores ON diseniadores.IdDiseniador=productos.IdDiseniadorProducto
                                    INNER JOIN colores ON colores.IdColor=productos.IdColorProducto
                                    INNER JOIN clientes ON clientes.IdCliente=productos.IdDetalleCliente where productos.IdProducto"; 
                                    
                                    $res = mysqli_query($con, $query);   
                                    //var_dump($res);                                 

                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                      <tr>
                                          <td><?php echo $row['Nombre'] ?></td>
                                          <td><?php echo $row['NombreCat'] ?></td>
                                          <td><?php echo $row['NombreCondicion'] ?></td>
                                          <td><?php echo $row['NombreTalle'] ?></td>
                                          <td><?php echo $row['NombreDiseniador'] ?></td>
                                          <td><?php echo $row['NombreColor'] ?></td>
                                          <td><?php echo $row['DescripcionProducto'] ?></td>
                                          <td><?php echo $row['Precio'] ?></td>   
                                          <td><?php echo $row['Email'] ?></td>   
                                          <td> 
                                            <?php if(empty($row['ImagenProducto'])==true): ?>
                                              <?php else: ?>
                                              <img src="../fotos/<?php echo $row['ImagenProducto']; ?>" style="width: 500px;" class="img-thumbnail">
                                              <?php endif; ?>                                          
                                          </td>  
                                          <td>
                                          <?php echo $row['VerificarProducto'] ?>
                                          <a href="panel.php?modulo=productos&IdVerificar=<?php echo $row['IdProducto']; ?>" class="VerificarProducto"> <i class="fas fa-check-circle"></i> </a>                                            
                                          </td>
                                          <td>                                                                                           
                                          <a href="panel.php?modulo=productos&IdBorrar=<?php echo $row['IdProducto']; ?>" class="text-danger BorrarProducto"> <i class="fas fa-trash"></i> </a>
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