<?php
  if(isset($_REQUEST['IdBorrar'])){
    $idBorrarProducto= mysqli_real_escape_string($con,$_REQUEST['IdBorrar']??'');
    $query="DELETE from productos where IdProducto='".$idBorrarProducto."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>
        <div class="alert alert-warning float-right" role="alert">
            Producto eliminado con exito
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al eliminar producto <?php echo mysqli_error($con); ?>
        </div>
        <?php
    }
 }
 ?>   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tus productos</h1>
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
                    <th>Categoria</th>
                    <th>Condicion</th>
                    <th>Talle</th>
                    <th>Diseñador</th>
                    <th>Color</th>
                    <th>Descripcion</th>
                    <th>Precio</th>                                      
                    <th>Foto</th>                         
                    <th>Estado</th>
                    <th>Acciones</th>         
                  </tr>
                              </thead>
                              <tbody>
                                  <?php   
                                    $id = $_SESSION['IdCliente']; 
                                  
                                    $query = "SELECT IdProducto,Nombre,IdCategoriaProducto,IdCondicionProducto,IdTalleProducto,IdDiseniadorProducto,IdColorProducto,DescripcionProducto,ImagenProducto,VerificarProducto,IdDetalleCliente,Precio,NombreCat,NombreCondicion,NombreTalle,NombreDiseniador,NombreColor,Email, Cantidad FROM productos
                                    INNER JOIN categorias ON categorias.IdCategoria=productos.IdCategoriaProducto
                                    INNER JOIN condicion ON condicion.IdCondicion=productos.IdCondicionProducto
                                    INNER JOIN talles ON talles.IdTalle=productos.IdTalleProducto
                                    INNER JOIN diseniadores ON diseniadores.IdDiseniador=productos.IdDiseniadorProducto
                                    INNER JOIN colores ON colores.IdColor=productos.IdColorProducto
                                    INNER JOIN clientes ON clientes.IdCliente=productos.IdDetalleCliente
                                    where productos.IdProducto
                                    AND IdCliente = '$id ' ";
                                    $res = mysqli_query($con, $query);                                    

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
                                          <td> 
                                            <?php if(empty($row['ImagenProducto'])==true): ?>
                                              <?php else: ?>
                                              <img src="fotos/<?php echo $row['ImagenProducto']; ?>" style="width: 500px;" class="img-thumbnail">
                                              <?php endif; ?>                                          
                                          </td>  
                                          <td><?php
                                          if($row['VerificarProducto'] == 1 && $row['Cantidad'] == 0){
                                           echo "Vendido";
                                          }else if ($row['VerificarProducto'] == 1){
                                            echo "verificado";
                                          }else if($row['VerificarProducto'] == 0){
                                            echo "Esperando verificación";
                                          }
                                           ?></td>
                                          <td><?php
                                              if($row['Cantidad'] == 1){
                                                ?><a href="index.php?modulo=editarProducto&IdProducto=<?php echo $row['IdProducto'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                <a href="index.php?modulo=productos&IdBorrar=<?php echo $row['IdProducto'] ?>" class="text-danger BorrarProducto"> <i class="fas fa-trash"></i> </a>
                                                <?php
                                              }else{
                                                ?><a href="" style="margin-right: 5px;">Enviar producto</a>
                                                <?php
                                              }                                              
                                              ?></td>             
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