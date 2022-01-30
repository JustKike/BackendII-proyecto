<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$usuario=$_POST['user'];
	$contra=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$rol=$_POST['userrol'];
	$fecha=$_POST['date'];
	
	mysqli_query($conn,"update login set user='$usuario',password='$contra',firstname='$firstname', 
	lastname='$lastname', address='$address',userrol='$rol',date='$fecha' where id='$id'");
	header('location:index.php');

?>