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
                        <li><a >Inicio</a>
                        </li>
                        <li>Ventas</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <?php
                    include("../formatos/menuadmin.html");
                    ?>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>Ventas</h1>

                        <p class="lead">Aquí puedes visuaizar los pedidos.</p>
                        <hr>
                        

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Orden</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $res=mysqli_query($con,"SELECT DISTINCT TICKET FROM  historial");
                                     while($row = mysqli_fetch_array($res)){
                                         $ticket = $row['TICKET'];
                                         $res1=mysqli_query($con,"SELECT * FROM historial WHERE TICKET = $ticket");
                                            while($row2=mysqli_fetch_array($res1)){
                                                $fecha = $row2['FECHA'];
                                                $id_producto = $row2['ID_PRODUCTO_H'];
                                                $estado = $row2['ESTADO'];
                                                $res2=mysqli_query($con,"SELECT * FROM productos WHERE ID_PRODUCTOS = $id_producto");
                                                $row3=mysqli_fetch_array($res2);
                                                $total = $row3['PRECIO'];
                                                $totalticket=0;
                                                $totalticket = $totalticket+$total;

                                                echo '
                                                <tr>
                                                <th>'.$ticket.'</th>
                                                <td>'.$fecha.'</td>
                                                <td> $'.$totalticket.'</td>';
                                                if($estado==1){
                                                    echo'<td><span class="label label-primary">Recibido</span></td>';
                                                }else if($estado==2){
                                                    echo '<td><span class="label label-info">Procesado</span></td>';
                                                }else if($estado==3){
                                                    echo '<td><span class="label label-success">Enviado</span></td>';
                                                }else if($estado==4){
                                                    echo '<td><span class="label label-danger">Cancelado</span></td>';
                                                }
                                                echo '
                                                <td>
                                                <form action="detalledeventa.php" method="GET">
                                                <input type="hidden" name="ticket" value="'.$ticket.'">
                                                <input type="hidden" name="subtotal" value="'.$totalticket.'">
                                                <button type="submit" class="btn btn-primary btn-sm">Detalles</button>
                                                </form>
                                                </td>
                                                </tr>';
                                                
                                                
                                            }
                                     }
                                    ?>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
