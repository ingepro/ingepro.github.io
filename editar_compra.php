<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
    include("conexion.php");
	$con=conectarse();
if(isset($_GET['nro']))
{
	
	$nro=$_GET['nro'];
	$result=$con->query("SELECT * FROM compras c INNER JOIN personal p ON c.ccresponsable=p.cc WHERE c.nrofactura='$nro'");
	$row = $result->fetch_array();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Modificar Factura De Compra</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">


</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Modificar Factura De Compra</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="editar_compra.php">
					<div class="form_description">
			<h2>Modificar Factura De Compra</h2>
			<p></p>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">NRO FACTURA </label>
		<div>
			<input id="nro" name="nro" class="element text medium" type="text" maxlength="255" value="<?php echo $row['nrofactura']; ?>" readonly /> 
		</div> 
		</li>
		<li id="li_2" >
		<label class="description" for="element_2">RESPONSABLE </label>
		<span>
		
										<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
										<script language="JavaScript" type="text/JavaScript">
											$(document).ready(function(){
												$("#cc").change(function(event){
													var id = $("#cc").find(':selected').val();
													$("#nombre").val(id);
													var c = $("#cc option:selected" ).text();
													$("#ced").val(c);
													
												});
											});
										</script>
			<input type="hidden" id="ced" name="ced" value=" <?php echo $row['cc']; ?> " />							
			<select id="cc" name="cc">
			<?php			
			$result2=$con->query("SELECT * FROM personal");
			while($row2 = $result2->fetch_array())
			{
				?>
				 <option  value="<?php echo $row2['nombre']."  ".$row2['apellidos']; ?>"  <?php if($row['ccresponsable'] == $row2['cc']){ ?> selected <?php } ?> > <?php echo $row2['cc']; ?> </option> 
				<?php
			}
			?>
			</select>
			<label>CC</label>
		</span>
		<span>
			<input id="nombre" name= "nombre" class="element text" maxlength="255" size="14" value="<?php echo $row['nombre']."  ".$row['apellidos']; ?>" readonly />
			<label>&nbsp&nbspFirst&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLast</label>
		</span> 		
		</li>			
		<li id="li_4" >
		<label class="description" for="element_4">FECHA </label>
		<div>
			<input id="fecha" name="fecha" class="element text medium" type="text" maxlength="255" value="<?php echo $row['fecha']; ?>" required /> 
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
	<?php 
	
		$result=$con->query("SELECT * FROM detallecompras d INNER JOIN productos p ON d.idproducto=p.id WHERE nrofactura=$nro");		
	?>
	<center>
	<div id="form_container">
	<div class="form_description">
	<table class="appnitro" cellspacing="15" cellpadding="5">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">ID PRODUCTO</td>
		 <td align="center">NOMBRE</td>
		 <td align="center">CANTIDAD</td>
		 <td align="center">VALOR</td>
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		while($row = $result->fetch_array())
		{
		?>
			
			<tr>
			 <td align="center"><?php echo $row['idproducto']; ?></td>
			 <td align="center"><?php echo $row['nombre']; ?></td>
			 <td align="center"><?php echo $row['cantidad']; ?></td>
			 <td align="center"><?php echo $row['valor']; ?></td>
			 <td align="center"><a title=" Eliminar? " href="eliminar_detallecompra.php?id=<?php echo $row['idproducto']; ?>&nro=<?php echo $nro; ?>&cant=<?php echo $row['cantidad']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_detallecompra.php?nro=<?php echo $row['nrofactura']; ?>&id=<?php echo $row['idproducto']; ?>">  Edit  </a> </td>
			</tr>
		<?php
		}
		?>		
		</table>
		</div>
		</div>		
		</center>
	
	
	
	
	<img id="bottom" src="css/bottom.png" alt="">
	</body>
<?php
}
	
	if(isset($_POST['submit']))
	{				
		$nro=$_POST['nro'];
		$resp=$_POST['ced'];
		$fecha=$_POST['fecha'];		
		$result=$con->query("UPDATE compras SET fecha='$fecha', ccresponsable=$resp WHERE nrofactura=$nro");	
			
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