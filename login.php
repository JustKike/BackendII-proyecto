<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Inicio de sesion</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

</head>
<Style>
	h1 {color: rgb(253, 155, 8);font-family: Georgia, 'Times New Roman', Times, serif;}
    h1 { text-align: center}

body{
        background: url(assets/img/Calzado8.jpg) no-repeat center center fixed;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
}
.sombra_svg {
	-webkit-filter: drop-shadow(0px 0px 5px #333);
	filter: drop-shadow(0px 0px 5px #333);
}
.modal-backdrop{
 position: relative;
}

.shadow {
    text-shadow: 2px 2px 4px #000000;
    }
</style>

<body >
<div class="login" >
		<div class="login-screen">
			<div class="app-title" >
                 <form action="checklogin.php" method="post" >
				<h1 class="shadow"><strong>Calzado Endromides</strong></h1>
				<img class="rounded mx-auto d-block" src="assets/img/Logo.png" style="width: 165px;height: 150px;margin: 0px;">
			</div>
			<div class="login-form">
				<div class="control-group">
				<input type="text" name="usuario" class="login-field" value="" placeholder="usuario" maxlength="10" id="login-name" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				<div class="control-group">
				<input type="password" name="contra" class="login-field" value="" placeholder="contraseña" maxlength="8" id="login-pass" required>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

					<button type="submit" class="btn btn-success btn-lg">
      				INGRESAR  <span class="glyphicon glyphicon-log-in"></span></button>
					<a class="login-link btn btn-info btn-lg" href="registro.php">Registrarse <span class="glyphicon glyphicon-pencil"></span></a>

			</div>
		</div>
</div>
</body>
</html>
