<?php
	include('conn.php');
	
	$usuario=$_POST['user'];
	$contra=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$rol=$_POST['userrol'];
	$fecha=$_POST['date'];
	
	mysqli_query($conn,"insert into login (user,password,firstname, lastname, address,userrol,date) 
	values ('$usuario','$contra','$firstname', '$lastname', '$address','$rol','$fecha')");
	header('location:index.php');

?>