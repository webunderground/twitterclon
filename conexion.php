<?php
$conexion = mysqli_connect("localhost","root","password","twitter");

if (!$conexion) {
 die("Error de conexi�n (".mysqli_connect_errno().")".mysqli_connect_error());
} 
?>