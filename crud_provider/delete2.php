<?php
	include('conn.php');
	$id=$_GET['id'];
	mysqli_query($conn,"DELETE FROM orden_compra WHERE id='$id'");
	header('location:consulta_compra.php');

?>
