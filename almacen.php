<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Almacen</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<?php
	include("conexion.php");
	$con=conectarse();	
	$result=$con->query("SELECT * FROM almacen");
	$row = $result->fetch_array();
?>
<style>	
	img
	{
		 height: 27px;
         width: 27px;
	}	
</style>	
</head>
<body id="main_body" >

	<table>
	<tr>
	<td><a href="personal.php">EMPLEADOS</a></td>
	<td><a href="proveedores.php">PROVEEDORES</a></td>
	<td><a href="productos.php">PRODUCTOS</a></td>	
	<td><a href="compras.php">COMPRAS</a></td>
	<td><a href="ventas.php">VENTAS</a></td>
	</tr>
	</table
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a><?php echo $row['nombre'];?></a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="personal.php">
					<div class="form_description">
			<h2><?php echo $row['nombre'];?></h2><a title=" Modificar los datos del almacen? " href="editar_almacen.php">  <img src="css/edit.jpg">  </a>
			<p></p>
			Usuario: <?php echo $_SESSION['nomusuario']." ".$_SESSION['apeusuario']; ?>
			<br>Rol: <?php echo $_SESSION['rol']; ?>
			<br><a href="close.php">Salir</a>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1"> NIT </label>
		<div>
			<?php echo $row['nit'];  ?>
		</div> 
		</li>

		<li id="li_1" >
		<label class="description" for="element_1"> Nombre </label>
		<div>
			<?php echo $row['nombre'];  ?>
		</div> 
		</li>	

			<li id="li_1" >
		<label class="description" for="element_1"> Telefono </label>
		<div>
			<?php echo $row['telefono'];  ?>
		</div> 
		</li>
		
		<li id="li_1" >
		<label class="description" for="element_1"> Email </label>
		<div>
			<?php echo $row['email'];  ?>
		</div> 
		</li>
		
		<li id="li_1" >
		<label class="description" for="element_1"> Direccion </label>
		<div>
			<?php echo $row['direccion'];  ?>
		</div> 
		</li>
					
			</ul>
			
		
		</form>	
		<div id="footer">
			
		</div>
	</div>	
	
	<style>
	
	table
	{
		border: 2px solid #FF8000;		
		width: 100%;
    }
    
	</style>
	

		
	<img id="bottom" src="css/bottom.png" alt="">
	</body>
	
<?php
}
else
{
	header("location: login.php");
}
?>
</html>