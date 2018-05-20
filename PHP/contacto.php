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
                        <li>Contacto</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                    

                    <!-- *** PAGES MENU END *** -->


                    
                </div>

                <div class="col-md-9">


                    <div class="box" id="contact">
                        <h1>Contacto</h1>

                        <p class="lead">¿Tienes duda? Contáctanos en por nuestras diferentes vías de comunicación</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i>Dirección</h3>
                                <p> Av. Lomas Anáhuac #462,
                                    <br>Col. Lomas Anáhuac
                                    <br>Naucalpan de Juárez,
                                    <br>Estado de México,
                                    <br>
                                    <strong>México</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i>Llamada telefónica</h3>
                                <p class="text-muted">Llama sin costo desde todo el país.</p>
                                <p><strong>+52 55-63-19-29-75</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i>Correo electrónico</h3>
                                <p class="text-muted">Escribenos a nuestro correo electrónico para dudas.</p>
                                <ul>
                                    <li><strong><a href="mailto:">contacto@dunkers.com</a></strong>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->

                        <hr>

                        <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.2543709138317!2d-99.26592438515813!3d19.401412386902056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20138891b3483%3A0xfc7f5357ee925110!2sUniversidad+An%C3%A1huac+M%C3%A9xico+Norte!5e0!3m2!1ses-419!2smx!4v1526854231696" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                        <hr><br>
                        <h2>Escribenos</h2>

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php
                                            if(!empty($_SESSION)){
                                                echo $_SESSION['NOMBRE'];
                                            }else{
                                                echo "";
                                            }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" name="apellido" value="<?php
                                            if(!empty($_SESSION)){
                                                echo $_SESSION['APELLIDO'];
                                            }else{
                                                echo "";
                                            }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="asunto">Asunto</label>
                                        <input type="text" class="form-control" name="asunto">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="mensaje">Mensaje</label>
                                        <textarea name="mensaje" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i>Enviar</button>

                                </div>
                            </div>
                            <!-- /.row -->
                        </form>


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
