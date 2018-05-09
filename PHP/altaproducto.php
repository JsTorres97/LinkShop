<?php
include("conexion.php");
if($_SERVER['REQUEST_METHOD']=='POST'){

$image = $_FILES['imagen']['tmp_name'] ?? "";
$nombre =  $_POST['nombre'] ?? "";
$descipcion =  $_POST['descripcion'] ?? "";
$precio =  $_POST['precio'] ?? "";
$cantidad =  $_POST['cantidad'] ?? "";
$marca =  $_POST['marca'] ?? "";
$origen =  $_POST['origen'] ?? "";
$categoria = $_POST['categoria'] ?? "";
$tipo = $_POST['tipo'] ?? "";
$img = file_get_contents($image);

$sql = "INSERT INTO productos (NOMBRE, DESCRIPCION, IMAGEN, PRECIO, EXISTENCIA, MARCA, ORIGEN, CATEGORIA, TIPO) VALUES('$nombre', '$descipcion', ?, '$precio', '$cantidad', '$marca', '$origen', '$categoria', '$tipo');";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($stmt, "s",$img);
mysqli_stmt_execute($stmt);
$check = mysqli_stmt_affected_rows($stmt);

if($check==1){
echo 'Exito';
}else{
echo  'Buuuuuu';
}
mysqli_close($con);
}
?>