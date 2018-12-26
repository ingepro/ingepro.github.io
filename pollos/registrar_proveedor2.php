<!doctype html>
<html>
<head> 
<title> REGISTRAR PROVEEDOR </title>
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

$nit=$_POST['nit'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$email=$_POST['email'];

$result=$con->query("INSERT INTO proveedores(nit, nombre, telefono, direccion, email) 
VALUES ('$nit', '$nombre', '$telefono', '$direccion', '$email')");
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
<meta http-equiv='refresh' content='1; url=registrar_proveedor.php' />
</body>
</html>