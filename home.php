
                    <?php               
                     ini_set("display_errors", 0); // si lo pones en 1 muestra un error, funciona bien igual
                     ini_set("display_startup_errors", 0); //     
                    $where= "where 1=1 ";
                    $nombre= mysqli_real_escape_string($con,$_REQUEST['Nombre']??'');
                    if( empty($nombre)==false ){
                        $where="and Nombre LIKE '%".$nombre."%'";
                    }
                    /*$queryCuenta="SELECT COUNT(*) as cuenta FROM productos $where";
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
                    $limite=" limit $inicioLimite,$elementosPorPagina ";*/


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
            LIMIT 6
            ";
            $res = mysqli_query($con, $query); 
                       
            while ($row = mysqli_fetch_row($res)) {
                ?>                             
                
                
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="grid-item__content-wrapper">  
                  <div class="ps-shoe mb-30">
                  <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="fotos/<?php echo $row[8]; ?>" alt=""><a class="ps-shoe__overlay" href="product-detail.php?modulo=detalleProducto&IdProducto=<?php echo $row[0] ?>"></a>
                      </div>
                      <div class="ps-shoe__content">
                        <div class="ps-shoe__variants">
                          <!--<div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                          <select class="ps-rating ps-shoe__rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="2">5</option>
                          </select>-->
                        </div>
                        <div class="ps-shoe__detail"><label class="ps-shoe__name" href="#"><?php echo $row[1];?></label>
                          <p class="ps-shoe__categories"><a href="#"><?php echo $row[10]; ?></a>, <a href="#"><?php echo $row[13]; ?></a> </p><span class="ps-shoe__price">$<?php echo $row[9]; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            
 

            
                
                

            <?php
            }
            ?>           
</div>
</div>              