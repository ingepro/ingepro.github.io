<?php

session_start();
if($_SESSION['rol']=="Administrador")
{

if(isset($_GET['nro']))
{
$nro = $_GET['nro'];	
include("conexion.php");
$con=conectarse();
$c2=$con->query("SELECT cantidad, idproducto FROM detalleventas WHERE nrofactura='$nro'");
while($r=$c2->fetch_array())
{
	$cant = $r['cantidad'];
	$id = $r['idproducto'];
	$con->query("UPDATE productos SET stockactual=stockactual+$cant WHERE id=$id");
}

$con->query("DELETE FROM ventas WHERE nrofactura='$nro'");
}
}
else
{
	?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='1; url=productos.php' />
	<?php
}
?>
<meta http-equiv='refresh' content='0; url=ventas.php' />