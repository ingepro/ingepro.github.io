<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Proveedores</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Proveedores</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="proveedores.php">
					<div class="form_description">
			<h2>Proveedores</h2><a title=" Registrar Proveedor Nuevo? " href="registrar_proveedor.php">  <img src="css/newc.jpg">  </a>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">NIT </label>
		<div>
			<input id="cc" name="nit" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>					
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Buscar" />
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
    
	h3
	{
		color: #FF8000;
		text-align: center;
		text-decoration: line-through;
	}
	img{
		 height: 18px;
         width: 18px;
	}
	
	</style>	
	
	<?php

		if(isset($_POST['submit']))
		{
			include("conexion.php");
			$con=conectarse();
			$nit=$_POST['nit'];
			$result=$con->query("SELECT * FROM proveedores WHERE nit='$nit'");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="10" cellpadding="4">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">NIT</td>
		 <td align="center">NOMBRE</td>
		 <td align="center">TELEFONO</td>
		 <td align="center">DIRECCION</td>
		 <td align="center">EMAIL</td>
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		$row = $result->fetch_array();
		?>
			
			<tr>
			 <td align="center"><?php echo $row['nit']; ?></td>
			 <td align="center"><?php echo $row['nombre'];?></td>
			 <td align="center"><?php echo $row['telefono']; ?></td>
			 <td align="center"><?php echo $row['direccion']; ?></td>
			 <td align="center"><?php echo $row['email']; ?></td>
			 <td align="center"><a title=" Eliminar? " href="eliminar_proveedor.php?nit=<?php echo $row['nit']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_proveedor.php?nit=<?php echo $row['nit']; ?>">  <img src="css/edit.jpg">  </a> </td>
			</tr>
			<tr>
				<td align="center" colspan="6"><a href="proveedores.php"><--</a></td>
			</tr>
		</table>	
		
	</div>
      
	<?php
	
		}
		else
		{
			echo "<H3>SIN RESULTADOS</H3>";
		}
		}	

		if(!isset($_POST['submit']))
		{
			include("conexion.php");
			$con=conectarse();
			
			$result=$con->query("SELECT * FROM proveedores");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="10" cellpadding="4">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">NIT</td>
		 <td align="center">NOMBRE</td>
		 <td align="center">TELEFONO</td>
		 <td align="center">DIRECCION</td>
		 <td align="center">EMAIL</td>
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		while($row = $result->fetch_array())
		{
		?>
			
			<tr>
			 <td align="center"><?php echo $row['nit']; ?></td>
			 <td align="center"><?php echo $row['nombre'];?></td>
			 <td align="center"><?php echo $row['telefono']; ?></td>
			 <td align="center"><?php echo $row['direccion']; ?></td>
			 <td align="center"><?php echo $row['email']; ?></td>
			 <td align="center"><a title=" Eliminar? " href="eliminar_proveedor.php?nit=<?php echo $row['nit']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_proveedor.php?nit=<?php echo $row['nit']; ?>">  <img src="css/edit.jpg">  </a> </td>
			</tr>
		<?php
		}
		?>		
		</table>	
		
	</div>
      
	<?php
		}
		}		
		
	?>	
		
	<img id="bottom" src="css/bottom.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	</body>
<?php
}
else
{
	header("location: login.php");
}
?>
</html>