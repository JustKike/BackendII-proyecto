<?php
	session_start();

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		
	}else{
		echo "Esta pagina  es solo para usuarios registrados.<br>";
		header('Location: /Backend II/Calzado_Endromides/index3.php');
		exit;
	}
	$now = time();

	if($now > $_SESSION['expire']){
		session_destroy();
		echo "su sesion a terminado.<br>";
		header('Location: /Backend II/Calzado_Endromides/index4.php');
		exit;
	} 
	//numero de recargas
	
	if (isset($_SESSION["contar"])) { //Comprueba si el contador existe.
		$_SESSION["contar"]++; //si existe añade una unidad al contador.
		}
	 else {
		$_SESSION["contar"]=1; //si no existe se crea con valor 1 inicial.
		}
	 $contar=$_SESSION["contar"]; //guardar en una variable más manejable.

//ShoppingCart
require_once "ShoppingCart.php";

$member_id = $_SESSION['user']; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
 
$shoppingCart->updateCartQuantity($_POST["new_quantity"], $_POST["cart_id"]);
                
?>