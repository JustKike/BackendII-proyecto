<!DOCTYPE html>
<html lang="en">
    <style>
a{
  border-radius: 5px;
  padding: 10px 7px;
  text-decoration: none;
  color: #fff;
  background-color: #333;
  margin: center;
  justify-content: center;
}
div.contenedor {
    width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Inicio de sesion</title>
</head>
<body>
<div class="login">
		<div class="login-screen">
			<div class="app-title">              
                 <form action="checklogin.php" method="post">
				<h1>Username o Password son incorrectos</h1>
			</div>
                <div class="contenedor">
                    <p class="center">
                    <a href="login.php">LOGIN</a>
                    </p>
                </div>
			</div>
		</div>
	</div>

    
</body>
</html>