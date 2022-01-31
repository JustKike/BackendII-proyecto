<?php
	// Conexcion con la BD
	include('conn.php');
	// Guardarmos los datos de los input en variables
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	// Agregamos el query para insertar los datos dentro de la tabla en la BD
	mysqli_query($conn,"insert into proveedor (nombre,direccion,telefono,correo)
	values ('$nombre','$direccion','$telefono','$correo')");
	// Redirigimos al index
	header('location:index.php');
?>
