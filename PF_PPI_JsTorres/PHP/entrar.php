<?php

include("conexion.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($con,$_POST['correo'] ?? "");
    $mypassword = mysqli_real_escape_string($con,$_POST['passwd'] ?? ""); 
    
    $sql = "SELECT * FROM usuarios WHERE CORREO = '$myusername';";
    $result = mysqli_query($con,$sql) or die(mysqli_error());
   /* $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['ID_USUARIOS'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
       

       $sql2 = "SELECT TIPO_USUARIO FROM usuario WHERE ID_USUARIOS='$result'";

       $tipo_usuario = mysqli_query($con,$sql2);

       if($tipo_usuario == "ADMIN"){

        session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        header("location: admin.php");

       }else{
        session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        header("location: ./../category.html");
       }
       
    }else {
       $error = "Your Login Name or Password is invalid";
    }*/


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