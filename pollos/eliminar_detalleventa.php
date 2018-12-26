<?php
session_start();
if($_SESSION['ok']=="ok")
{
if(isset($_GET['id']))
{
$id = $_GET['id'];	
$nro = $_GET['nro'];	
$cant = $_GET['cant'];	
include("conexion.php");
$con=conectarse();
$con->query("UPDATE productos SET stockactual=stockactual+$cant WHERE id='$id'");
$con->query("DELETE FROM detalleventas WHERE idproducto='$id' AND nrofactura=$nro");
?><meta http-equiv='refresh' content='0; url=editar_venta.php?nro=<?php echo $nro; ?>' /><?php
}
}
else
{
	header("location: login.php");
}
?>
