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
    <?php include("../formatos/style.html");
    ?>

    <!-- theme stylesheet -->
   <?php include("../formatos/style2.html");
   ?>

    <link rel="shortcut icon" href="../favicon.png">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <?php include("../formatos/topbar.html");
    ?>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <?php include("../formatos/navbar.html");
    ?>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

             

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <?php include("../formatos/LateralCategorias.html");
                    ?>


                  

                    <!-- *** MENUS AND FILTERS END *** -->

                    
                </div>
                <?php
                    $tipo = $_GET['Tipo'] ?? "";
                    $gen = $_GET['Genero'] ?? "";
                ?>

                <div class="col-md-9">
                    <div class="box">
                        <h1><?php echo $tipo; ?></h1>
                        <h2><?php echo $gen; ?></h2>
                    </div>

                   
                    <div class="row products">
                   <?php
                       
                       $prductos=mysqli_query($con,"SELECT * FROM productos WHERE CATEGORIA='$gen' AND TIPO='$tipo'");
                       while($row=mysqli_fetch_array($prductos)){
                        echo ' 
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product">
                                   
                                            <div class="flip-container">
                                                <div class="flipper">
                                                    <div class="front">
                                                   <a>
                                                        <img src="data:img/productos/png;base64,'.base64_encode($row['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                                    </a>
                                                    </div>
                                                </div>
                                            </div><br><br><br><br><br><br><br><br><br><br><br><br>
                                     
                                      
                                            <div class="text">
                                                <h3><a></a>'.$row['NOMBRE'].'</a></h3>';
                                                
                                                
                                            echo  '<p class="price">$'.$row['PRECIO'].'</p>
                                                <p class="buttons">
                                                <form action="detail.php" method="GET">
                                                    <input type="hidden" name="id" value="'.$row['ID_PRODUCTOS'].'">
                                                    <div align="center"><button type="submit"class="btn btn-primary" align="center">Detalles</button></div>
                                                </p>
                                                </form>
                                            </div>
                                      
                                        </div>

                                    </div>';
                       }

                       ?>
                            </div>

                    <!-- /.products -->



                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <?php include("../formatos/footer.html");
        ?>






</body>

</html>