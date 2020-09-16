<div class="row mt-1">       
                    <?php               
                     ini_set("display_errors", 0); // si lo pones en 1 muestra un error, funciona bien igual
                     ini_set("display_startup_errors", 0); //     
                    $where= "where 1=1 ";
                    $nombre= mysqli_real_escape_string($con,$_REQUEST['Nombre']??'');
                    if( empty($nombre)==false ){
                        $where="and Nombre LIKE '%".$nombre."%'";
                    }
                    $queryCuenta="SELECT COUNT(*) as cuenta FROM productos $where ";
                    $resCuenta=mysqli_query($con,$queryCuenta);
                    $rowCuenta=mysqli_fetch_assoc($resCuenta);
                    $totalRegistros=$rowCuenta['cuenta'];

                    $elementosPorPagina=6;

                    $totalPaginas=ceil($totalRegistros/$elementosPorPagina);

                    $paginaSel=$_REQUEST['pagina']??false;

                    if($paginaSel==false){
                        $inicioLimite=0;
                        $paginaSel=1;
                    }else{
                        $inicioLimite=($paginaSel-1)* $elementosPorPagina;
                    }
                    $limite=" limit $inicioLimite,$elementosPorPagina ";


                    if ($con != true) {
                    die("Error de conexion " . mysqli_connect_error());
                    }

                    
            $query = "SELECT 
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
            $where 
            and productos.VerificarProducto = 1
            GROUP BY IdProducto
            $limite           
            "; 
            $res = mysqli_query($con, $query); 
                       
            while ($row = mysqli_fetch_row($res)) {
                ?>                             
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="container mt-3">
                    <div class="card">
                        <img src="fotos/<?php echo $row[8]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <label class="card-title"><?php echo $row[1];?></label>
                            <h5 class="card-text">
                                Diseñador: <?php echo $row[13]; ?>
                            </h5>
                            <h5 class="card-text">
                                Precio: <?php echo $row[9]; ?>
                            </h5>
                            <a href="index.php?modulo=detalleProducto&IdProducto=<?php echo $row[0] ?>" class="btn btn-primary">Acceder a la publicacion</a>
                        </div>
                    </div>
                    </div>
                </div>            
            <?php
            }
            ?>           
                </div>
                <?php
                if($totalPaginas>0){
                ?>
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <?php
                            if( $paginaSel!=1 ){
                        ?>
                        <li class="page-item">
                          <a class="page-link" href="index.php?modulo=home&pagina=<?php echo ($paginaSel-1); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <?php
                        }
                        ?>

                        <?php
                        for($i=1;$i<=$totalPaginas;$i++){
                        ?>
                        <li class="page-item <?php echo ($paginaSel==$i)?" active ":" "; ?>">
                            <a class="page-link" href="index.php?modulo=home&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                            if( $paginaSel!=$totalPaginas ){
                        ?>
                        <li class="page-item">
                          <a class="page-link" href="index.php?modulo=home&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                        <?php
                            }
                        ?>
                      </ul>
                    </nav>
            <?php
            }
            ?>