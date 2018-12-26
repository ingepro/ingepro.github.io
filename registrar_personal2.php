<!doctype html>
<html>
<head> 
<title> REGISTRAR PERSONAL </title>
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

$cedula=$_POST['cc'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cargo=$_POST['cargo'];
$tipo=$_POST['tipo'];
$password=$_POST['password'];


$result=$con->query("INSERT INTO personal(cc, nombre, apellidos, cargo, password, tipousuario) 
VALUES ('$cedula', '$nombre', '$apellido', '$cargo', '$password', '$tipo')");
if($result>=1)
{
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>";
}
}
?>
<meta http-equiv='refresh' content='1; url=registrar_personal.php' />
</body>
</html>