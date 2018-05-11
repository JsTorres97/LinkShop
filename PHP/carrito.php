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
    <script>
        $("#del").click(function() {
       
        $("#div").load(" #div > *");
        }); 
    </script>

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
                        <li><a>Inicio</a>
                        </li>
                        <li>Carrito de compras</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        
                            <h1>Carrito de compras</h1>
                            
                       

                            <p class="text-muted"><?php echo $_SESSION['NOMBRE']." tienes "?>
                            <?php if(!isset($cuenta)){ 
                                echo "0";
                            }else{
                                echo $cuenta;
                            }
                             echo " artículos en tu carrito";?></p>
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
                                            $id_usuario = $_SESSION['ID'];
                                            $consulta1 =mysqli_query($con, "SELECT * FROM carrito WHERE ID_USUARIO_C = '$id_usuario'");
                                            $total=0;
                                            while($row2=mysqli_fetch_array($consulta1)){
                                                $id_producto = $row2['ID_PRODUCTO_C'];
                                                $consulta2 = mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS ='$id_producto'");
                                                    while($row3=mysqli_fetch_array($consulta2)){
                                                        echo '
                                                        <tr>
                                                        <td>
                                                            <a>
                                                            <img src="data:img/productos/png;base64,'.base64_encode($row3['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                                            </a>
                                                        </td>
                                                        <td><a>'.$row3['NOMBRE'].'</a>
                                                        </td>
                                                        <td>
                                                            '.$row2['CANTIDAD'].'
                                                        </td>
                                                        <td>$'.$row3['PRECIO'].'</td>
                                                        <td></td>
                                                        <td>$'.$row3['PRECIO'].'</td>
                                                        <td>';?>

                                                        <?php 
                                                        if($_SERVER['REQUEST_METHOD']=='POST'){
                                                            $idcarrito = $_POST['idcarrito'] ?? "";
                                                            $idusuario = $_POST['idusuario'] ?? "";
                                                            $idproducto = $_POST['idprod'] ?? "";
                                                            if(isset($_POST['eliminar'])){
                                                                $del = mysqli_query($con,"DELETE FROM carrito WHERE ID_CARRITO=$idcarrito AND ID_USUARIO_C=$idusuario AND ID_PRODUCTO_C=$idproducto");
                                                                 
                                                            }
                                                        }
                                        
                                                        ?>
                                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                        <input type="hidden" name="idprod" value="<?php echo $id_producto; ?>">
                                                        <input type="hidden" name="idusuario" value=<?php echo $_SESSION['ID']; ?>>
                                                        <input type="hidden" name="idcarrito" value=<?php echo $row2['ID_CARRITO']; ?>>
                                                        <button type="submit" name="eliminar" id="del" class="btn btn-primary"><i class="fa fa-trash-o"></i></button>
                                                        </form>
                                                        <?php
                                                        echo '</td>
                                                    </tr>';
                                                        $total=$total+$row3['PRECIO'];
                                                    }
                                            } 
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2"><?php 
                                            
                                            echo '$'.$total; 
                                        
                                            ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                
                                <div class="pull-right">
                                    <a class="btn btn-default" href="carrito.php"><i class="fa fa-refresh"></i>Actualizar carrito</a>
                                    
                                    </button>
                                </div>
                            </div>

                       

                    </div>
                    <!-- /.box -->


                     <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Tal vez te gusten:</h3>
                            </div>
                        </div>
                        <?php
                            $max = mysqli_query($con,"SELECT MAX(ID_PRODUCTOS) as mx FROM productos");
                            $min = mysqli_query($con,"SELECT MIN(ID_PRODUCTOS) as mn FROM productos");

                            $nummax = mysqli_fetch_array($max);
                            $nummin = mysqli_fetch_array($min);

                            $num1 = mt_rand($nummin['mn'], $nummax['mx']);
                            $num2 = mt_rand($nummin['mn'], $nummax['mx']);
                            $num3 = mt_rand($nummin['mn'], $nummax['mx']);


                        ?>
                        <?php
                            $con1 = mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS=$num1");
                            $rowprod1 = mysqli_fetch_array($con1);
                        echo '
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a>
                                            <img src="data:img/productos/png;base64,'.base64_encode($rowprod1['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a>
                                            <img src="data:img/productos/png;base64,'.base64_encode($rowprod1['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="invisible">
                                <img src="data:img/productos/png;base64,'.base64_encode($rowprod1['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                </a>
                                <div class="text">
                                    <h3>'.$rowprod1['NOMBRE'].'</h3>
                                    <p class="price">$'.$rowprod1['PRECIO'].'</p>
                                </div>
                                <form action="detail.php" method="GET">
                                    <input type="hidden" name="id" value="'.$rowprod1['ID_PRODUCTOS'].'">
                                    <div align="center"><button type="submit"class="btn btn-primary" align="center">Detalles</button></div>
                                </p>
                                </form>
                            </div>'; ?>
                            <!-- /.product -->
                        </div> 

                         <?php
                            $con2 = mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS=$num2");
                            $rowprod2 = mysqli_fetch_array($con2);
                        echo '
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a>
                                            <img src="data:img/productos/png;base64,'.base64_encode($rowprod2['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a>
                                            <img src="data:img/productos/png;base64,'.base64_encode($rowprod2['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="invisible">
                                <img src="data:img/productos/png;base64,'.base64_encode($rowprod2['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                </a>
                                <div class="text">
                                    <h3>'.$rowprod2['NOMBRE'].'</h3>
                                    <p class="price">$'.$rowprod2['PRECIO'].'</p>
                                </div>
                                <form action="detail.php" method="GET">
                                    <input type="hidden" name="id" value="'.$rowprod2['ID_PRODUCTOS'].'">
                                    <div align="center"><button type="submit"class="btn btn-primary" align="center">Detalles</button></div>
                                </p>
                                </form>
                            </div>'; ?>
                            <!-- /.product -->
                        </div>


                         <?php
                            $con3 = mysqli_query($con, "SELECT * FROM productos WHERE ID_PRODUCTOS=$num3");
                            $rowprod3 = mysqli_fetch_array($con3);
                        echo '
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a>
                                            <img src="data:img/productos/png;base64,'.base64_encode($rowprod3['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a>
                                            <img src="data:img/productos/png;base64,'.base64_encode($rowprod3['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="invisible">
                                <img src="data:img/productos/png;base64,'.base64_encode($rowprod3['IMAGEN']).'" height="250" width="425" class="img-responsive"/>
                                </a>
                                <div class="text">
                                    <h3>'.$rowprod3['NOMBRE'].'</h3>
                                    <p class="price">$'.$rowprod3['PRECIO'].'</p>
                                </div>
                                <form action="detail.php" method="GET">
                                    <input type="hidden" name="id" value="'.$rowprod3['ID_PRODUCTOS'].'">
                                    <div align="center"><button type="submit"class="btn btn-primary" align="center">Detalles</button></div>
                                </p>
                                </form>
                            </div>'; ?>

                                </div>
                            </div>
                            <!-- /.product -->
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
                                        <th>$ <?php echo $total; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Envío:</td>
                                        <th>$<?php echo $envio=120; ?></th>
                                    </tr>
                                    
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$<?php echo $ttotal=$total+$envio; ?></th>
                                    </tr>
                                </tbody>
                                
                            </table>
                            <form action="./checkout1.php" method="POST">
                            <input type="hidden" name="subtotal" value="<?php echo $total; ?>">
                            <input type="hidden" name="envio" value="<?php echo $envio; ?>">
                            <input type="hidden" name="total" value="<?php echo $ttotal; ?>">
                            <button type="submit" class="btn btn-primary">Seguir al pago<i class="fa fa-chevron-right"></i>
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
      <?php include("../formatos/footer.html");
      ?>



</body>

</html>