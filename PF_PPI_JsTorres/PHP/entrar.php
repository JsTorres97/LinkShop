<?php

include("conexion.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $myusername = mysqli_real_escape_string($con,$_POST['correo'] ?? "");
    $mypassword = mysqli_real_escape_string($con,$_POST['passwd'] ?? ""); 
    
    $sql = "SELECT * FROM usuarios WHERE CORREO = '$myusername';";
    $result = mysqli_query($con,$sql) or die(mysqli_error());


    if($row = mysqli_fetch_array($result)){
        if($row['CONTRA'] == $mypassword){
        ;

        if($row['TIPO_USUARIO']=='ADMIN'){
            session_start();
        $_SESSION['ID'] = $row['ID_USUARIOS'];
        $_SESSION['NOMBRE'] = $row['NOMBRE'];
        $_SESSION['APELLIDO'] = $row['APELLIDO'];
        $_SESSION['CONTRA'] = $row['CONTRA'];
        $_SESSION['FECHA'] = $row['FECHA_NACIMIENTO'];
        $_SESSION['NUM_TARJETA'] = $row['NUM_TARJETA'];
        $_SESSION['DIRECCION'] = $row['DIRECCION'];
        $_SESSION['TIPO_USUARIO'] = $row['TIPO_USUARIO'];
        $_SESSION['CORREO'] = $myusername;
        echo "Sesion iniciada";
            header("Location: admin.php");
        }else{
            session_start();
        $_SESSION['ID'] = $row['ID_USUARIOS'];
        $_SESSION['NOMBRE'] = $row['NOMBRE'];
        $_SESSION['APELLIDO'] = $row['APELLIDO'];
        $_SESSION['CONTRA'] = $row['CONTRA'];
        $_SESSION['FECHA'] = $row['FECHA_NACIMIENTO'];
        $_SESSION['NUM_TARJETA'] = $row['NUM_TARJETA'];
        $_SESSION['DIRECCION'] = $row['DIRECCION'];
        $_SESSION['TIPO_USUARIO'] = $row['TIPO_USUARIO'];
        $_SESSION['CORREO'] = $myusername;
        echo "Sesion iniciada";
            header("Location: index.php");
        }
        
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