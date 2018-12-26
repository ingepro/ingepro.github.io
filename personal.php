<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Planta De Personal</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Planta De Personal</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="personal.php">
					<div class="form_description">
			<h2>Planta De Personal</h2><a title=" Registrar Personal Nuevo? " href="registrar_personal.php">  <img src="css/newc.jpg">  </a>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Cedula </label>
		<div>
			<input id="cc" name="cc" class="element text medium" type="text" maxlength="255" value="" required /> 
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
			$cedula=$_POST['cc'];
			$result=$con->query("SELECT * FROM personal WHERE cc='$cedula'");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="25" cellpadding="10">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">CEDULA</td>
		 <td align="center">NOMBRE</td>
		 <td align="center">CARGO</td>
		 <td align="center">TIPO DE USUARIO</td>
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		$row = $result->fetch_array();
		?>
			
			<tr>
			 <td align="center"><?php echo $row['cc']; ?></td>
			 <td align="center"><?php echo $row['nombre'].' '.$row['apellidos']; ?></td>
			 <td align="center"><?php echo $row['cargo']; ?></td>
			 <td align="center"><?php echo $row['tipousuario']; ?></td>
			 <td align="center"><a title=" Eliminar? " href="eliminar_personal.php?cc=<?php echo $row['cc']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_personal.php?cc=<?php echo $row['cc']; ?>">  <img src="css/edit.jpg">  </a> </td>
			</tr>
			<tr>
				<td align="center" colspan="5"><a href="personal.php"><--</a></td>
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
			
			$result=$con->query("SELECT * FROM personal");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	
	<center><a href="almacen.php"><---</a></center>
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="25" cellpadding="10">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">CEDULA</td>
		 <td align="center">NOMBRE</td>
		 <td align="center">CARGO</td>
		 <td align="center">TIPO DE USUARIO</td>
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		while($row = $result->fetch_array())
		{
		?>
			
			<tr>
			 <td align="center"><?php echo $row['cc']; ?></td>
			 <td align="center"><?php echo $row['nombre'].' '.$row['apellidos']; ?></td>
			 <td align="center"><?php echo $row['cargo']; ?></td>
			 <td align="center"><?php echo $row['tipousuario']; ?></td>
			 <td align="center"><a title=" Eliminar? " href="eliminar_personal.php?cc=<?php echo $row['cc']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_personal.php?cc=<?php echo $row['cc']; ?>">  <img src="css/edit.jpg">  </a> </td>
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