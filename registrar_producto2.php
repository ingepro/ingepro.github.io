<!doctype html>
<html>
<head> 
<title> REGISTRAR PRODUCTO </title>
<html lang="es">
<meta charset="UTF-8">
</head>
<body bgcolor="#FF8000">
<style>
h1   {color:#0174DF}
</style>

<?php

if(isset($_POST['submit']))
{
include("conexion.php");
$con=conectarse();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$stockmin=$_POST['stockmin'];
$stockmax=$_POST['stockmax'];
$stockactual=$_POST['stockactual'];	
$preciocompra=$_POST['preciocompra'];	
$precioventa=$_POST['precioventa'];	
$proveedor=$_POST['proveedor'];

$result=$con->query("INSERT INTO productos(id, nombre, stockmin, stockmax, stockactual, preciocompra, precioventa, nitproveedor) 
VALUES ('$id', '$nombre', '$stockmin', '$stockmax', '$stockactual', '$preciocompra', '$precioventa', '$proveedor')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>".$con->error;
}
}
?>
<meta http-equiv='refresh' content='1; url=registrar_producto.php' />
</body>
</html>