<?php
	include('conn.php');

	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];

	mysqli_query($conn,"insert into proveedor (nombre,direccion,telefono,correo)
	values ('$nombre','$direccion','$correo', '$telefono')");
	header('location:index.php');

?>
