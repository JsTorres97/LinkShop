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
    <script type="../js/misscripts.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <title>
        Dunkers
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <?php
        include("../formatos/style.html");
    ?>

    <!-- theme stylesheet -->

    <!-- your stylesheet with modifications -->
    <?php
        include("../formatos/style2.html");
    ?>

    <link rel="shortcut icon" href="../favicon.png">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <?php
        include("../formatos/topbar.html");
    ?>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <?php
        include("../formatos/navbar.html");
    ?>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a >Inicio</a>
                        </li>
                        <li>Confirmar Datos</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        
                            <h1>Confirma tus datos</h1>
                            <?php
                                $subtotal = $_POST['subtotal'] ?? "";
                                $envio = $_POST['envio'] ?? "";
                                $total = $_POST['total'] ?? "";
                            ?>
                            <h2>Verifica tus datos:</h2>
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h3><label for="nombre">Nombre:</label></h3>
                                            <h4><label for="nom"><?php  echo $_SESSION['NOMBRE']." ".$_SESSION['APELLIDO']?></label></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h3><label for="direccion">Dirección:</label></h3>
                                            <h4><label for="dir"><?php echo $_SESSION['DIRECCION']; ?></label></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h3><label for="tarjeta">Tarjeta de crédito / débito:</label></h3>
                                            <h4><label for="tar"><?php echo $_SESSION['NUM_TARJETA']; ?></label></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h3><label for="cvv">CVV:</label></h3>
                                            <h4><input type="password" name="cvv"  class="form-control"></h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                               
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="carrito.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Regresar al carrito</a>
                                </div>
                                <div class="pull-right">
                                </div>
                            </div>
                        
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                  <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Resumen del pedido</h3>
                        </div>
                        <p class="text-muted">El tiempo de envío es de 3-5 días, dependiendo de la cantidad de productos.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Subtotal:</td>
                                        <th>$<?php echo $subtotal; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Envío:</td>
                                        <th>$<?php echo $envio; ?></th>
                                    </tr>
                                    
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$<?php echo $total; ?></th>
                                    </tr>
                                </tbody>
                                
                            </table>
                            <form action="./finalizar_compra.php" method="POST">
                            <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
                            <input type="hidden" name="envio" value="<?php echo $envio; ?>">
                            <input type="hidden" name="total" value="<?php echo $total; ?>">
                            <button type="submit" class="btn btn-primary">Pagar<i class="fa fa-chevron-right"></i>
                            </form>
                        </div>

                    </div>


                    

				    </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <?php
            include("../formatos/footer.html");
        ?>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>






</body>

</html>