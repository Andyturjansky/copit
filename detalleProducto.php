<?php

$idCliente = $_SESSION['IdCliente']; 
$id = mysqli_real_escape_string($con, $_REQUEST['IdProducto'] ?? '');
$queryProducto = "SELECT
IdProducto,
Nombre,
IdCategoriaProducto,
IdCondicionProducto,
IdTalleProducto,
IdDiseniadorProducto,
IdColorProducto,
DescripcionProducto,
ImagenProducto,
Precio,
NombreCat,
NombreCondicion,
NombreTalle,
NombreDiseniador,
NombreColor,
VerificarProducto,
IdDetalleCliente,
NombreCliente 
FROM productos
INNER JOIN categorias ON categorias.IdCategoria=productos.IdCategoriaProducto
INNER JOIN condicion ON condicion.IdCondicion=productos.IdCondicionProducto
INNER JOIN talles ON talles.IdTalle=productos.IdTalleProducto
INNER JOIN diseniadores ON diseniadores.IdDiseniador=productos.IdDiseniadorProducto
INNER JOIN colores ON colores.IdColor=productos.IdColorProducto
INNER JOIN clientes ON clientes.IdCliente=productos.IdDetalleCliente
where IdProducto='$id';  ";
$resProducto = mysqli_query($con, $queryProducto);
$row = mysqli_fetch_assoc($resProducto);
?>
  <!-- Default box -->
    <div class="card card-solid">
    <div class="card-body">
        <div class="row">
        <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none"><?php echo $row['Nombre'] ?></h3>
            <div class="col-12">
            <img src="fotos/<?php echo $row['ImagenProducto']; ?>" class="product-image">
            </div>
            <div class="col-12 product-image-thumbs">
            <div class="product-image-thumb active"><img src="admin/dist/img/prod-1.jpg" alt="Product Image"></div>
            <div class="product-image-thumb" ><img src="admin/dist/img/prod-2.jpg" alt="Product Image"></div>
            <div class="product-image-thumb" ><img src="admin/dist/img/prod-3.jpg" alt="Product Image"></div>
            <div class="product-image-thumb" ><img src="admin/dist/img/prod-4.jpg" alt="Product Image"></div>
            <div class="product-image-thumb" ><img src="admin/dist/img/prod-5.jpg" alt="Product Image"></div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h3 class="my-3"><?php echo $row['Nombre'] ?></h3>            
            <h5><?php echo $row['DescripcionProducto'] ?></h5>
            <h5>Diseñador: <?php echo $row['NombreDiseniador'] ?></h5>
            <h5>Talle: <?php echo $row['NombreTalle'] ?></h5>
            <h5>Color: <?php echo $row['NombreColor'] ?></h5>
            <h5>condicion: <?php echo $row['NombreCondicion'] ?></h5>

                     
            <div class="py-2 px-3 mt-4">
            <h2 class="mb-0">
                $<?php echo number_format ($row['Precio'],2,'.','');?> 
            </h2>            
            </div>

            <?php
            if ($idCliente == $row['IdDetalleCliente']) {
            ?>                               
                <button class="btn btn-primary btn-md btn-block" name="Editar" onclick="window.location='index.php?modulo=editarProducto&IdProducto=<?php echo $row['IdProducto'] ?>'">Editar Producto</button>             
                <button class="btn btn-secondary btn-md btn-block" name="Borrar" onclick="window.location='index.php?modulo=productos&IdBorrar=<?php echo $row['IdProducto'] ?>'">Borrar Producto</button>                                                                                                       
            <?php
            } else {
            ?> 
            <button class="btn btn-primary btn-md btn-block" name="Comprar" onclick="window.location='index.php?modulo=checkout&IdProducto=<?php echo $row['IdProducto'] ?>'">Comprar ahora</button> 
            <button class="btn btn-secondary btn-md btn-block" name="Favoritos" onclick="window.location='index.php?modulo=favoritos&IdProducto=<?php echo $row['IdProducto'] ?>'">Agregar a favoritos</button> 
            <?php
            }
            ?>                   

        </div>
        
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
