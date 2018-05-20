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

    <title>
        Dunkers
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <?php
    include("./../formatos/style.html");
    ?>

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <?php
    include("./../formatos/style2.html");
    ?>

    <script src="./../js/respond.min.js"></script>

    <link rel="shortcut icon" href="../favicon.png">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
 <?php
   include("./../formatos/topbar.html");

   ?>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <?php
    include("./../formatos/navbar.html");
    ?>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.html">Incio</a>
                        </li>
                        <li>Administrador</li>
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

                <div class="col-md-9">
                    <div class="box">
                        <h1>Reporte por ticket</h1>
                        <p class="lead">Ver productos por ticket</p>

                        <h3>Lista de tikcets:</h3>
                        <!--Aqui selecciono el id del select segun el valor -->
                       
                        <!--Aqui se define el combobox que tiene el id del producto y su nombre-->
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="select" name="ticket">
                                        <?php
                                            include("conexion.php");
                                            $res=mysqli_query($con,"SELECT DISTINCT TICKET FROM  historial");
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<option value="'.$row['TICKET'].'">'.$row['TICKET'].'</option>';
                                                
                                            }

                                        ?>
                                         </select>
                                            
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="obtener" class="btn btn-primary"><i class="fa fa-save"></i>Buscar información</button>
                            </div>
                        </form>
                        <?php
                        
                            
                       
                            if(isset($_POST['obtener'])){
                                $id_ticket = $_POST['ticket'];
                                $sql=mysqli_query($con, "SELECT * FROM historial WHERE TICKET = '$id_ticket'");
                               
                               
                                while( $row3 = mysqli_fetch_array($sql)){
                                    $id_prod=$row3['ID_PRODUCTO_H'];
                                    $qprod=mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS = '$id_prod'");
                                    $infoprod=mysqli_fetch_array($qprod);
                                    echo '
                                    <div class="col-md-9" id="basket">
                                    <div class="box" >
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
                                        <tr>
                                        <td>
                                            <a>
                                            <img src="data:img/productos/png;base64,'.base64_encode($infoprod['IMAGEN']).'"  class="img-responsive"/>
                                            </a>
                                        </td>
                                        <td><a>'.$infoprod['NOMBRE'].'</a>
                                        </td>
                                        <td>
                                        '.$row3['CANTIDAD'].'
                                        </td>
                                        <td>$'.$infoprod['PRECIO'].'</td>
                                        <td></td>
                                        <td>$'.$infoprod['PRECIO'].'</td>
                                        <td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                        
                                        ';
                                    }
                                
                            
                        }?>
                        
                        
                      

                        <hr>
                        
                        
                       
                       
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
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        



</body>

</html>