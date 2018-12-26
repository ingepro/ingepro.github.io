<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Ventas</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Ventas</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="ventas.php">
					<div class="form_description">
			<h2>Ventas</h2><a title=" Registrar Venta? " href="registrar_venta.php">  <img src="css/newc.jpg">  </a>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">NRO FACTURA </label>
		<div>
			<input id="cc" name="id" class="element text medium" type="text" maxlength="255" value="" required /> 
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
			$id=$_POST['id'];
			$result=$con->query("SELECT * FROM ventas v inner join personal p on v.ccresponsable=p.cc WHERE v.nrofactura='$id'");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{			
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="8" cellpadding="3">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">NRO FACTURA</td>
		 <td align="center">FECHA</td>
		 <td align="center">RESPONSABLE</td>
		 <td align="center">CC</td>
		 <td align="center">Nro ARTICULOS</td>
		 <td align="center">TOTAL</td>		 
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		$row = $result->fetch_array();
		$nro=$row['nrofactura'];
		$c=$con->query("SELECT COUNT(nrofactura) as prods FROM detalleventas WHERE nrofactura='$nro'");
		$r=$c->fetch_array();
		$c2=$con->query("SELECT sum(valor*cantidad) as tot FROM detalleventas WHERE nrofactura='$nro'");
	    $r2=$c2->fetch_array();
		?>
			
			<tr>
			 <td align="center"><?php echo $row['nrofactura']; ?></td>
			 <td align="center"><?php echo $row['fecha'];?></td>
			 <td align="center"><?php echo $row['nombre']." ".$row['apellidos']; ?></td>
			 <td align="center"><?php echo $row['cc']; ?></td>
			 <td align="center"><?php echo $r['prods']; ?></td>
			 <td align="center"><?php echo $r2['tot']; ?></td>			
			 <td align="center"><a title=" Eliminar? " href="eliminar_venta.php?nro=<?php echo $row['nrofactura']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_venta.php?nro=<?php echo $row['nrofactura']; ?>">  <img src="css/edit.jpg">  </a> </td>
			</tr>
			<tr>
				<td align="center" colspan="9"><a href="ventas.php"><--</a></td>
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
			
			$result=$con->query("SELECT * FROM ventas v inner join personal p on v.ccresponsable=p.cc");
			
	?>
	
	<img id="top" src="css/top.png" alt="">
	<center><a href="almacen.php"><---</a></center>
	<div id="form_container">
	
		<?php
		if($result->num_rows > 0)
		{
		?>
		
		<table id="form_1075005" class="appnitro" cellspacing="8" cellpadding="3">
		
				
		<tr bgcolor="#FF8000">
		 <td align="center">NRO FACTURA</td>
		 <td align="center">FECHA</td>
		 <td align="center">RESPONSABLE</td>
		 <td align="center">CC</td>
		 <td align="center">Nro ARTICULOS</td>
		 <td align="center">TOTAL</td>		 
		 <td align="center">< - --- - ></td>
		</tr>
		
		<?php
		while($row = $result->fetch_array())
		{
			$nro=$row['nrofactura'];
			$c=$con->query("SELECT COUNT(nrofactura) as prods FROM detalleventas WHERE nrofactura='$nro'");
			$r=$c->fetch_array();
			$c2=$con->query("SELECT sum(valor*cantidad) as tot FROM detalleventas WHERE nrofactura='$nro'");
			$r2=$c2->fetch_array();
			
		?>
			
			<tr>
			 <td align="center"><?php echo $row['nrofactura']; ?></td>
			 <td align="center"><?php echo $row['fecha'];?></td>
			 <td align="center"><?php echo $row['nombre']." ".$row['apellidos']; ?></td>
			 <td align="center"><?php echo $row['cc']; ?></td>
			 <td align="center"><?php echo $r['prods']; ?></td>
			 <td align="center"><?php echo $r2['tot']; ?></td>			
			 <td align="center"><a title=" Eliminar? " href="eliminar_venta.php?nro=<?php echo $row['nrofactura']; ?>"><font size='5' color="#FF8071">x</font></a>&nbsp <a title=" Editar? " href="editar_venta.php?nro=<?php echo $row['nrofactura']; ?>">  <img src="css/edit.jpg">  </a> </td>
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