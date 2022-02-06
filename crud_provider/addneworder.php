<?php
	include('conn.php');

	$nombre=$_POST['nombre'];
	$cantidad=$_POST['cantidad'];
	$proveedor=$_POST['proveedor'];


	mysqli_query($conn,"insert into orden_compra (nombre,cantidad,proveedor)
	values ('$nombre','$cantidad','$proveedor')");
	header('location:index.php');

?>
