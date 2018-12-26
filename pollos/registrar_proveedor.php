<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['ok']=="ok")
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registrar Proveedor</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="css/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registrar Proveedor</a></h1>
		<form id="form_1075005" class="appnitro"  method="post" action="registrar_proveedor2.php">
					<div class="form_description">
			<h2>Registrar Proveedor</h2>
			<p></p>
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">NIT </label>
		<div>
			<input id="cc" name="nit" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>		
		<li id="li_2" >
		<label class="description" for="element_3">Nombre </label>
		<div>
			<input id="cargo" name="nombre" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>		
		<li id="li_3" >
		<label class="description" for="element_4">Telefono </label>
		<div>
			<input id="password" name="telefono" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>
		<li id="li_4" >
		<label class="description" for="element_4">Direccion </label>
		<div>
			<input id="password" name="direccion" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>
		<li id="li_5" >
		<label class="description" for="element_4">Email </label>
		<div>
			<input id="password" name="email" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="1075005" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Registrar" />
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
	header("location: login.php");
}
?>
</html>