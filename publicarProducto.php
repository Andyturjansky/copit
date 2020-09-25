

<?php
    include_once "admin/dbCopIt.php";
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

    if ($con == false) {
        echo "Error conexion" . mysqli_error($con);
    }

        if (isset($_REQUEST['Guardar'])) {    

    
    $subirFoto=isset($_FILES['ImagenProducto'])?$_FILES['ImagenProducto']:null;
    if($subirFoto){
    $nombreFoto=$subirFoto['name'];
    move_uploaded_file($subirFoto['tmp_name'],'fotos/'.$nombreFoto);
    }

    $nombre = mysqli_real_escape_string($con, $_REQUEST['Nombre'] ?? '');
    $categoria = mysqli_real_escape_string($con, $_REQUEST['IdCategoriaProducto'] ?? '');
    $condicion = mysqli_real_escape_string($con, $_REQUEST['IdCondicionProducto'] ?? '');
    $talle = mysqli_real_escape_string($con, $_REQUEST['IdTalleProducto'] ?? '');
    $diseniador = mysqli_real_escape_string($con, $_REQUEST['IdDiseniadorProducto'] ?? '');
    $color = mysqli_real_escape_string($con, $_REQUEST['IdColorProducto'] ?? '');
    $descripcion = mysqli_real_escape_string($con, $_REQUEST['DescripcionProducto'] ?? '');
    $precio = mysqli_real_escape_string($con, $_REQUEST['Precio'] ?? '');   

    $query = "INSERT INTO productos 
        (Nombre       ,IdCategoriaProducto       ,IdCondicionProducto,     IdTalleProducto,       IdDiseniadorProducto,      IdColorProducto,      DescripcionProducto,       Precio,        ImagenProducto) VALUES
        ('" . $nombre . "','" . $categoria . "','" . $condicion . "','" . $talle . "','" . $diseniador . "','" . $color . "','" . $descripcion . "','" . $precio . "','" . $nombreFoto . "');
        ";   
     
    $res = mysqli_query($con,$query);    

    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=publicarProducto&mensaje=Producto publicado exitosamente"/>  ';        
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al publicar producto <?php //echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>

<?php
  if(isset($_REQUEST['mensaje'])){
    ?>
    <div class="alert alert-primary alert-dismissible fade show float-medium" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <?php echo $_REQUEST['mensaje'] ?>
    </div>
    <?php
    }
    ?>

<!-- Content Wrapper. Contains page content -->

<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Publicar Producto</h1>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
$queryCategoria = $con -> query ("SELECT IdCategoria,NombreCat FROM categorias");
$queryCondicion = $con -> query ("SELECT IdCondicion,NombreCondicion FROM condicion");
$queryTalle = $con -> query ("SELECT IdTalle,NombreTalle FROM talles");
$queryDiseniador = $con -> query ("SELECT IdDiseniador,NombreDiseniador FROM diseniadores");
$queryColor = $con -> query ("SELECT IdColor,NombreColor FROM colores");

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="index.php?modulo=publicarProducto" method="post" enctype="multipart/form-data">                            
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="Nombre" class="form-control"  required="required" >
                            </div>         
                            <div class="form-group">
                                <label>Categoria</label>              
                                <select name="IdCategoriaProducto" class="form-control" required="required">
                                    <option value="">Seleccione una categoria</option>        
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryCategoria)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores[IdCategoria].'">'.$valores[NombreCat].'</option>';
                                }
                                ?>
                                </select>          
                            </div>                   
                            <div class="form-group">
                                <label>Condicion</label>              
                                <select name="IdCondicionProducto" class="form-control" required="required">
                                    <option value="">Seleccione una condicion</option>        
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryCondicion)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores[IdCondicion].'">'.$valores[NombreCondicion].'</option>';
                                }
                                ?>
                                </select>          
                            </div>
                            <div class="form-group">
                                <label>Talle</label>              
                                <select name="IdTalleProducto" class="form-control" required="required">
                                    <option value="">Seleccione una talle</option>        
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryTalle)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores[IdTalle].'">'.$valores[NombreTalle].'</option>';
                                }
                                ?>
                                </select>          
                            </div>
                            <div class="form-group">
                                <label>Diseñador</label>              
                                <select name="IdDiseniadorProducto" class="form-control" required="required">
                                    <option value="">Seleccione un Diseñador</option>        
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryDiseniador)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores[IdDiseniador].'">'.$valores[NombreDiseniador].'</option>';
                                }
                                ?>
                                </select>          
                            </div>
                            <div class="form-group">
                                <label>Color</label>              
                                <select name="IdColorProducto" class="form-control" required="required">
                                    <option value="">Seleccione un color</option>        
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryColor)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<option value="'.$valores[IdColor].'">'.$valores[NombreColor].'</option>';
                                }
                                ?>
                                </select>          
                            </div>                                
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" name="DescripcionProducto" class="form-control" required="required" >
                            </div> 
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" name="Precio" class="form-control" required="required" >
                            </div>    
                            </div? class="form-group">  
                            <label>Foto</label>
                                <input type="file" name="ImagenProducto" class="form-control"  required="required" >                    
                            </div>                                         
                            <div class="form-group">
                                <button type="submit" style="margin-left: 25px" class="btn btn-primary" name="Guardar">Guardar</button>
                                <a href="index.php" class="btn btn-warning">Cancelar</a>
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
            
          
                </div>
            </div>
        </div>
    </div>
</div>




