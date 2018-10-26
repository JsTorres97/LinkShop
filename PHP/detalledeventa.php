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
    <?php
        include("../formatos/style.html");
    ?>

    <!-- theme stylesheet -->
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
                        <li><a href="index.html">Inicio</a>
                        </li>
                        <li><a href="#">Ventas</a>
                        </li>
                        <li>Orden # <?php echo $_GET['ticket']; ?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                   <?php
                   include("../formatos/menuadmin.html");
                   $totalc=0;
                   ?>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>Orden #<?php echo $_GET['ticket']; ?></h1>
                        <?php
                            $tick = $_GET['ticket'];
                            $cons = mysqli_query($con, "SELECT * FROM historial WHERE TICKET = '$tick'");
                            $resti = mysqli_fetch_array($cons);
                            $id_estado = $resti['ESTADO'];
                            $cones = mysqli_query($con, "SELECT * FROM estados WHERE ID_ESTADOS='$id_estado'");
                            $reses = mysqli_fetch_array($cones);
                            $txtestado = $reses['ESTADO'];
                        ?>
                        <p class="lead">Te mostramos el detalle de la orden</p>
                        <p>El estado actual de tu pedido es <?php echo $txtestado; ?></p>
                        <p>Cambiar estado del pedido:</p>
                        <?php
                        if(isset($_POST['cambiar'])){

                        
                            $nestado = $_POST['estados'];
                            $actualizar = mysqli_query($con, "UPDATE historial SET ESTADO =$nestado WHERE TICKET=$tick");
                            echo '<div class="alert alert-success">
                            <strong>Actualizado con exito</strong> 
                          </div>';
                        }
                        ?>


                        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="select" name="estados">
                                        <?php
                                            include("conexion.php");
                                            $res4=mysqli_query($con,"SELECT * FROM  estados");
                                            while($row = mysqli_fetch_array($res4)){
                                                echo '<option value="'.$row['ID_ESTADOS'].'">'.$row['ESTADO'].'</option>';
                                                
                                            }

                                        ?>
                                         </select>
                                            
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="cambiar" class="btn btn-primary"><i class="fa fa-save"></i>Actualizar</button>
                            </div>
                        </form>

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
                                    $ticket = $_GET['ticket'];
                                        $compra = mysqli_query($con, "SELECT * FROM historial WHERE TICKET=$ticket"); 
                                        while($rowcompra=mysqli_fetch_array($compra)){
                                            $usuario = $rowcompra['ID_USUARIO_H'];
                                            $qdatos = mysqli_query($con, "SELECT * FROM usuarios WHERE ID_USUARIOS=$usuario");
                                            $datos = mysqli_fetch_array($qdatos);
                                            $prod=$rowcompra['ID_PRODUCTO_H'];
                                            $conprod = mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS=$prod");
                                                while($rprod = mysqli_fetch_array($conprod)){
                                                    
                                                    $totalc = $totalc+$rprod['PRECIO'];
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
                                        <th>$<?php echo $totalc; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Envío</th>
                                        <th>$<?php echo $envio=120; ?></th>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>$<?php echo $envio+$totalc; ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-6">
                                <h2>Dirección de facturación</h2>
                                <p><?php echo $datos['DIRECCION']; ?></p>
                                    
                            </div>
                            <div class="col-md-6">
                                <h2>Dirección de envío</h2>
                                <p><?php echo $datos['DIRECCION']; ?></p>
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
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="text.html">About us</a>
                            </li>
                            <li><a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.html">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Men</h5>

                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Shirts</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <h5>Ladies</h5>
                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Skirts</a>
                            </li>
                            <li><a href="category.html">Pants</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Obaju Ltd.</strong>
                            <br>13/25 New Avenue
                            <br>New Heaven
                            <br>45Y 73J
                            <br>England
                            <br>
                            <strong>Great Britain</strong>
                        </p>

                        <a href="contact.html">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a> & <a href="https://fity.cz">Fity</a>
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
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
