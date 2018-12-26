<?php
function conectarse()
{
$mysqli = new mysqli("localhost", "root", "", "pollos");	
if ($mysqli->connect_errno)
{
echo'ERROR CONECTANDO CON EL SERVIDOR' . $mysqli->connect_errno ;
exit();
}
return $mysqli;
}
conectarse();
?>
