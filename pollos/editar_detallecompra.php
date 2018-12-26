<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if(isset($_GET['nro']))
{
	include("conexion.php");
	$con=conectarse();
	$nro=$_GET['nro'];
	$id=$_GET['id'];
	$result=$con->query("SELECT * FROM detallecompras d INNER JOIN productos p ON d.idproducto=p.id WHERE d.nrofactura='$nro' AND d.idproducto='$id'");
	$row = $result->fetch_array();
	$cantant = $row['cantidad'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Modificar Producto</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Modificar Producto</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="editar_detallecompra.php">
					<div class="form_description">
			<h2>Modificar Producto</h2>
			<p></p>
		</div>						
			<ul >
					
							<input type="hidden" name="nro" value="<?php echo $row['nrofactura']; ?>"/>
							<input type="hidden" name="cantant" value="<?php echo $row['cantidad']; ?>"/>
			
					<li id="li_1" >
		<label class="description" for="element_1">ID PRODUCTO </label>
		<div>
			<input id="cc" name="id" class="element text medium" type="text" maxlength="255" value="<?php echo $id; ?>" readonly /> 
		</div> 
		</li>		
		<li id="li_3" >
		<label class="description" for="element_3">NOMBRE </label>
		<div>
			<input id="cargo" name="nombre" class="element text medium" type="text" maxlength="255" value="<?php echo $row['nombre']; ?>" readonly /> 
		</div> 
		</li>		
		<li id="li_4" >
		<label class="description" for="element_4">CANTIDAD </label>
		<div>
			<input id="password" name="cantidad" class="element text medium" type="number" maxlength="255" value="<?php echo $row['cantidad']; ?>" required /> 
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


	if(isset($_POST['submit']))
	{
		include("conexion.php");
	    $con=conectarse();
		$id=$_POST['id'];
		$cantidad=$_POST['cantidad'];	
		$nro=$_POST['nro'];
		$cantant=$_POST['cantant'];
		
		$con->query("UPDATE detallecompras SET cantidad=$cantidad WHERE nrofactura=$nro AND idproducto=$id");
		$con->query("UPDATE productos SET stockactual=stockactual-$cantant WHERE id=$id");
		$con->query("UPDATE productos SET stockactual=stockactual+$cantidad WHERE id=$id");
		?>
		
		<meta http-equiv='refresh' content='1; url=editar_compra.php?nro=<?php echo $nro; ?>' />
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