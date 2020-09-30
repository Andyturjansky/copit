<?php

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
    $idProducto = mysqli_real_escape_string($con, $_REQUEST['IdProducto'] ?? '');

    $query = "UPDATE productos SET
        Nombre='" . $nombre . "',
        IdCategoriaProducto='" . $categoria . "',
        IdCondicionProducto='" . $condicion . "',
        IdTalleProducto='" . $talle . "',
        IdDiseniadorProducto='" . $diseniador . "',
        IdColorProducto='" . $color . "',
        DescripcionProducto='" . $descripcion . "',
        Precio='" . $precio . "',
        ImagenProducto='" . $nombreFoto . "'    
        where IdProducto='".$idProducto."';
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=productos&mensaje=Tu articulo '.$nombre.' ha sido editado de manera exitosa" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al editar producto <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$idProducto = mysqli_real_escape_string($con,$_REQUEST['IdProducto']??'');
$query="SELECT IdProducto,
Nombre,
IdCategoriaProducto,
IdCondicionProducto,
IdTalleProducto,
IdDiseniadorProducto,
IdColorProducto,
DescripcionProducto,
Precio,
ImagenProducto
from productos
where IdProducto ='".$idProducto."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
?>
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Producto</h1>
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
              <form action="index.php?modulo=editarProducto" method="post" enctype="multipart/form-data">                            
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="Nombre" class="form-control" value="<?php echo $row['Nombre'] ?>"  required="required" >
                            </div>         
                            <div class="form-group">
                                <label>Categoria</label>              
                                <select name="IdCategoriaProducto" class="form-control" required="required">                                           
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryCategoria)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                ?> <option value="<?php echo $valores['IdCategoria']; ?>"<?php if($valores['IdCategoria']==$row['IdCategoriaProducto']) echo 'selected="selected"'; ?>><?php echo $valores['NombreCat']; ?></option><?php                                    
                                }
                                ?>
                                </select>          
                            </div>                   
                            <div class="form-group">
                                <label>Condicion</label>              
                                <select name="IdCondicionProducto" class="form-control" required="required">                                           
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryCondicion)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                ?> <option value="<?php echo $valores['IdCondicion']; ?>"<?php if($valores['IdCondicion']==$row['IdCondicionProducto']) echo 'selected="selected"'; ?>><?php echo $valores['NombreCondicion']; ?></option><?php
                                }
                                ?>
                                </select>          
                            </div>
                            <div class="form-group">
                                <label>Talle</label>              
                                <select name="IdTalleProducto" class="form-control" required="required">                                      
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryTalle)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                ?> <option value="<?php echo $valores['IdTalle']; ?>"<?php if($valores['IdTalle']==$row['IdTalleProducto']) echo 'selected="selected"'; ?>><?php echo $valores['NombreTalle']; ?></option><?php
                                }
                                ?>
                                </select>          
                            </div>
                            <div class="form-group">
                                <label>Diseñador</label>              
                                <select name="IdDiseniadorProducto" class="form-control" required="required">                                            
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryDiseniador)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                ?> <option value="<?php echo $valores['IdDiseniador']; ?>"<?php if($valores['IdDiseniador']==$row['IdDiseniadorProducto']) echo 'selected="selected"'; ?>><?php echo $valores['NombreDiseniador']; ?></option><?php
                                }
                                ?>
                                </select>          
                            </div>
                            <div class="form-group">
                                <label>Color</label>              
                                <select name="IdColorProducto" class="form-control" required="required">                                    
                                <?php
                                // Realizamos la consulta para extraer los datos                                
                                while ($valores = mysqli_fetch_array($queryColor)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                ?> <option value="<?php echo $valores['IdColor']; ?>"<?php if($valores['IdColor']==$row['IdColorProducto']) echo 'selected="selected"'; ?>><?php echo $valores['NombreColor']; ?></option><?php
                                }
                                ?>
                                </select>          
                            </div>                                
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" name="DescripcionProducto" class="form-control" value="<?php echo $row['DescripcionProducto'] ?>" required="required" >
                            </div> 
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" name="Precio" class="form-control" value="<?php echo $row['Precio'] ?>" required="required" >
                            </div>    
                            <div class="form-group">  
                            <label>Foto</label>
                                <input type="file" name="ImagenProducto" accept="image/jpg, image/jpeg, image/png, image/webp, image/JPG, image/JPEG, image/PNG, image/WEBP" class="form-control">
                                </br>
                                <img src="fotos/<?php echo $row['ImagenProducto']; ?>" style="width: 250px;" class="img-thumbnail">                    
                            </div>                                         
                            <div class="form-group">
                                <input type="hidden" name="IdProducto" value="<?php echo $row['IdProducto'] ?>" >
                                <button type="submit" style="margin-left: 25px" class="btn btn-primary" name="Guardar">Actualizar</button>
                                <a href="index.php?modulo=productos" class="btn btn-warning">Cancelar</a>
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