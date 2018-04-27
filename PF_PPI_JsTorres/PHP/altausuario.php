<?php   

include("conexion.php");

$nom = $_POST['nombre'] ?? "";
$ape = $_POST['apellido'] ?? "";
$mail = $_POST['correo'] ?? "";
$pass = $_POST['paswd'] ?? "";
$date = $_POST['fecha'] ?? "";
$num = $_POST['tarjeta'] ?? "";
$dir = $_POST['ship'] ?? "";
$usuario = "comprador";




$sql = "INSERT INTO usuarios(NOMBRE, APELLIDO, CORREO, CONTRA, FECHA_NACIMIENTO, NUM_TARJETA, DIRECCION, TIPO_USUARIO) VALUES('$nom', '$ape', '$mail', '$pass', '$date', '$num', '$dir', '$usuario');";
if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
  }
  
  header('Location: ./../faq.html');
?>