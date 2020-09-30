  <?php   

    if ($con == false) {
        echo "Error conexion" . mysqli_error($con);
    }

    if (isset($_REQUEST['Comprar'])) { 

      $idComprador = $_SESSION['IdCliente']; 
      $idVendedor = mysqli_real_escape_string($con, $_REQUEST['IdVendedor'] ?? '');   
      $fecha = date('Y-m-d h:m:s');
      $idProducto = mysqli_real_escape_string($con, $_REQUEST['IdProducto'] ?? '');
      $nombreProducto = mysqli_real_escape_string($con, $_REQUEST['NombreProducto'] ?? '');
      $precioProducto = mysqli_real_escape_string($con, $_REQUEST['PrecioProducto'] ?? '');
      $nombreApellido = mysqli_real_escape_string($con, $_REQUEST['NombreApellido'] ?? '');
      $calle = mysqli_real_escape_string($con, $_REQUEST['Calle'] ?? '');    
      $numero = mysqli_real_escape_string($con, $_REQUEST['Numero'] ?? '');  
      $departamento = mysqli_real_escape_string($con, $_REQUEST['Departamento'] ?? '');  
      $codigoPostal = mysqli_real_escape_string($con, $_REQUEST['CodigoPostal'] ?? '');  
      $provincia = mysqli_real_escape_string($con, $_REQUEST['Provincia'] ?? '');   
      $ciudad = mysqli_real_escape_string($con, $_REQUEST['Ciudad'] ?? '');  
      $telefono= mysqli_real_escape_string($con, $_REQUEST['Telefono'] ?? '');   
      $indicaciones = mysqli_real_escape_string($con, $_REQUEST['Indicaciones'] ?? '');      
      $emailComprador = mysqli_real_escape_string($con, $_REQUEST['EmailComprador'] ?? '');
      $emailVendedor = mysqli_real_escape_string($con, $_REQUEST['EmailVendedor'] ?? '');
      $nombreVendedor = mysqli_real_escape_string($con, $_REQUEST['NombreVendedor'] ?? '');
                     
      $queryVenta = "INSERT INTO ventas 
        (IdDetalleComprador,        IdDetalleVendedor,        Fecha,            IdDetalleProducto,              DetalleNombre,             DetallePrecio,           VentaNombreDestinatario,           VentaCalle,     VentaNumeroCalle,              VentaDeptoNum,                  VentaCodigoPostal,               	VentaProvincia,               VentaCiudad,             	VentaTelefono,              VentaIndicaciones,                  	DetalleEmailComprador,                DetalleEmailVendedor) VALUES
        ('" . $idComprador . "','" . $idVendedor . "','" . $fecha . "','" . $idProducto . "','" . $nombreProducto . "','" . $precioProducto . "','" . $nombreApellido . "','" . $calle . "','" . $numero . "','" . $departamento . "','" . $codigoPostal . "','" . $provincia . "','" . $ciudad . "','" . $telefono . "','" . $indicaciones . "','" . $emailComprador . "','" . $emailVendedor . "');
        ";   
    
      $res = mysqli_query($con,$queryVenta);    

      if ($res) {
          $id = mysqli_real_escape_string($con, $_REQUEST['IdProducto'] ?? '');
          $queryCantidad = $con -> query ("UPDATE productos set Cantidad = 0 WHERE IdProducto='$id';");
          
      // Varios destinatarios
      $paraComprador = $emailComprador; // atención a la coma
      $paraVendedor = $emailVendedor;
      // título
      $títuloComprador = 'Compraste '. $nombreProducto;
      $títuloVendedor = 'Vendiste '. $nombreProducto;

      // mensaje
      $mensajeComprador = '
      <html>
      <head>
        <title> Compraste' . $nombreProducto.'</title>
      </head>
      <body>
        <h2>Resumen de tu compra</h2>
        <p>Le compraste a <a href="">'. $nombreVendedor.'</a></p>
        <p>Pagaste: '. $precioProducto.'</p>     
        <p>Fecha: '. $fecha.'</p>        
      </body>
      </html>
      ';

      $mensajeVendedor = '
      <html>
      <head>
        <title> Vendiste' . $nombreProducto.'</title>
      </head>
      <body>
        <h2>Resumen de tu venta</h2>
        <p>Le vendiste a <a href="">'. $nombreApellido.'</a></p>
        <p>Cobraras: '. $precioProducto.'</p>     
        <p>Fecha: '. $fecha.'</p>        
      </body>
      </html>
      ';
      // Para enviar un correo HTML, debe establecerse la cabecera Content-type
      $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
      $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      // Cabeceras adicionales      
      $cabeceras .= 'From: Cop It <info@copit.com>' . "\r\n";
      
      

      // Enviarlo
      mail($paraComprador, $títuloComprador, $mensajeComprador, $cabeceras);
      mail($paraVendedor, $títuloVendedor, $mensajeVendedor, $cabeceras);


          echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=compraRealizada"/>  ';        
      } else {
      ?>
          <div class="alert alert-danger" role="alert">
              Error al publicar producto <?php echo mysqli_error($con); ?>
          </div>
      <?php
      }
    }
  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="css/aos.css">
   <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
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
    VerificarProducto,
    IdDetalleCliente,
    NombreCliente,
    Email,
    IdCliente  
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

    $idCliente = $_SESSION['IdCliente']; 
    $queryCliente= "SELECT
    NombreCliente,
    Telefono,
    Email,
    IdCliente
    From Clientes
    where IdCliente = '$idCliente'; ";
    $resCliente = mysqli_query($con, $queryCliente);
    $res = mysqli_fetch_assoc($resCliente);
    ?> 

    <div class="site-section">
      <div class="container">
        <div class="row mb-8">
          <div class="col-md-12">            
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Domicilio del destinatario</h2>
            <div class="p-3 p-lg-5 border">  
            <form method="post">              
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Nombre y apellido <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="NombreApellido" value="<?php echo $res['NombreCliente'] ?>" placeholder="Nombre y Apellido" required="required">
                </div>                
              </div>            

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Calle<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Calle" placeholder="Calle" required="required">
                </div>
              </div>     

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_numero" class="text-black">Número <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="Numero" placeholder="Número" required="required">
                </div>
                <div class="col-md-6">
                  <label for="c_departamento" class="text-black">Departamento (opcional)</label>
                  <input type="text" class="form-control"  name="Departamento" placeholder="Departamento (opcional)">
                </div>
              </div>        

              <div class="form-group row">
              <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Codigo postal<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="CodigoPostal" placeholder="Codigo Postal" required="required">
                </div>
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Provincia <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Provincia" placeholder="Provincia" required="required">
                </div>                
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Ciudad <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Ciudad" placeholder="Ciudad" required="required">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Teléfono <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="Telefono" placeholder="Teléfono" required="required">
                </div>
              </div>           

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Indicaciones adicionales para entregar tus compras en esta dirección (opcional)</label>
                <textarea name="Indicaciones" cols="30" rows="5" class="form-control" placeholder="Descripción de la fachada, puntos de referencia para encontrarla, nombre del barrio privado y lote, instrucciones de seguridad, etc."></textarea>
              </div>              
            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Detalles de su orden</h2>
                <div class="p-3 p-lg-3 border">
                
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <img class="card-img" src="fotos/<?php echo $row['ImagenProducto']; ?>" >
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo $row['Nombre'] ?></b></h5> 
                            <p class="card-text">Talle: <?php echo $row['NombreTalle'] ?></p>
                            <p class="card-text">Vendedor: 
                            <a href = ""> <?php echo $row['NombreCliente'] ?></a>
                            </p>                            
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">¿Cómo querés pagar?</h2>
                <div class="p-3 p-lg-3 border">
                  <table class="table site-block-order-table mb-5">                    
                    <tbody>
                      <tr>
                        <td>Producto</td>
                        <td>$<?php echo number_format ($row['Precio'],2,'.','');?></td>
                      </tr>
                      <tr>
                        <td class="text-green">Envío</td>
                        <td>Gratis</td>
                      </tr>                      
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Pagás</strong></td>
                        <td class="text-black font-weight-bold"><strong>$<?php echo number_format ($row['Precio'],2,'.','');?></strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>                

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <input type="hidden" name="IdVendedor" value="<?php echo $row['IdCliente'] ?>" >
                      <input type="hidden" name="IdProducto" value="<?php echo $row['IdProducto'] ?>" >
                      <input type="hidden" name="NombreProducto" value="<?php echo $row['Nombre'] ?>" >  
                      <input type="hidden" name="PrecioProducto" value="<?php echo $row['Precio'] ?>" >
                      <input type="hidden" name="EmailComprador" value="<?php echo $res['Email'] ?>" >    
                      <input type="hidden" name="EmailVendedor" value="<?php echo $row['Email'] ?>" >  
                      <input type="hidden" name="NombreVendedor" value="<?php echo $row['NombreCliente'] ?>" >                                      

                    <button type="submit" class="btn btn-primary btn-lg py-3 btn-block" name="Comprar">Realizar Compra</button> 
                                                                  
                                          
                  </div>

                  </form>
                  

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

    <?php //include("./footer.php"); ?> 
  </div>
  </body>
</html>