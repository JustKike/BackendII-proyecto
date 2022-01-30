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

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
	echo "Esta pagina  es solo para usuarios registrados.<br>";
	header('Location: ../index3.php');
	exit;
}
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
	<meta charset="UTF-8">
	<title>GESTION DE PRODUCTOS</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/Bold-BS4-Text-Shadow-Effects.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/main.min.css">

	<link rel="stylesheet" type="text/css" href="assets/css/styles2.css">
	<link rel="stylesheet" type="text/css" href="assets/css/DT_bootstrap.css">
	<script src="assets/js/jquery.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/DT_bootstrap.js"></script>
</head>
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
		background: url(assets/img/fondo3.jpg)no-repeat center center fixed;
		background-size: cover;
		-moz-background-size: cover;
		-webkit-background-size: cover;
		-o-background-size: cover;
	}
</style>

<script type="text/javascript">
	function mostrarPassword() {
		var cambio = document.getElementById("txtPassword");
		if (cambio.type == "password") {
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		} else {
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}

	$(document).ready(function() {
		//CheckBox mostrar contraseña
		$('#ShowPassword').click(function() {
			$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
		});
	});
</script>


<body>
	<div class="container">
		<div style="height:50px;"></div>
		<div class="well sombra_svg " style="margin:auto; padding:auto; width:110%;">
			<center>
				<h1 class="text-center border rounded shadow" style="color: rgb(0, 255, 255);background-color: rgba(8, 0, 0);font-size: 20px;filter: blur(0px);padding: 20px;">
					Bienvenido <?php echo  $_SESSION['user']; ?></h1>
				<?php
				date_default_timezone_set("America/Tijuana");
				$color = "#58D68D";
				$color2 = "#5D6D7E";
				$color3 = "#FF9403";
				$color4 = "#FD6563";
				$date1 = date('Y-m-d H:i:s', $_SESSION['start']);
				$date2 = date('Y-m-d H:i:s', $_SESSION['expire']);

				echo "<p><font color='" . $color . "'>" . $date1 . " / " . "</font>" . "<font color='" . $color4 . "'>" . $date2 . "</font></p>";
				echo "<p><font color='" . $color2 . "'>" . "Número de páginas recorridas o recargadas: " . "</font>" . "<font color='" . $color3 . "'>" . $contar . "</font></p>";
				?>
				<div style="border-top:1px solid gray;"></div>
				<br>
			</center>
			<h2 class="text-center border rounded shadow" style="color: rgb(253, 155, 8);font-size: 40px;">
				<center><strong>GESTION DE PRODUCTOS</strong></center>
			</h2>
			<div style="border-top:1px solid gray;"></div>
			<br>
			<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Registro</a></span>
			<div style="height:50px;"></div>

			<table class="table table-striped table-bordered table-hover " id="example">
				<thead>
					<th>
						<center>Codigo</center>
					</th>
					<th>
						<center>Genero</center>
					</th>
					<th>
						<center>Categoria</center>
					</th>
					<th>
						<center>Nombre</center>
					</th>
					<th>
						<center>Marca</center>
					</th>
					<th>
						<center>Descripcion</center>
					</th>
					<th>
						<center>Costo</center>
					</th>
					<th>
						<center>Precio</center>
					</th>
					<th>
						<center>Stock</center>
					</th>
					<th>
						<center>Talla</center>
					</th>
					<th>
						<center>Fecha</center>
					</th>
					<th>
						<center>Vista</center>
					</th>
					<th width="auto">
						<center>Accion</center>
					</th>
				</thead>
				<tbody>

					<?php
					include('conn.php');

					$query = mysqli_query($conn, "select * from `product`");
					while ($row = mysqli_fetch_array($query)) {
						$codigo = $row['id'];
					?>
						<tr>
							<td align="center"><?php echo ucwords($row['code']); ?></td>
							<td align="center"><?php echo ucwords($row['gender']); ?></td>
							<td align="center"><?php echo ucwords($row['category']); ?></td>
							<td align="center"><?php echo ucwords($row['name']); ?></td>
							<td align="center"><?php echo ucwords($row['brand']); ?></td>
							<td align="center"><?php echo ucwords($row['about']); ?></td>
							<td align="center"><?php echo ucwords($row['costo']); ?></td>
							<td align="center"><?php echo ucwords($row['precio']); ?></td>
							<td align="center"><?php echo ucwords($row['stock']); ?></td>
							<td align="center"><?php echo ucwords($row['talla']); ?></td>
							<td align="center"><?php echo $row['date']; ?></td>
							<td align="center">

								<div class="dropup1">
									<img src="imageView.php?image_id=<?php echo $codigo ?>" width="100" height="80">
									<div class="dropup1-content">
										<img src="imageView.php?image_id=<?php echo $codigo ?>" width="300" height="300">
										<div class="desc"><?php echo ucwords($row['name']); ?></div>
									</div>
								</div>
							</td>
							<td>
								<div class="dropdown">
									<button onclick="myFunction()" class="dropbtn button" style="width:100%;"><span class="glyphicon glyphicon-option-vertical"></span>Options</button>
									<div id="myDropdown" class="dropdown-content">
										<a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning button">
											<span class="glyphicon glyphicon-edit"></span>Editar</a>
										<a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger button">
											<span class="glyphicon glyphicon-trash"></span> Eliminar</a>
									</div>
								</div>
								<?php include('button.php'); ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<div style="height:10px;"></div>
			<form action="../menu.php">
				<button class="button" style="vertical-align:middle;width: 10%;"><span>atras </span></button>
			</form>
		</div>
		<?php include('add_modal.php'); ?>
	</div>
</body>

</html>