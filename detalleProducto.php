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






    <main class="ps-main">
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">
                    <div class="item"><img src="fotos/<?php echo $rowProducto['ImagenProducto']; ?>" alt=""></div>
                    <div class="item"><img src="images/shoe-detail/2.jpg" alt=""></div>
                    <div class="item"><img src="images/shoe-detail/3.jpg" alt=""></div>
                    <div class="item"><img src="images/shoe-detail/3.jpg" alt=""></div>
                    <div class="item"><img src="images/shoe-detail/3.jpg" alt=""></div>
                  </div><a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="images/shoe-detail/1.jpg" alt=""><i class="fa fa-play"></i></a>
                </div>
                <div class="ps-product__image">
                  <div class="item"><img class="zoom" src="fotos/<?php echo $rowProducto['ImagenProducto']; ?>" alt="" data-zoom-image="fotos/<?php echo $rowProducto['ImagenProducto']; ?>"></div>
                  <div class="item"><img class="zoom" src="images/shoe-detail/2.jpg" alt="" data-zoom-image="images/shoe-detail/2.jpg"></div>
                  <div class="item"><img class="zoom" src="images/shoe-detail/3.jpg" alt="" data-zoom-image="images/shoe-detail/3.jpg"></div>
                </div>
              </div>
              <div class="ps-product__thumbnail--mobile">
                <div class="ps-product__main-img"><img src="fotos/<?php echo $rowProducto['ImagenProducto']; ?>" alt=""></div>
                <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="images/shoe-detail/1.jpg" alt=""><img src="images/shoe-detail/2.jpg" alt=""><img src="images/shoe-detail/3.jpg" alt=""></div>
              </div>
              <div class="ps-product__info">
                <div class="ps-product__rating">
                  <select class="ps-rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select><a><?php echo $rowProducto['NombreCondicion'] ?></a>
                </div>

                <p>Color: <?php echo $rowProducto['NombreColor'] ?></p>
                <h1><?php echo $rowProducto['Nombre'] ?></h1>
                <p class="ps-product__category"><a href="#"> <?php echo $rowProducto['NombreCat'] ?></a>, <a href="#"> <?php echo $rowProducto['NombreDiseniador'] ?></a></p>
                <h3 class="ps-product__price">$<?php echo $rowProducto['Precio'] //echo money format no funciona en windows?> </h3>
                <div class="ps-product__block ps-product__quickview">
                  <h4>DESCRIPCIÓN</h4>
                  <p><?php echo $rowProducto['DescripcionProducto'] ?></p>
                </div>
                <!--<div class="ps-product__block ps-product__style">
                  <h4>CHOOSE YOUR STYLE</h4>
                  <ul>
                    <li><a href="product-detail.html"><img src="images/shoe/sidebar/1.jpg" alt=""></a></li>
                    <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                    <li><a href="product-detail.html"><img src="images/shoe/sidebar/3.jpg" alt=""></a></li>
                    <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                  </ul>
                </div>-->
                <div class="ps-product__block ps-product__size">
                    <br>
                    <br>
                  <h4>TALLE: <?php echo $rowProducto['NombreTalle'] ?></h4>
                  <!--
                  <select class="ps-select selectpicker">
                    <option value="1">Select Size</option>
                    <option value="2">4</option>
                    <option value="3">4.5</option>
                    <option value="3">5</option>
                    <option value="3">6</option>
                    <option value="3">6.5</option>
                    <option value="3">7</option>
                    <option value="3">7.5</option>
                    <option value="3">8</option>
                    <option value="3">8.5</option>
                    <option value="3">9</option>
                    <option value="3">9.5</option>
                    <option value="3">10</option>
                  </select>
-->
                  
                </div>
                <div class="ps-product__shopping"><a class="ps-btn mb-10" href="cart.html">AÑADIR AL CARRITO<i class="ps-icon-next"></i></a>
                  <div class="ps-product__actions"><a class="mr-10" href="whishlist.html"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="ps-product__content mt-50">
                <ul class="tab-list" role="tablist">
                  <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Acerca del vendedor</a></li>
                </ul>
              </div>
              <div class="tab-content mb-60">
                <div class="tab-pane active" role="tabpanel" id="tab_01">
                <h1><b>HUNTD</b></h1>
                  <p>Somos la primera & mas grande tienda de reventa & consignación dedicada 100% al Hype, al Streetwear & a la Cultura SneakHead.</p>
                  <p>Nuestra Tienda Fisica esta ubicada en los Estados Unidos en la ciudad de Miami Beach, Florida. lo cual nos permite conectarte con el principal mercado de Hype & Streetwear del mundo.</p>
                  <p>En Argentina nos dedicamos exclusivamente a traer semanalmente pedidos de todas las grandes marcas por encargo. Ademas te ofrecemos el servicio de consignación Nro 1 de Argentina</p>
                
                </div>
                
                <div class="tab-pane" role="tabpanel" id="tab_04">
                  <div class="form-group">
                    <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
                  </div>
                  <div class="form-group">
                    <button class="ps-btn" type="button">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

