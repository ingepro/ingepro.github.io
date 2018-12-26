<?php

$dbh = mysql_connect("localhost","root" ,"");
$db = mysql_select_db("pollos");

$consulta = "SELECT * from personal WHERE cc = ".$_GET['cc'];
$query = mysql_query($consulta);
$fila = mysql_fetch_array($query);
    while ($fila = mysql_fetch_array($query)) {
    echo '<option value="'.$fila['nombre'].'">'.$fila['nombre'].'</option>';
}


?>