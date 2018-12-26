<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if(isset($_GET['id']))
{
	include("conexion.php");
	$con=conectarse();
	$id=$_GET['id'];
	$result=$con->query("SELECT * FROM productos WHERE id='$id'");
	$row = $result->fetch_array();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Modificar Datos Del Producto</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Modificar Datos Del Producto</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="editar_producto.php">
					<div class="form_description">
			<h2>Modificar Datos Del Producto</h2>
			<p></p>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">ID </label>
		<div>
			<input id="cc" name="id" class="element text medium" type="text" maxlength="255" value="<?php echo $row['id']; ?>" readonly /> 
		</div> 
		</li>
		<li id="li_2" >
		<label class="description" for="element_1">Nombre </label>
		<div>
			<input id="cc" name="nombre" class="element text medium" type="text" maxlength="255" value="<?php echo $row['nombre']; ?>" required /> 
		</div> 
		</li>			
		<li id="li_3" >
		<label class="description" for="element_3">Stock Minimo </label>
		<div>
			<input id="cargo" name="stockmin" class="element text medium" type="text" maxlength="255" value="<?php echo $row['stockmin']; ?>" required /> 
		</div> 
		</li>
		<li id="li_4" >
		<label class="description" for="element_4">Stock Maximo </label>
		<div>
			<input id="password" name="stockmax" class="element text medium" type="text" maxlength="255" value="<?php echo $row['stockmax']; ?>" required /> 
		</div> 
		</li>
		<li id="li_6" >
		<label class="description" for="element_4">Stock Actual </label>
		<div>
			<input id="password" name="stockactual" class="element text medium" type="text" maxlength="255" value="<?php echo $row['stockactual']; ?>" required /> 
		</div> 
		</li>
		<li id="li_7" >
		<label class="description" for="element_4">Precio Compra </label>
		<div>
			<input id="password" name="preciocompra" class="element text medium" type="text" maxlength="255" value="<?php echo $row['preciocompra']; ?>" required /> 
		</div> 
		</li>
		<li id="li_8" >
		<label class="description" for="element_4">Precio Venta </label>
		<div>
			<input id="password" name="precioventa" class="element text medium" type="text" maxlength="255" value="<?php echo $row['precioventa']; ?>" required /> 
		</div> 
		</li>
		<li id="li_9" >
		<label class="description" for="element_4">Proveedor</label>
		<div>
			<select name="proveedor" required>
			<?php			
			$result2=$con->query("SELECT * FROM proveedores");
			while($row2 = $result2->fetch_array())
			{
				?>
				 <option  value="<?php echo $row2['nit']; ?>"  <?php if($row['nitproveedor'] == $row2['nit']){ ?> selected <?php } ?> > <?php echo $row2['nombre']; ?> </option> 
				<?php
			}
			?>
			</select> 
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
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$stockmin=$_POST['stockmin'];
		$stockmax=$_POST['stockmax'];
		$stockactual=$_POST['stockactual'];	
		$preciocompra=$_POST['preciocompra'];	
		$precioventa=$_POST['precioventa'];	
		$proveedor=$_POST['proveedor'];			
		$result=$con->query("UPDATE productos SET nombre='$nombre', stockmin='$stockmin', stockmax='$stockmax', stockactual='$stockactual', preciocompra='$preciocompra', precioventa='$precioventa', nitproveedor='$proveedor' WHERE id='$id'");
	}
?>
	<meta http-equiv='refresh' content='1; url=productos.php' />
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