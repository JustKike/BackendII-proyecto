<?php
	session_start();
	//si no existe una sesión llamada rol, lo dirige al login
	if (!isset($_SESSION['rol'])) {
		header('location: login.php');
	} else {
		//si el usuario rol es de cliente lo redirije al index5
		if ($_SESSION['rol'] == 'Cli') {
			header('location: ../index5.php');
			exit;
		}
	}
	// verifica si hay inicio de sesion
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	} else {
		echo "Esta pagina  es solo para usuarios registrados.<br>";
		header('Location: ../index3.php');
		exit;
	}
	// termina la sesion despues de cierto tiempo
	$now = time();
	if ($now > $_SESSION['expire']) {
		session_destroy();
		echo "su sesion a terminado.<br>";
		header('Location: ../index4.php');
		exit;
	}
	//numero de recargas

	if (isset($_SESSION["contar"])) { //Comprueba si el contador existe.
		$_SESSION["contar"]++; //si existe añade una unidad al contador.
	} else {
		$_SESSION["contar"] = 1; //si no existe se crea con valor 1 inicial.
	}
	$contar = $_SESSION["contar"]; //guardar en una variable más manejable.

?>

<!DOCTYPE html>
<html>

<head>
	<!-- meta datos de la aplicacion -->
	<title>GESTION DE USUARIOS</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/Bold-BS4-Text-Shadow-Effects.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/main.min.css">
</head>
<!-- Estilos para los elementos de la pagina -->
<style>
	h1 {
		font-family: Georgia, 'Times New Roman', Times, serif;
	}

	h1 {
		text-align: center
	}

	h2 {
		font-family: Georgia, 'Times New Roman', Times, serif;
	}

	h2 {
		text-align: center
	}

	body {
		background-color: #ffdd90;
		background-image: url("../assets/img/wall-background-or.jpg");
		margin: 29px;
		padding: auto;
	}

	.sombra_svg {
		-webkit-filter: drop-shadow(0px 0px 5px #333);
		filter: drop-shadow(0px 0px 5px #333);
	}

	.button {
		display: inline-block;
		border-radius: 4px;
		background-color: #3498DB;
		border: #273746;
		color: #FFFFFF;
		text-align: center;
		font-size: 13px;
		padding: 10px;
		transition: all 0.5s;
		cursor: pointer;
		margin: 5px;
		border-radius: 15px;
		box-shadow: 0 0 10px 3px #273746;
	}

	.button span {
		cursor: pointer;
		display: inline-block;
		position: relative;
		transition: 0.5s;
	}

	.button span:after {
		content: "";
		position: absolute;
		opacity: 0;
		top: -0.9em;
		right: -5px;
		transition: 0.5s;
		width: 40px;
		height: 40px;
		transform: scale(0.05);
	}

	.button:hover {
		background-color: #000080;
		box-shadow: 0 0 10px 0 #273746 inset, 0 0 10px 4px #273746;

	}

	.button:hover span {
		padding-right: 25px;
	}

	.button:hover span:after {
		opacity: 1;
		right: 0;
	}

	.button:active {
		background-color: #273746;
		box-shadow: 0 5px #1C2833;
		transform: translateY(4px);
		box-shadow: 0 0 10px 0 #273746 inset, 0 0 10px 4px #273746;
	}

	.dropbtn {
		display: inline-block;
		border-radius: 4px;
		background-color: #4CAF50;
		border: #273746;
		color: #FFFFFF;
		text-align: center;
		font-size: 13px;
		padding: 10px;
		transition: all 0.5s;
		cursor: pointer;
		margin: 5px;
		border-radius: 15px;
		box-shadow: 0 0 10px 3px #273746;
	}

	.dropdown {
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		min-width: 160px;
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown-content a:hover {
		background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
		display: block;
	}

	.dropdown:hover .dropbtn {
		background-color: #3e8e41;
	}
</style>

<body>
	<!-- contenedor -->
	<div class="container" style="margin:auto; padding:auto; height: auto;word-wrap: break-word;">
		<!-- espacio entre los elementos -->
		<div style="height:50px;"></div>
		<!-- titulo de encabezado -->
		<div class="well sombra_svg" style="margin:auto; padding:auto; width:110%;">
			<center>
				<h1 class="text-center border rounded shadow" style="color: rgb(0, 255, 255);background-color: rgba(8, 0, 0);font-size: 20px;filter: blur(0px);padding: 20px;">
					Bienvenido <?php echo  $_SESSION['user']; ?></h1>
					<!-- estilo de texto para fecha -->
				<?php
				date_default_timezone_set("America/Tijuana");
				$color = "#58D68D";
				$color2 = "#5D6D7E";
				$color3 = "#FF9403";
				$color4 = "#FD6563";
				$date1 = date('Y-m-d H:i:s', $_SESSION['start']);
				$date2 = date('Y-m-d H:i:s', $_SESSION['expire']);
				// insertamos fecha de inicio de sesion y fecha de expiracion
				echo "<p><font color='" . $color . "'>" . $date1 . " / " . "</font>" . "<font color='" . $color4 . "'>" . $date2 . "</font></p>";
				echo "<p><font color='" . $color2 . "'>" . "Número de páginas recorridas o recargadas: " . "</font>" . "<font color='" . $color3 . "'>" . $contar . "</font></p>";
				?>
			</center>
			<!-- Segundo titulo -->
			<div style="border-top:1px solid gray;"></div>
			<h2 class="text-center border rounded shadow" style="color: rgb(253, 155, 8);font-size: 40px;">
				<center><strong>GESTION DE VENTAS</strong></center>
			</h2>
			<div style="border-top:1px solid gray;"></div>
			<br>
			<!-- inciamos tabla para el crud -->
			<table class="table table-striped table-bordered table-hover">
				<!-- cabeza de la tabla -->
				<thead>
					<th>
						<center>ID Venta</center>
					</th>
					<th>
						<center>ID Producto</center>
					</th>
					<th width="15%">
						<center>Nombre</center>
					</th>
					<th>
						<center>Cantidad</center>
					</th>
					<th>
						<center>Costo</center>
					</th>
					<th>
						<center>Cliente</center>
					</th>
					<th>
						<center>Fecha de Venta</center>
					</th>
					<th width="auto">
						<center>Accion</center>
					</th>
				</thead>
				<!-- insertamos filas -->
				<tbody>
					<!-- conexion con la BD -->
					<?php
					include('conn.php');
					// Seleccionamos los datos de la BD
					$query = mysqli_query($conn, "select * from `tbl_sold`");
					while ($row = mysqli_fetch_array($query)) {
					?> 
					<!-- elementos para filas -->
						<tr>
							<td align="center"><?php echo ucwords($row['id']); ?></td>
							<td align="center"><?php echo ucwords($row['product_id']); ?></td>
							<td align="center"><?php echo ucwords($row['name']); ?></td>
							<td align="center"><?php echo ucwords($row['quantity']); ?></td>
							<td align="center"><?php echo ucwords("$ ".$row['costo']); ?></td>
							<td align="center"><?php echo ucwords($row['member_id']); ?></td>
							<td align="center"><?php echo $row['date']; ?></td>
							<td>
								<!-- dropdown para botones de accion editar/eliminar -->
								<div class="dropdown">
									<button onclick="myFunction()" class="dropbtn button" style="width:100%;"><span class="glyphicon glyphicon-option-vertical"></span>Options</button>
									<div id="myDropdown" class="dropdown-content">
										<a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning button">
											<span class="glyphicon glyphicon-edit"></span>Editar</a>
										<a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger button">
											<span class="glyphicon glyphicon-trash"></span> Eliminar</a>
									</div>
								</div>
								<!-- llamamos el archivo button para editar o eliminar contenido -->
								<?php include('button.php'); ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<!-- boton para volver atras -->
			<div style="height:10px;"></div>
			<form action="../menu.php">
				<button class="button" style="vertical-align:middle;width: 10%;"><span>atras </span></button>
			</form>
		</div>
	</div>
</body>

</html>