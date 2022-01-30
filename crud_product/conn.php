<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","calzado_endromides");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>