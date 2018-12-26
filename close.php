<?php
  session_start();
  unset($_SESSION['ok']);
  unset($_SESSION['ccusuario']); 
  unset($_SESSION['nomusuario']);
  unset($_SESSION['apeusuario']);
  unset($_SESSION['rol']);
  session_destroy();
  header("location: almacen.php");
  exit;
?>