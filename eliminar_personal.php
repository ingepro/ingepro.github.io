<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{		
		if(isset($_GET['cc']))
		{
			$cc = $_GET['cc'];	
			include("conexion.php");
			$con=conectarse();
			$con->query("DELETE FROM personal WHERE cc='$cc'");
		}
	}
	else
	{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
		<?php
	}		
}
else
	{
	  header("location: login.php");
	}
?>
<meta http-equiv='refresh' content='0; url=personal.php' />