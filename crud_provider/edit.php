<?php
	include('conn.php');

	$id=$_GET['id'];

	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];

	mysqli_query($conn,"update proveedor set nombre='$nombre',direccion='$direccion',telefono='$telefono',
	correo='$correo' where id='$id'");
	header('location:index.php');

?>
