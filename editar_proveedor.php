<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if(isset($_GET['nit']))
{
	include("conexion.php");
	$con=conectarse();
	$nit=$_GET['nit'];
	$result=$con->query("SELECT * FROM proveedores WHERE nit='$nit'");
	$row = $result->fetch_array();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Modificar Datos Del Proveedor</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Modificar Datos Del Proveedor</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="editar_proveedor.php">
					<div class="form_description">
			<h2>Modificar Datos Del Proveedor</h2>
			<p></p>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">NIT </label>
		<div>
			<input id="cc" name="nit" class="element text medium" type="text" maxlength="255" value="<?php echo $row['nit']; ?>" readonly /> 
		</div> 
		</li>
		<li id="li_2" >
		<label class="description" for="element_1">Nombre </label>
		<div>
			<input id="cc" name="nombre" class="element text medium" type="text" maxlength="255" value="<?php echo $row['nombre']; ?>" required /> 
		</div> 
		</li>			
		<li id="li_3" >
		<label class="description" for="element_3">Telefono </label>
		<div>
			<input id="cargo" name="telefono" class="element text medium" type="text" maxlength="255" value="<?php echo $row['telefono']; ?>" required /> 
		</div> 
		</li>
		<li id="li_4" >
		<label class="description" for="element_4">Direccion </label>
		<div>
			<input id="password" name="direccion" class="element text medium" type="text" maxlength="255" value="<?php echo $row['direccion']; ?>" required /> 
		</div> 
		</li>
		<li id="li_5" >
		<label class="description" for="element_4">Email </label>
		<div>
			<input id="password" name="email" class="element text medium" type="text" maxlength="255" value="<?php echo $row['email']; ?>" required /> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Modificar" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="css/bottom.png" alt="">
	</body>
<?php
}
else
{
	if(isset($_POST['submit']))
	{
		include("conexion.php");
	    $con=conectarse();
		$nit=$_POST['nit'];
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
		$email=$_POST['email'];		
		$result=$con->query("UPDATE proveedores SET nombre='$nombre', telefono='$telefono', direccion='$direccion', email='$email' WHERE nit='$nit'");
	}
?>
	<meta http-equiv='refresh' content='1; url=proveedores.php' />
<?php
}



?>
<?php
}
else
{
	header("location: login.php");
}
?>
</html>