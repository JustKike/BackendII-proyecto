<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$idProducto=$_POST['product_id'];
	$nomProd=$_POST['name'];
	$qty=$_POST['quantity'];
	$cost=$_POST['costo'];
	$cliente=$_POST['member_id'];
	$fecha=$_POST['date'];
	
	mysqli_query($conn,"update tbl_sold set product_id='$idProducto',name='$nomProd',quantity='$qty', 
	costo='$cost', member_id='$cliente',date='$fecha' where id='$id'");
	header('location:index.php');

?>