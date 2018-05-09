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
    include("../formatos/style.html")
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
                        <li><a href="#">Incio</a>
                        </li>
                        <li>Agregar Productos</li>
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
                        <h1>Agregar Productos</h1>
                        <p class="lead">Inserte la información del producto</p>

                        <hr>

                        <h3>Nuevo Producto</h3>
                        <form action="altaproducto.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" class="form-control" name="imagen" accept=".png, .jpg, .jpge">
                                    </div>
                                 </div>
                              
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="precio">Precio $</label>
                                        <input type="number" class="form-control" name="precio">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad en existencia</label>
                                        <input type="text" class="form-control" name="cantidad">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="marca">Marca</label>
                                        <input type="text" class="form-control" name="marca">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="origen">Origen</label>
                                        <input type="text" class="form-control" name="origen">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="categoria">Categoria</label><br>
                                        <select class="select" name="categoria">
                                        <?php
                                            include("conexion.php");
                                            $res=mysqli_query($con,"SELECT * FROM  categoria");
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<option value="'.$row['NOMBRE'].'">'.$row['NOMBRE'].'</option>';
                                                
                                            }

                                        ?>
                                         </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="Tipo">Tipo</label><br>
                                        <select class="select" name="tipo">
                                        <?php
                                            include("conexion.php");
                                            $res=mysqli_query($con,"SELECT * FROM  tipo");
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<option value="'.$row['NOMBRE'].'">'.$row['NOMBRE'].'</option>';
                                                
                                            }

                                        ?>
                                         </select>
                                    </div>
                                </div>
                          
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Agregar Producto</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
       
        <!-- /#footer -->
        <?php
        include("../formatos/footer.html");
        ?>
        <!-- *** FOOTER END *** -->




       



</body>

</html>
