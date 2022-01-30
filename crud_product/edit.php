<?php
	include('conn.php');
	

	$id=$_GET['id'];

	$codigo=$_POST['code'];
	$genero=$_POST['gender'];
	$cat=$_POST['category'];
	$nombre=$_POST['name'];
	$marca=$_POST['brand'];
	$desc=$_POST['about'];
	$cost=$_POST['costo'];
	$prec=$_POST['precio'];
	$qty=$_POST['stock'];
	$tallas=$_POST['talla'];
	$fecha=$_POST['date'];
	$archivo = $_FILES['image']['name'];
	

	
    if (isset($archivo) && $archivo == "") {
        mysqli_query($conn,"update product set code='$codigo',gender='$genero',category='$cat', 
		name='$nombre', brand='$marca',about='$desc',costo='$cost',precio='$prec',stock='$qty',talla='$tallas',date='$fecha' where id='$id'");
		header('location:index.php');
    }
    else{

		$tipo = $_FILES['image']['type'];
		$tamano = $_FILES['image']['size'];
		$temp = $_FILES['image']['tmp_name'];
		$imgData =addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$imageProperties = getimageSize($_FILES['image']['tmp_name']);
		$ruta = 'assets/images/'.$codigo.'/';
		$destino = $ruta.$archivo;
		
        copy($temp,$destino);

		mysqli_query($conn,"update product set code='$codigo',gender='$genero',category='$cat', 
		name='$nombre', brand='$marca',about='$desc',costo='$cost',precio='$prec',stock='$qty',talla='$tallas',date='$fecha',imgType='{$imageProperties['mime']}',imgData='{$imgData}' where id='$id'");
		
    }
    header('location:index.php');

?>