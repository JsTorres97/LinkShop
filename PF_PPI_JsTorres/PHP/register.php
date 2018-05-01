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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
   

    <!-- styles -->
    <?php
    include("./../formatos/style.html");
    ?>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- theme stylesheet -->
    

    <!-- your stylesheet with modifications -->
    <?php
    include("./../formatos/style2.html");
    ?>
   
    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <?php
    include("./../formatos/script1.html");
    ?>
   
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
                        <li><a href="#">Inicio</a>
                        </li>
                        <li>Nueva cuenta / Entrar</li>
                    </ul>

                </div>

                <!--Validacion del formulario de registro-->
                <?php

                    $nomErr = $apeErr = $corrErr = $fechaErr = $tarErr = $dirErr = $passErr = "";
                    $name = $lastn = $corr = $fecha = $numtar = $dir = $pass = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST"){

                        if(empty($_POST["nombre"])){
                            $nameErr = "Nombre obligatorio";
                        }else{
                            $name = test_input($_POST["nombre"]);
                            if(!preg_match("/^[a-zA-Z]*$/",$name)){
                                $nomErr = "Solo se pérmiten letras";
                            }
                        }

                        if(empty($_POST["apellido"])){
                            $apeErr = "Apellido obligatorio";
                        }else{
                            $lastn = test_input($_POST["apellido"]);
                            if(!preg_match("/^[a-zA-Z]*$/",$lastn)){
                                $apeErr = "Solo se permiten letras";
                            }
                        }

                        if(empty($_POST["correo"])){
                            $corrErr = "Correo electrónico";
                        }else{
                            $corr = test_input($_POST["correo"]);
                            if(!filter_var($corr, FILTER_VALIDATE_EMAIL)){
                                $corrErr = "Formato de correo invalido";
                            }
                        }

                        if(empty($_POST["fecha"])){
                            $fechaErr = "Fecha de nacimiento necesaria";
                        }else{
                            $fecha = test_input($_POST["fecha"]);
                        }

                        if(empty($_POST["tarjeta"])){
                            $tarErr = "Número de tarjeta necesario";
                        }else{
                            $numtar = test_input($_POST["tarjeta"]);
                        }

                        if(empty($_POST["ship"])){
                            $dirErr = "Número de tarjeta necesario";
                        }else{
                            $dir = test_input($_POST["ship"]);
                        }

                        if(empty($_POST["tarjeta"])){
                            $tarErr = "Número de tarjeta necesario";
                        }else{
                            $numtar = test_input($_POST["tarjeta"]);
                        }

                        if(empty($_POST["paswd"])){
                            $passErr = "Contraseña necesaria";
                        }else{
                            $pass = test_input($_POST["paswd"]);
                        }
                    }

                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                      }

                ?>


                <!--Formulario de registro-->
                <div class="col-md-6">
                    <div class="box">
                        <h1>Nueva cuenta</h1>

                        <p class="lead">¿Eres nuevo en Dunkers? Crea una cuenta y forma parte de Dunkers.</p>
                        
                        <hr>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $name; ?>">
                                <span class="error">*<?php $nameErr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo eletrónico</label>
                                <input type="email" class="form-control" name="correo">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fecha">
                            </div>
                            <div class="form-group" id="card-number-field">
                                    <label for="cardNumber">Número de tarjeta</label>
                                    <input type="number" class="form-control" name="tarjeta">
                            </div>
                            <div class="form-group" id="credit_cards">
                                    <img src="./../img/visa.jpg" id="visa">   
                                    <img src="./../img/mastercard.jpg" id="mastercard">
                                    <img src="./../img/amex.jpg" id="amex">
                            </div>
                            <div class="form-group">
                                    <label for="ship">Dirección</label>
                                    <input type="text" class="form-control" name="ship">
                            </div>
                            <div class="form-group">
                                    <label for="passwd">Contraseña</label>
                                    <input type="password" class="form-control" name="paswd">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>Crear cuenta de Dunkers</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Iniciar sesion-->
                <div class="col-md-6">
                    <div class="box">
                        <h1>Entrar</h1>

                        <p class="lead">¿Ya eres Dunker? Inicia sesión.</p>

                        <hr>

                        <form action="entrar.php" method="post">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" class="form-control" name="correo">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="passwd">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>Iniciar sesión</button>
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
        <?php
        include("./../formatos/footer.html")
        ?>
        <!-- /#footer -->

       

</body>

</html>
