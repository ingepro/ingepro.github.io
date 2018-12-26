<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registrar Compra</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registrar Compra</a></h1>
		 <form id="form_1075005" class="appnitro2"  method="post" action="registrar_compra2.php">
					<div class="form_description">
			<h2>Registrar Compra</h2>
			<p></p>
		</div>						
			<ul >
				<?php
					include("conexion.php");
					$con=conectarse();
					$result=$con->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'pollos' AND TABLE_NAME = 'compras'");
				    $row = $result->fetch_array();
				?>		
					<center>
					<table class="appnitro2" cellspacing="4" cellpadding="4">
					<tr bgcolor="#FF8000">
					<li id="li_1" >
					<td>
					<label class="description" for="element_2">Responsable </label>
					<span>
						<input id="resp" name= "resp" class="element text" maxlength="255" size="11" value="<?php echo $_SESSION['nomusuario']." ".$_SESSION['apeusuario']; ?>" readonly />		
							<input type="hidden" name= "cc" class="element text" maxlength="255" size="11" value="<?php echo $_SESSION['ccusuario']; ?>" />
					</span>
					</td>
					<td>
					<label class="description" for="element_2">Factura Nro </label>
					<span>
						<input id="apellido" name= "nrofactura" class="element text" maxlength="255" size="11" value="<?php echo $row['AUTO_INCREMENT'] ?>" readonly />						
					</span> 
					</td>									
					<td>
					<label class="description" for="element_2">Fecha </label>
					<span>
						<input id="apellido" name= "fecha" class="element text" maxlength="255" size="11" value="<?php echo date("Y-m-d"); ?>" required />						
					</span> 
					</td>
					</li>
					</tr>
					</table>
					</center>
					<br>
					<center>
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Finalizar" />
				</li>
				</center>
				</form>
				<br>
				<center><a href="almacen.php"><---</a></center>
					<?php					
					$result=$con->query("SELECT * FROM almacen");
					$row = $result->fetch_array();
					echo "<center>".$row['nombre']."  ".$row['direccion']."</center>";
					?>
					<br>
					<center>
					<table class="appnitro" cellspacing="5" cellpadding="5">
					<form class="appnitro"  method="post" action="registrar_compra.php"> 
					<tr bgcolor="#FF9025">
					<li id="li_1" >
					<td>
					<label class="description" for="element_2">Codigo del producto </label>
					<span>
						<input id="codigo" name="codigo" class="element text" maxlength="255" size="17" value="" required />						
					</span>
					</td>
					
					<td>
					<label class="description" for="element_2">Cant.</label>
					<span>
						<input id="cantidad" name= "cantidad" class="element text" maxlength="255" size="8" value="" required />						
					</span>
					</td>
					
					
					</li>
					</tr>
					<tr align="center" bgcolor="green">
					<td colspan="5" align="center">
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="+" />
				</li>
					</td>
					</tr>
					</form>
					</table>
					</center>
					<?php
					if(isset($_POST['submit']))
					{
						$codigo = $_POST['codigo'];
						$result=$con->query("SELECT * FROM productos WHERE id='$codigo'");
						if($result->num_rows==1)
						{
						$row = $result->fetch_array();	
						$producto = $row['nombre'];
						$cant = $_POST['cantidad'];
						$precio = $row['preciocompra'];
						$sub = $row['preciocompra'] * $cant;
						$c=$con->query("SELECT * FROM tempdetalle WHERE codigo='$codigo'");
						//$rowcount=mysqli_num_rows($c);
						if($c->num_rows==1)
						{
							$con->query("UPDATE tempdetalle SET cant='$cant', subtotal='$sub' WHERE codigo='$codigo'");
						}
						else
						{
							$ins = $con->query("INSERT INTO tempdetalle(codigo, producto, cant, valorun, subtotal) 
						    VALUES ('$codigo','$producto','$cant','$precio','$sub')");
						}
						}
											
					?>						
						<!-- <script language="javascript"type="text/javascript">
						document.getElementById("producto").value = '//<?php //echo $row['nombre']; ?>';
						</script> -->
					<?php
					
					
					$sel = $con->query("SELECT * FROM tempdetalle");					
					echo "<center><table id='form_1075005'class='appnitro' cellspacing='8' cellpadding='3'> 
							<tr>
								<td align='center'>CODIGO</td>
								<td align='center'>PRODUCTO</td>
								<td align='center'>CANTIDAD</td>
								<td align='center'>VALOR UN.</td>
								<td align='center'>SUBTOTAL</td>
							</tr>";
					while($res = $sel->fetch_array())
					{
						?>
			
						<tr>
						 <td align="center"><?php echo $res['codigo']; ?></td>
						 <td align="center"><?php echo $res['producto']; ?></td>
						 <td align="center"><?php echo $res['cant']; ?></td>
						 <td align="center"><?php echo $res['valorun']; ?></td>
						 <td align="center"><?php echo $res['subtotal']; ?></td>
						</tr>
					    
						<?php
					}		
					
					
					?>
					<tr>
					<td colspan="5" align="right">Total: <?php  $s=$con->query("SELECT sum(subtotal) as suma FROM tempdetalle"); $r=$s->fetch_array();	echo $r['suma']; ?> </td>
					</tr>
					</table>	
					</center>	
					<?php
					}
					
					?>
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
	header("location: login.php");
}
?>
</html>