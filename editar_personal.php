<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
	if($_SESSION['rol']=="Administrador")
	{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if(isset($_GET['cc']))
{
	include("conexion.php");
	$con=conectarse();
	$cedula=$_GET['cc'];
	$result=$con->query("SELECT * FROM personal WHERE cc='$cedula'");
	$row = $result->fetch_array();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Modificar Datos Del Personal</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Modificar Datos Del Personal</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="editar_personal.php">
					<div class="form_description">
			<h2>Modificar Datos Del Personal</h2>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Cedula </label>
		<div>
			<input id="cc" name="cc" class="element text medium" type="text" maxlength="255" value="<?php echo $row['cc']; ?>" readonly /> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Nombre </label>
		<span>
			<input id="nombre" name= "nombre" class="element text" maxlength="255" size="8" value="<?php echo $row['nombre']; ?>" required />
			<label>First</label>
		</span>
		<span>
			<input id="apellido" name= "apellido" class="element text" maxlength="255" size="14" value="<?php echo $row['apellidos']; ?>" required />
			<label>Last</label>
		</span> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Cargo </label>
		<div>
			<input id="cargo" name="cargo" class="element text medium" type="text" maxlength="255" value="<?php echo $row['cargo']; ?>" required /> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Tipo de usuario </label>
		<div>
		<select class="element select medium" id="tipo" name="tipo" required > 			
			<option value="Administrador" <?php if($row['tipousuario']=="Administrador"){?> selected <?php } ?>  >Administrador</option>
			<option value="Vendedor" <?php if($row['tipousuario']=="Vendedor"){?> selected <?php } ?> >Vendedor</option>
			<option value="Asistente" <?php if($row['tipousuario']=="Asistente"){?> selected <?php } ?>  >Asistente</option>
		</select>
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Password </label>
		<div>
			<input id="password" name="password" class="element text medium" type="password" maxlength="255" value="<?php echo $row['password']; ?>" required /> 
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
		$cedula=$_POST['cc'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$cargo=$_POST['cargo'];
		$tipo=$_POST['tipo'];
		$password=$_POST['password'];
		$result=$con->query("UPDATE personal SET nombre='$nombre', apellidos='$apellido', cargo='$cargo', tipousuario='$tipo', password='$password' WHERE cc='$cedula'");
	}
?>
	<meta http-equiv='refresh' content='1; url=personal.php' />
<?php
}



?>
<?php
}
	else
	{
		?>
			<script language="javascript"type="text/javascript">
						alert("Usuario no autorizado");
			</script>
			<meta http-equiv='refresh' content='1; url=personal.php' />
		<?php
	}	
}
else
{
	header("location: login.php");
}
?>
</html>