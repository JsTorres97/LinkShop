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

               

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                   

                    <?php include("../formatos/LateralCategorias.html");
                          ?>

                   

                    <!-- *** MENUS AND FILTERS END *** -->

                    
                </div>
                <?php
                        include("conexion.php");

                        $id_prod = $_GET['id'] ?? "";
                        $sql=mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS = $id_prod");
                        $valores = mysqli_fetch_array($sql);
                        $num_prod = $valores['ID_PRODUCTOS'];
                        $desc = $valores['DESCRIPCION'];
                        $nom = $valores['NOMBRE'];
                        $precio = $valores['PRECIO'];
                        $cantidad = $valores['EXISTENCIA'];
                        $pic = $valores['IMAGEN'];
                        $marca = $valores['MARCA'];
                        $origen = $valores['ORIGEN'];
                        $gen = $valores['CATEGORIA'];


                        ?>
                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                            <?php 
                                echo '<img src="data:img/productos/png;base64,'.base64_encode($pic).'" height="500" width="425"/>';
                            ?>                            
                            </div>

                          

                        </div>
                     
                       
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $nom; ?></h1>
                                <div align="center"><h5><?php echo $marca;?></h5></div>
                                </p>
                                <?php
                                    if($cantidad<10){
                                        echo '<div align="center"><p class="text-warning">Pocas Piezas</p></div>';

                                    }
                                ?>
                                <p class="price">$<?php echo $precio; ?></p>

                                <?php 
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            if(isset($_POST['agregar'])){
                                $cant = $_POST['cantidad'] ?? "";
                                $prod = $_POST['producto'] ?? "";
                                $id_usuario=$_SESSION['ID'];
                                $sql = "INSERT INTO carrito(ID_USUARIO_C, ID_PRODUCTO_C, CANTIDAD) VALUES($id_usuario, $prod, $cant);";
                                $insertar = mysqli_query($con,$sql);
                                
                                
                        }
                    }
                        ?>

                                <p class="text-center buttons">
                                    <?php
                                    if(!empty($_SESSION)){

                                    
                                    if($cantidad>0){?>
                                   
                                    <div align="center">
                                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                                            <input type="hidden" name="producto" value="<?php echo $num_prod; ?>">
                                            <input type="hidden" name="cantidad" value="1">
                                            <button type="submit" name="agregar" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Añadir al carrito</button>
                                    </form>
                                    </div>
                                    <?php
                                    }else{
                                        echo "No hay en existencia en este momento";
                                    }
                                }else{
                                        echo '<div align="center"><p class="alert alert-danger">Por favor inicia sesión o crea una cuenta para poder comprar </p></div>';
                                }
                                    ?>
                                </p>


                            </div >
                            <div class="box" id="details">
                            <h4>Descripción:</h4>
                            <p><?php echo $desc; ?></p>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                           
                            <h4>Marca:</h4>
                            <ul>
                                <li><?php echo $marca; ?></li>
                            </ul>
                            <h4>Origen:</h4>
                            <ul>
                                <li><?php echo $origen; ?></li>
                            </ul>
                            <h4>Género:</h4>
                            <ul>
                                <li><?php echo $gen; ?></li>
                            </ul>
                            <h4>Cantidad disponible:</h4>
                            <ul>
                                <li><?php
                                if($cantidad>0){
                                    echo $cantidad;
                                }else{
                                    echo "No hay en existencia";
                                } ?></li>
                            </ul>

                           
                    </div>

               

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <?php
        include("../formatos/footer.html");
        ?>





</body>

</html>