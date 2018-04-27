<?php

include("conexion.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $myusername = mysqli_real_escape_string($con,$_POST['correo'] ?? "");
    $mypassword = mysqli_real_escape_string($con,$_POST['passwd'] ?? ""); 
    
    $sql = "SELECT * FROM usuarios WHERE CORREO = '$myusername';";
    $result = mysqli_query($con,$sql) or die(mysqli_error());


    if($row = mysqli_fetch_array($result)){
        if($row['CONTRA'] == $mypassword){
        session_start();
        $_SESSION['CORREO'] = $myusername;
        echo "Sesion iniciada";
        //header("Location: contenido.php");
        }else{
        echo "Contraseña incorrecta";
        //header("Location: index.html");
        exit();
        }
        }else{
        echo "Usuario no encontrado";
       //header("Location: index.html");
        exit();
        }

    }

?>