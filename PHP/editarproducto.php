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
                        <li><a href="#">Inicio</a>
                        </li>
                        <li>Editar Producto</li>
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
                        <h1>Editar Producto</h1>
                        <p class="lead">Seleccione el producto a editar</p>

                        <h3>Lista de productos:</h3>
                        <!--Aqui selecciono el id del select segun el valor -->
                       
                        <!--Aqui se define el combobox que tiene el id del producto y su nombre-->
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="select" name="modelo">
                                        <?php
                                            include("conexion.php");
                                            $res=mysqli_query($con,"SELECT * FROM  productos");
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<option value="'.$row['ID_PRODUCTOS'].'">'.$row['NOMBRE'].'</option>';
                                                
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
                                $id_prod = $_POST['modelo'];
                                $sql=mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS = '$id_prod'");
                                $valores = mysqli_fetch_array($sql);
                                $num_prod = $valores['ID_PRODUCTOS'];
                                $_SESSION['llave'] = $num_prod;
                                $nom = $valores['NOMBRE'];
                                $precio = $valores['PRECIO'];
                                $cantidad = $valores['EXISTENCIA'];
                                $pic = $valores['IMAGEN'];
                            
                        }
                        ?>
                        <?php
                        $control=0;
                            if(isset($_POST['actualizar'])){
                                $id = $_SESSION['llave'];
                                $precio = $_POST['precio'];
                                $cantidad = $_POST['cantidad'];
                                if(!empty($precio) && !empty($cantidad)){

                                
                                $sql2 = mysqli_query($con, "UPDATE productos SET PRECIO='$precio', EXISTENCIA='$cantidad' WHERE ID_PRODUCTOS='$id'");
                                $control = 1;

                            }else{
                                $control = 2;
                            }
                        }
                        ?>
                      

                        <hr>

                        <h3>Información del producto:</h3>
                        <h2><?php
                        if(empty($nom)){
                            echo "";
                        }else{
                            echo "<table class='table'>";
                            echo "<tr>";
                            echo "<td>";
                            echo $nom;
                            echo "</td>";

                            echo "<td>";
                            echo '<img src="data:img/productos/png;base64,'.base64_encode($pic).'" height="100" width="200"/>';
                            echo "</td>";
                            echo "</tr>";
                            echo "</table>";
                        }
                        ?></h2>
                        <?php
                           

                        ?>
                        
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="existencia">Precio $</label>
                                        <input type="number" class="form-control" name="precio" value="<?php echo $precio; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad" value="<?php echo $cantidad; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    
                                </div>
                                <div class="col-sm-6 col-md-3">
                                </div>
                                <div class="col-sm-6 col-md-3">
                                </div>
                          
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="actualizar"><i class="fa fa-save"></i>Actualizar producto</button>

                                </div>
                                <div>
                                   
                                </div>
                            </div>
                        </form>
                        <?php 

                        if($control==0){
                            echo "";
                        }else if($control==1){
                            echo "<div class='alert alert-success'>
                            <strong>Producto actualizado!</strong>
                          </div>";
                          $control=0;
                        }else if($control==2){
                            echo "<div class='alert alert-danger'>
                            <strong>Hay un error, intente de nuevo</strong> 
                          </div>";
                          $control=0;
                        }

                 ?>
                       
                    </div>
                    
                </div>
                
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
       <?php
       include("./../formatos/footer.html");
       ?>



</body>

</html>
