<?php
session_start();
//si no existe una sesión llamada rol, lo dirige al login
if (!isset($_SESSION['rol'])) {
  header('location: login.php');
} else {
  //si el usuario rol es de cliente lo redirije al index5
  if ($_SESSION['rol'] == 'Cli') {
    header('location: index5.php');
  }
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
  echo "Esta pagina  es solo para usuarios registrados.<br>";
  header('Location: index3.php');
  exit;
}
$now = time();

if ($now > $_SESSION['expire']) {
  session_destroy();
  echo "su sesion a terminado.<br>";
  header('Location: index4.php');
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
  <title>MENU DE OPERACIONES</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="assets/css/Bold-BS4-Text-Shadow-Effects.css">
  <link rel="stylesheet" href="assets/css/style.css">

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
    text-shadow: 1px 2px #000000;
  }

  h2 {
    text-align: center
  }

  h2.fuego {
    text-shadow: 0 0 20px #fefcc9, 2px -2px 3px #feec85, -4px -4px 5px #ffae34, 5px -10px 6px #ec760c, -5px -12px 8px #cd4606,
      0 -15px 20px #973716, 2px -15px 20px #451b0e;
    color: #666;
  }

  h2.neon {
    text-shadow: 0 0 0.2em #000000, 0 0 0.2em #000000,
      0 0 0.2em #000000
  }

  body {
    background-color: #ffdd90;
    background-image: url("assets/img/wall-background-or.jpg");
    margin: 29px;
    margin-top: -10px;
  }

  .shadow {
    color: white;
    text-shadow: 2px 2px 4px #000000;
  }

  .button {
    display: inline-block;
    border-radius: 4px;
    background-color: #f4511e;
    border: #273746;
    color: #FFFFFF;
    text-align: center;
    font-size: 28px;
    padding: 8px;
    width: 50%;
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
    content: url("assets/img/Logo.png");
    position: absolute;
    opacity: 0;
    top: -0.9em;
    right: -100px;
    transition: 0.5s;
    width: 50px;
    height: 50px;
    transform: scale(0.1);
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

  .sombra_svg {
    /*box-shadow:1px 1px 2px #333;*/
    -webkit-filter: drop-shadow(0px 0px 5px #333);
    filter: drop-shadow(0px 0px 5px #333);
  }
</style>

<body>
  <div class="container">
    <div style="height:50px;"></div>
    <div class="well sombra_svg" style="margin:auto; padding:auto; width:60%;">

      <center>
        <div class="alert alert-info" style="margin:auto; padding:0.1%;">
          <h1 class="shadow" style="color: rgb(27, 38, 49);font-size: 40px;">
            Bienvenido <?php echo  $_SESSION['user']; ?></h1>
        </div>

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
      </center>
      <div style="border-top:1px solid gray;"></div>
      <h1 class="shadow" style="color: rgb(253, 155, 8);font-size: 40px;">
        <center><strong>MENU DE OPERACIONES</strong></center>
        </h2>
        <div style="border-top:1px solid gray;"></div>
        <center>
          <div style="height:20px;"></div>
          <form action="crud_user/index.php">
            <button class="button" style="vertical-align:middle"><span>usuarios </span></button>
          </form>
          <div style="height:5px;"></div>
          <form action="crud_product/index.php">
            <button class="button" style="vertical-align:middle"><span>productos </span></button>
          </form>
          <div style="height:5px;"></div>
          <form action="">
            <button class="button" style="vertical-align:middle"><span>ventas </span></button>
          </form>
          <div style="height:5px;"></div>
          <form action="Tienda/MiTienda.php">
            <button class="button" style="vertical-align:middle"><span>MiTienda </span></button>
          </form>
          <div style="height:5px;"></div>
          <form action="crud_provider/index.php">
            <button class="button" style="vertical-align:middle"><span>proveedores </span></button>
          </form>
          <div style="height:5px;"></div>
          <form action="logout.php">
            <button class="button" style="vertical-align:middle"><span>cerrar </span></button>
          </form>
        </center>
        <div style="height:15px;"></div>
    </div>
</body>

</html>