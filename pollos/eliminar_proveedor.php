<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{
		if(isset($_GET['nit']))
		{
			$nit = $_GET['nit'];	
			include("conexion.php");
			$con=conectarse();
			$con->query("DELETE FROM proveedores WHERE nit='$nit'");
		}		
		
	}
	else{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='1; url=proveedores.php' />
		<?php
	}
		?>
		<meta http-equiv='refresh' content='0; url=proveedores.php' />
		<?php
}
else
{
	header("location: login.php");
}
		?>