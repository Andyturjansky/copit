<?php
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
VerificarProducto 
FROM productos
INNER JOIN categorias ON categorias.IdCategoria=productos.IdCategoriaProducto
INNER JOIN condicion ON condicion.IdCondicion=productos.IdCondicionProducto
INNER JOIN talles ON talles.IdTalle=productos.IdTalleProducto
INNER JOIN diseniadores ON diseniadores.IdDiseniador=productos.IdDiseniadorProducto
INNER JOIN colores ON colores.IdColor=productos.IdColorProducto
 where IdProducto='$id';  ";
$resProducto = mysqli_query($con, $queryProducto);
$rowProducto = mysqli_fetch_assoc($resProducto);
?>
  <!-- Default box -->
    <div class="card card-solid">
    <div class="card-body">
        <div class="row">
        <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['Nombre'] ?></h3>
            <div class="col-12">
            <img src="fotos/<?php echo $rowProducto['ImagenProducto']; ?>" class="product-image">
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
            <h3 class="my-3"><?php echo $rowProducto['Nombre'] ?></h3>            
            <h5><?php echo $rowProducto['DescripcionProducto'] ?></h5>
            <h5>Diseñador: <?php echo $rowProducto['NombreDiseniador'] ?></h5>
            <h5>Talle: <?php echo $rowProducto['NombreTalle'] ?></h5>
            <h5>Color: <?php echo $rowProducto['NombreColor'] ?></h5>
            <h5>condicion: <?php echo $rowProducto['NombreCondicion'] ?></h5>

            <hr>         
            <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">
                $<?php echo $rowProducto['Precio'] //echo money format no funciona en windows?> 
            </h2>            
            </div>

            <div class="mt-4">
                <button class="btn btn-primary btn-md btn-flat" id="agregarCarrito"
                    data-id="<?php echo $_REQUEST['IdProducto'] ?>"
                    data-nombre="<?php echo $rowProducto['Nombre'] ?>"
                    data-web_path="<?php echo $rowProducto['ImagenProducto']; ?>"
                >
                <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                Agregar al carrito
                </button>   

            <div class="btn btn-default btn-md btn-flat">
                <i class="fas fa-heart fa-lg mr-2"></i> 
                Agregar a favoritos 
            </div>

            <!-- /.AgregarCarrito 
            <div class="mt-4">
                    Cantidad
                    <input type="number" class="form-control" id="cantidadProducto" value="1">
            </div>
            -->
            </div>

        </div>
        
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
