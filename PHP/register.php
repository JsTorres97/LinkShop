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
   
    <link rel="shortcut icon" href="../favicon.png">



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
                    include("conexion.php");
                    $control = 0;
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){

                        function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                          }

                    /*      function existe_mail($mail){
                               
                            $verifica = mysqli_query($con, "SELECT * FROM usuarios WHERE CORREO = $mail");
                            $pasando = mysqli_fetch_array($verifica);

                            if(empty($pasando)){
                                return true;
                            }else{
                                return false;
                            }
                          }*/

                        if(isset($_POST['crear'])){

                        

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
                            //$pasa = existe_mail($_POST["correo"]);
                            //if($pasa==true){

                            
                            $corr = test_input($_POST["correo"]);
                            if(!filter_var($corr, FILTER_VALIDATE_EMAIL)){
                                $corrErr = "Formato de correo invalido";
                            //}
                        }//else{
                           //     $control=3;
                                
                            //}
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
                    

                    

                      

                      $nom = $_POST['nombre'] ?? "";
                      $ape = $_POST['apellido'] ?? "";
                      $mail = $_POST['correo'] ?? "";
                      $pass = $_POST['paswd'] ?? "";
                      $date = $_POST['fecha'] ?? "";
                      $num = $_POST['tarjeta'] ?? "";
                      $dir = $_POST['ship'] ?? "";
                      $usuario = "comprador";
                      
                      
                      
                      if(!empty($nom) && !empty($pass)){

                      
                      $sql = "INSERT INTO usuarios(NOMBRE, APELLIDO, CORREO, CONTRA, FECHA_NACIMIENTO, NUM_TARJETA, DIRECCION, TIPO_USUARIO) VALUES('$nom', '$ape', '$mail', '$pass', '$date', '$num', '$dir', '$usuario');";
                      $insertar = mysqli_query($con,$sql);
                      $control=1;
                      


                       $name = $lastn = $corr = $fecha = $numtar = $dir = $pass = "";
                      $usuario = "comprador";
                      
                        }else{
                            $control=2;
                        }


                    }



                    }

                ?>


                <!--Formulario de registro-->
                <div class="col-md-6">
                    <div class="box">
                        <h1>Nueva cuenta</h1>
                        <?php
                        if($control==0){
                            echo "";
                        }else if($control==1){
                            echo "<div class='alert alert-success'>
                            <strong>Usuario Creado, Favor de entrar a su cuenta</strong>
                          </div>";
                          $control=0;
                        }else if($control==2){
                            echo "<div class='alert alert-danger'>
                            <strong>Hay un error, intente de nuevo</strong> 
                          </div>";
                          $control=0;
                        }else if($control==3){
                            echo "<div class='alert alert-danger'>
                            <strong>Correo electrónico ya registrado</strong> 
                          </div>";
                          $control=0;
                        }

                 ?>

                        <p class="lead">¿Eres nuevo en Dunkers? Crea una cuenta y forma parte de Dunkers.</p>
                        
                        <hr>

                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $name; ?>">
                                <span class="error">*<?php $nameErr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido" value="<?php echo $lastn; ?>">
                                <span class="error">*<?php $apeErr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo eletrónico</label>
                                <input type="email" class="form-control" name="correo" value="<?php echo $corr; ?>">
                                <span class="error">*<?php $corrErr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fecha" value="<?php echo $fecha; ?>">
                                <span class="error">*<?php $fechaErr;?></span>
                            </div>
                            <div class="form-group" id="card-number-field">
                                    <label for="cardNumber">Número de tarjeta</label>
                                    <input type="number" class="form-control" name="tarjeta" value="<?php echo $numtar; ?>">
                                    <span class="error">*<?php $tarErr;?></span>
                            </div>
                            <div class="form-group" id="credit_cards">
                                    <img src="./../img/visa.jpg" id="visa">   
                                    <img src="./../img/mastercard.jpg" id="mastercard">
                                    <img src="./../img/amex.jpg" id="amex">
                            </div>
                            <div class="form-group">
                                    <label for="ship">Dirección</label>
                                    <input type="text" class="form-control" name="ship" value="<?php echo $dir; ?>">
                                    <span class="error">*<?php $dirErr;?></span>
                            </div>
                            <div class="form-group">
                                    <label for="passwd">Contraseña</label>
                                    <input type="password" class="form-control" name="paswd" value="<?php echo $pass; ?>">
                                    <span class="error">*<?php $passErr;?></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="crear"><i class="fa fa-user-md"></i>Crear cuenta de Dunkers</button>
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
                                <button type="submit" class="btn btn-primary" name="entrar"><i class="fa fa-sign-in"></i>Iniciar sesión</button>
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
