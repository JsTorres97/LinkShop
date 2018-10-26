<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <title>
        Dunkers
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <?php include("../formatos/style.html");
    ?>

    <!-- theme stylesheet -->

    <!-- your stylesheet with modifications -->
    <?php include("../formatos/style2.html"); ?>

    <link rel="shortcut icon" href="../favicon.png">



</head>

<body>
              
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <?php include("../formatos/topbar.html"); ?>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
                
 _________________________________________________________ -->

  
    <!-- /#navbar -->
    <?php include("../formatos/navbar.html"); ?>

    <!-- *** NAVBAR END *** -->

    <?php
                    $id_usuario = $_SESSION['ID'];
                    $ticket=date("d")."".date("N")."".date("m")."".date("Y")."".date("H")."".date("i")."".date("s");
                    $carrito = mysqli_query($con,"SELECT * FROM carrito WHERE ID_USUARIO_C=$id_usuario");
                    while($hist=mysqli_fetch_array($carrito)){
                        $idprod = $hist['ID_PRODUCTO_C'];
                        $cant = $hist['CANTIDAD'];
                        $inserthist = mysqli_query($con, "INSERT INTO historial(ID_PRODUCTO_H, ID_USUARIO_H, TICKET, CANTIDAD, ESTADO) VALUES('$idprod', '$id_usuario', '$ticket','$cant', '1')");
                            $producto=mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS=$idprod");
                                while($rowproducto=mysqli_fetch_array($producto)){
                                    $nuevacantidad = $rowproducto['EXISTENCIA']-$cant;
                                    $actualizar = mysqli_query($con,"UPDATE productos SET EXISTENCIA=$nuevacantidad WHERE ID_PRODUCTOS=$idprod");
                                }
                    }
                    $eliminarcarrito = mysqli_query($con,"DELETE FROM carrito WHERE ID_USUARIO_C=$id_usuario");
                ?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a>Inicio</a>
                        </li>
                        <li><a href="#">Mi compra</a>
                        </li>
                        <li><?php
                            
                            echo $ticket;
                        ?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>
               
                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>Orden #<?php echo $ticket; ?></h1>

                        <p class="lead">Gracias por tu pedido.<strong>Tu orden tiene fecha de <?php echo date("d")."/".date("m")."/".date("Y"); ?></strong> y está listo para ser enviado. <strong>De 3-5 días háblies lo tendrás en tu casa.</strong>.</p>
                        <div class="alert alert-success">
                            <strong>Compra realizada con exito!</strong>.
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                            <thead>
                                        <tr>
                                            <th colspan="2">Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>    </th>
                                            <th colspan="2">Total</th>
                                        </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $compra = mysqli_query($con, "SELECT * FROM historial WHERE ID_USUARIO_H=$id_usuario AND TICKET=$ticket"); 
                                        while($rowcompra=mysqli_fetch_array($compra)){
                                            $prod=$rowcompra['ID_PRODUCTO_H'];
                                            $conprod = mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS=$prod");
                                                while($rprod = mysqli_fetch_array($conprod)){
                                                    echo ' 
                                                        <tr>
                                                        <td>
                                                            <a>
                                                            <img src="data:img/productos/png;base64,'.base64_encode($rprod['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                                            </a>
                                                        </td>
                                                        <td><a>'.$rprod['NOMBRE'].'</a>
                                                        </td>
                                                        <td>'.$rowcompra['CANTIDAD'].'</td>
                                                        <td>$'.$rprod['PRECIO'].'</td>
                                                        <td></td>
                                                        <td>$'.$rprod['PRECIO'].'</td>
                                                    </tr>';

                                                }
                                            
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Subtotal</th>
                                        <th>$<?php echo $_POST['subtotal']; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Envío</th>
                                        <th>$<?php echo $_POST['envio']; ?></th>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>$<?php echo $_POST['total']; ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-6">
                                <h2>Dirección de facturación</h2>
                                <p><?php echo $_SESSION['DIRECCION']; ?></p>
                                    
                            </div>
                            <div class="col-md-6">
                                <h2>Dirección de envío</h2>
                                <p><?php echo $_SESSION['DIRECCION']; ?></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
       <?php include("../formatos/footer.html"); ?>



</body>

</html>
