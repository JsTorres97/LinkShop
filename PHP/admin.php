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

                <div class="col-md-9" id="wishlist">

                    <ul class="breadcrumb">
                        <li><a href="#">Inicio</a>
                        </li>
                        <li>Administrador</li>
                    </ul>

                    <div class="box">
                        <h1>Bienvenido <?php 
                        
                        echo $_SESSION['NOMBRE'];
                        echo " ";
                        echo  $_SESSION['APELLIDO'];
                        ?></h1>
                        <p class="lead">Estás en la página de administrador de marca, selecciona la opción que deseas.</p>
                        <p>Aquí están todos los productos que hay en el inventario.</p>

                        <?php
                        include("conexion.php");

                        $res=mysqli_query($con,"SELECT * FROM  productos");
                        echo "<div class='table-reponsive'>";
                        echo "<table class='table'>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>NOMBRE</th>";
                            echo "<th>DESCRIPCION</th>";
                            echo "<th>IMAGEN</th>";
                            echo "<th>PRECIO</th>";
                            echo "<th>STOCK</th>";
                            echo "<th>MARCA</th>";
                            echo "<th>ORIGEN</th>";
                            echo "<th>CATEGORIA</th>";                            
                            echo "<th>TIPO</th>";                            
                        echo "</tr>";
                        
                        while($row=mysqli_fetch_array($res)){
                            echo "<tr>";
                            echo "<td>";
                                echo $row['ID_PRODUCTOS'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['NOMBRE'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['DESCRIPCION'];
                            echo "</td>";
                            echo "<td>";
                                echo '<img src="data:img/productos/png;base64,'.base64_encode($row['IMAGEN'] ).'" height="100" width="125"/>';
                            echo "</td>";
                            echo "<td>";
                                echo "$";
                                echo $row['PRECIO'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['EXISTENCIA'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['MARCA'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['ORIGEN'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['CATEGORIA'];
                            echo "</td>";
                            echo "<td>";
                                echo $row['TIPO'];
                            echo "</td>";
                            echo "</tr>";                                                                                                                                                                                                  
                        }
                        
                        echo "</table>";
                        echo "</div>";

                        ?>

                    </div>

                    
                    <!-- /.products -->

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