<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Sky - Product Listing</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="css/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body class="ps-loading">
    <div class="header--sidebar"></div>
    <header class="header">
      
      <script type="text/javascript" 
      src="http://www.iccila.com.br/js/plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js">
    </script>
    <script type="text/javascript" 
      src="http://www.iccila.com.br/js/plugins/revslider/public/assets/js/extensions/revolution.extension.migration.min.js">
    </script>






<?php
include_once "admin/dbCopIt.php";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database); 
?>




      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>Envíos con normalidad sin contacto. <a href="#">Más información.</a> </p>
                  




                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <div class="header__actions"><a href="#">Iniciar Sesión</a>
                  <div class="header__actions"><a href="#">Registrarse</a>
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ARS<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#"><img src="images/flag/argentina.svg" alt=""> ARS</a></li>
                        <li><a href="#"><img src="images/flag/usa.svg" alt=""> USD</a></li>
                        <li><a href="#"><img src="images/flag/brazil.png" alt=""> BRL</a></li>
                      </ul>
                    </div>

                    
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Idioma<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Español</a></li>
                        <li><a href="#">English</a></li>
                        <li><a href="#">Português</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>








      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a href= "index.php" class="ps-logo" href="index.php"><img src="images/logo.png" alt=""></a></div>
          </div>





<!--BUSCAR PRODUCTO-->
          <div class="navigation__column center">
            <form class="ps-search--header" action="product-listing.php" method="post">
              <input class="form-control" type="search" placeholder="Buscar productos..." name="Nombre" value=<?php echo $_REQUEST['Nombre']??'';?> >
              <input type="hidden" name="modulo" value="home">
              <button type = "submit"><i class="ps-icon-search"></i></button>
            </form>
          </div>
          





          <div class="navigation__column left">
            <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i>20</i></span><i class="ps-icon-shopping-cart"></i></a>
              <div class="ps-cart__listing">
                <div class="ps-cart__content">
                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                    <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/cart-preview/1.jpg" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">Producto</a>
                      <p><span>Cantidad:<i>12</i></span><span>Total:<i>£999</i></span></p>
                    </div>
                  </div>
                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                    <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/cart-preview/2.jpg" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">The Crusty Croissant</a>
                      <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                    </div>
                  </div>
                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                    <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/cart-preview/3.jpg" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">The Rolling Pin</a>
                      <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                    </div>
                  </div>
                </div>

                



                <div class="ps-cart__total">
                  <p>Number of items:<span>36</span></p>
                  <p>Item Total:<span>£528.00</span></p>
                </div>

                
                <div class="ps-cart__footer"><a class="ps-btn" href="cart.html">Check out<i class="ps-icon-arrow-left"></i></a></div>
              </div>
            </div>
          </div> 
          
          <div class="menu-toggle"><span></span></div>
          
        </div>
      </nav>
    </header>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Envío gratis</strong> en todas las compras que superen los $5000,00</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Envío gratis</strong> en todas las compras que superen los $5000,00</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Envío gratis</strong> en todas las compras que superen los $5000,00</p>
      </div>
    </div>
    <main class="ps-main">
      <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-product-action">
            <div class="ps-product__filter">
              <select class="ps-select selectpicker">
                <option value="1">Shortby</option>
                <option value="2">Name</option>
                <option value="3">Price (Low to High)</option>
                <option value="3">Price (High to Low)</option>
              </select>
            </div>
          </div>
          <?php
                $modulo=$_REQUEST['modulo']??'';
                if($modulo=="home" || $modulo=="" ){
                    include_once "busqueda.php";
                }
          ?>

        </div>
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Categoria</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li><a href="product-listing.php">Zapatillas</a></li>
                <li><a href="product-listing.php">Camperas</a></li>
                <li><a href="product-listing.php">Buzos</a></li>
                <li><a href="product-listing.php">Remeras</a></li>
                <li><a href="product-listing.php">Accesorios</a></li>
                <li><a href="product-listing.php">Nadie</a></li>
              </ul>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--filter">
            <div class="ps-widget__header">
              <h3>Precio</h3>
            </div>
            <div class="ps-widget__content">
            <form class="ps-widget__content" action="product-listing.php" method="post">
              <div class="ac-slider" data-default-min="0" data-default-max="100000" data-max="100000" data-step="1000" data-unit="$"></div>
              <input type="hidden" id="min_price_hide" name="Precio1" value=<?php echo $_REQUEST['Precio1']??'';?> />
              <input type="hidden" id="max_price_hide" name="Precio2" value=<?php echo $_REQUEST['Precio2']??'';?>/>
              <input type="hidden" name="modulo" value="home">
              <p class="ac-slider__meta">Precio:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p>
              <button type = "submit"><a class="ac-slider__filter ps-btn" href="#">Filtrar</a></button>
            </form>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Marca</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li><a href="product-listing.html">Nike</a></li>
                <li><a href="product-listing.html">Adidas</a></li>
                <li><a href="product-listing.html">Bape</a></li>
                <li><a href="product-listing.html">Gucci</a></li>
                <li><a href="product-listing.html">Dior</a></li>
                <li><a href="product-listing.html">B&G</a></li>
                <li><a href="product-listing.html">Louis Vuiton</a></li>
              </ul>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Talle</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li><a href="product-listing.html">Small</a></li>
                <li><a href="product-listing.html">Medium</a></li>
                <li><a href="product-listing.html">Large</a></li>
                <li><a href="product-listing.html">Extra Large</a></li>
              </ul>
            </div>
          </aside>
          <div class="ps-sticky desktop">
            <aside class="ps-widget--sidebar">
              <div class="ps-widget__header">
                <h3>Talle</h3>
              </div>
              <div class="ps-widget__content">
                <table class="table ps-table--size">
                  <tbody>
                    <tr>
                      <td>3</td>
                      <td>5.5</td>
                      <td>8</td>
                      <td>10.5</td>
                      <td>13</td>
                    </tr>
                    <tr>
                      <td>3.5</td>
                      <td>6</td>
                      <td>8.5</td>
                      <td>11</td>
                      <td>13.5</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>6.5</td>
                      <td>9</td>
                      <td>11.5</td>
                      <td>14</td>
                    </tr>
                    <tr>
                      <td>4.5</td>
                      <td>7</td>
                      <td>9.5</td>
                      <td>12</td>
                      <td>14.5</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>7.5</td>
                      <td>10</td>
                      <td>12.5</td>
                      <td>15</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </aside>
            <aside class="ps-widget--sidebar">
              <div class="ps-widget__header">
                <h3>Color</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--color">
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                </ul>
              </div>-
            </aside>
          </div>
          <!--aside.ps-widget--sidebar-->
          <!--    .ps-widget__header: h3 Ads Banner-->
          <!--    .ps-widget__content-->
          <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
          <!---->
          <!--aside.ps-widget--sidebar-->
          <!--    .ps-widget__header: h3 Best Seller-->
          <!--    .ps-widget__content-->
          <!--        - for (var i = 0; i < 3; i ++)-->
          <!--            .ps-shoe--sidebar-->
          <!--                .ps-shoe__thumbnail-->
          <!--                    a(href='#')-->
          <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
          <!--                .ps-shoe__content-->
          <!--                    if i == 1-->
          <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
          <!--                    else if i == 2-->
          <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
          <!--                    else-->
          <!--                        a(href='#').ps-shoe__title Men's Sky-->
          <!--                    p <del> £253.00</del> £152.00-->
          <!--                    a(href='#').ps-btn PURCHASE-->
        </div>
      </div>
      <div class="ps-footer bg--cover" data-background="images/background/parallax.jpg">
        <div class="ps-footer__content">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                      <header><a class="ps-logo" href="index.html"><img src="images/logo-white.png" alt=""></a>
                        <h3 class="ps-widget__title">Address Office 1</h3>
                      </header>
                      <footer>
                        <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                        <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                        <p>Phone: +323 32434 5334</p>
                        <p>Fax: ++323 32434 5333</p>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info second">
                      <header>
                        <h3 class="ps-widget__title">Address Office 2</h3>
                      </header>
                      <footer>
                        <p><strong>PO Box 16122 Collins  Victoria 3000 Australia</strong></p>
                        <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                        <p>Phone: +323 32434 5334</p>
                        <p>Fax: ++323 32434 5333</p>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Find Our store</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--link">
                          <li><a href="#">Coupon Code</a></li>
                          <li><a href="#">SignUp For Email</a></li>
                          <li><a href="#">Site Feedback</a></li>
                          <li><a href="#">Careers</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Get Help</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="#">Order Status</a></li>
                          <li><a href="#">Shipping and Delivery</a></li>
                          <li><a href="#">Returns</a></li>
                          <li><a href="#">Payment Options</a></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Products</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">Clothing</a></li>
                          <li><a href="#">Accessries</a></li>
                          <li><a href="#">Football Boots</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
            </div>
          </div>
        </div>
        <div class="ps-footer__copyright">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a href="#">SKYTHEMES</a>, Inc. All rights Resevered. Design by <a href="#"> Alena Studio</a></p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- JS Library-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="plugins/gmap3.min.js"></script>
    <script type="text/javascript" src="plugins/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="plugins/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="plugins/slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="plugins/elevatezoom/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script><script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>