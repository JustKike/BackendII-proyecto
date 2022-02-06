<?php
	include('conn.php');

	$id=$_GET['id'];

	$nombre=$_POST['nombre'];
	$cantidad=$_POST['Cantidad'];
	$proveedor=$_POST['Proveedor'];

	mysqli_query($conn,"UPDATE orden_compra SET nombre='$nombre', Cantidad='$cantidad', Proveedor='$proveedor' where id='$id'");
	header('location:consulta_compra.php');

?>
