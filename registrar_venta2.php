<!doctype html>
<html>
<head> 
<title> REGISTRAR VENTA </title>
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

$nrofactura=$_POST['nrofactura'];
$fecha=$_POST['fecha'];
$cc=$_POST['cc'];



$result=$con->query("INSERT INTO ventas(fecha, ccresponsable) 
VALUES ('$fecha', '$cc')");
if($result>=1)
{
	$sel=$con->query("SELECT * FROM tempdetallev");
	while($row=$sel->fetch_array())
	{
		$codigo = $row['codigo'];
		$precio = $row['valorun'];
		$cant = $row['cant'];
		$con->query("INSERT INTO detalleventas(nrofactura, idproducto, valor, cantidad) VALUES ('$nrofactura', '$codigo', '$precio', '$cant')");
		$con->query("UPDATE productos SET stockactual=stockactual-$cant WHERE id=$codigo");
	}
	$con->query("TRUNCATE TABLE tempdetallev");
	echo "<center><h1> DATOS ALMACENADOS CON EXITOS</h1></center>";
}
else
{
	echo "<center><h1>SE HA PRODUCIDO UN ERROR</h1></center>";
}
}
?>
<meta http-equiv='refresh' content='1; url=ventas.php' />
</body>
</html>