<?php
//incluimos el archivo de conexion con la BD
include('conn.php');
//if para comprobar que los campos esten llenos
if (empty($_POST["name"])) {
    exit("Falta el nombre");
}

if (empty($_POST["email"])) {
    exit("Falta el correo");
}

if (empty($_POST["comments"])) {
    exit("Falta el mensaje");
}
//guardamos los datos de los inputs en variables
$nombre = $_POST["name"];
$correo = $_POST["email"];
$mensaje = $_POST["comments"];
//Query que envia los datos a la tabla en la BD
mysqli_query($conn,"insert into contacto (nombre, correo, mensaje) 
	values ('$nombre','$correo','$mensaje')");
    //despues de enviar los datos nos dirige a la interfaz de la tienda
	header('location:MiTienda.php');
?>