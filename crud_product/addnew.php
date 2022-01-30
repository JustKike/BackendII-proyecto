<?php
	
	include('conn.php');
	
			$codigo=$_POST['code'];
			$genero=$_POST['gender'];
			$categoria=$_POST['category'];
			$nombre=$_POST['name'];
			$marca=$_POST['brand'];
			$desc=$_POST['about'];
			$cost=$_POST['costo'];
			$prec=$_POST['precio'];
			$qty=$_POST['stock'];
			$tallas=$_POST['talla'];
			$fecha=$_POST['date'];

//Si se quiere subir una imagen
if (isset($_POST['Guardar'])) {
	//Recogemos el archivo enviado por el formulario
	$archivo = $_FILES['image']['name'];
	//Si el archivo contiene algo y es diferente de vacio
	if (isset($archivo) && $archivo != "") {
	   //Obtenemos algunos datos necesarios sobre el archivo
	   $tipo = $_FILES['image']['type'];
	   $tamano = $_FILES['image']['size'];
	   $temp = $_FILES['image']['tmp_name'];
	   $imgData =addslashes(file_get_contents($_FILES['image']['tmp_name']));
	   $imageProperties = getimageSize($_FILES['image']['tmp_name']);

	   //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
	  if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
		 echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
		 - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
	  }
	  else {
		 //Si la imagen es correcta en tamaño y tipo
		 //Se intenta subir al servidor

		 $path = 'assets/images/'.$codigo.'/';
		 if (!is_dir($path)) {
			mkdir($path, 0777, true);

			if (move_uploaded_file($temp, 'assets/images/'.$codigo.'/'.$archivo)) {
				//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
				chmod('assets/images/'.$codigo.'/'.$archivo, 0777);
				//Mostramos el mensaje de que se ha subido con éxito
				echo'<center>';
				echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
				
				//Cargar imagen y formulario a la BD
				

				
				mysqli_query($conn,"insert into product (code,gender,category,name,brand,about,costo,precio,stock,talla,date, imgType, imgData) 
				values ('$codigo','$genero','$categoria','$nombre','$marca','$desc','$cost','$prec','$qty','$tallas','$fecha','{$imageProperties['mime']}','{$imgData}')");
				header('location:index.php');
	
			}
			else {
				//Si no se ha podido subir la imagen, mostramos un mensaje de error
				echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
			}
		}else {
			//Si no se ha podido crear la carpeta, mostramos un mensaje de error
			echo '<div><b>Ocurrió algún error al crear el fichero. No pudo guardarse.</b></div>';
		}

	   }
	}
 }


?>
