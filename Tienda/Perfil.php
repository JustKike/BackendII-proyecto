<?php
session_start();
// verifica si hay inicio de sesion
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    echo "Esta pagina  es solo para usuarios registrados.<br>";
    header('Location: ../index3.php');
    exit;
}
$now = time();
// termina la sesion despues de cierto tiempo
if ($now > $_SESSION['expire']) {
    session_destroy();
    echo "su sesion a terminado.<br>";
    header('Location: ../index4.php');
    exit;
}

//si no existe una sesión llamada rol, lo dirige al login
if (!isset($_SESSION['rol'])) {
    header('location: ../login.php');
} else {
    //si el usuario rol es de cliente cambia el boton a cerrar sesión 
    if ($_SESSION['rol'] == 'Cli') {
        $urlCli = "../logout.php";
        $nomBtn = "Cerrar";
    } else {
        //si el usuario rol no es cliente dirige el boton atras al menu 
        $urlCli = "../menu.php";
        $nomBtn = "Atras";
    }
}
//numero de recargas

if (isset($_SESSION["contar"])) { //Comprueba si el contador existe.
    $_SESSION["contar"]++; //si existe añade una unidad al contador.
} else {
    $_SESSION["contar"] = 1; //si no existe se crea con valor 1 inicial.
}
$contar = $_SESSION["contar"]; //guardar en una variable más manejable.

// guardamos el usuario
$member_id = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta datos de la aplicacion -->
    <title>Calzado Endromides</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/ihover.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ihover.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles2.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/Bold-BS4-Animated-Back-To-Top.css" />
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Estilos para los elementos de la pagina -->
    <style>
        * {
            box-sizing: border-box;
        }

        /* Style the body */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-image: url("assets/img/wall-background-or.jpg");
        }

        h1 {
            color: rgb(253, 155, 8);
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        h3 {
            color: rgb(253, 155, 8);
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        /* Header/logo Title */
        .header {
            padding: 80px;
            text-align: center;
            background: #1abc9c;
            color: white;
        }

        /* Increase the font size of the heading */
        .header h1 {
            font-size: 40px;
        }

        /* Sticky navbar - toggles between relative and fixed, depending on the scroll position. It is positioned relative until a given offset position is met in the viewport - then it "sticks" in place (like position:fixed). The sticky value is not supported in IE or Edge 15 and earlier versions. However, for these versions the navbar will inherit default position */
        .navbar {
            overflow: hidden;
            background-color: #333;
            position: sticky;
            position: -webkit-sticky;
            top: 0;
        }

        /* Style the navigation bar links */
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }


        /* Right-aligned link */
        .navbar a.right {
            float: right;
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Active/current link */
        .navbar a.active {
            background-color: #666;
            color: white;
        }

        /* Column container */
        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
        }

        /* Create two unequal columns that sits next to each other */
        /* Sidebar/left column */
        .side {
            -ms-flex: 30%;
            /* IE10 */
            flex: 30%;
            background-image: url("assets/img/wall-background-or.jpg");
            padding: 20px;
        }

        /* Main column */
        .main {
            background-color: white;
            padding: 15px;
            width: 100%;
        }

        /* Fake image, just for this example */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
        }

        /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 700px) {
            .row {
                flex-direction: column;
            }
        }

        /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
        @media screen and (max-width: 400px) {
            .navbar a {
                float: none;
                width: 100%;
            }
        }

        .shadow {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        .sombra_svg {
            /*box-shadow:1px 1px 2px #333;*/
            -webkit-filter: drop-shadow(0px 0px 5px #333);
            filter: drop-shadow(0px 0px 5px #333);
        }

        .txt-heading {
            margin: 20px 0px;
            text-align: left;
            background: black;

            padding: 5px 10px;
            overflow: auto;
        }

        #shopping-cart .txt-heading {
            border-top: #607d8b 2px solid;
            background: #ffffff;
            border-bottom: #607d8b 2px solid;
        }

        .txt-heading-label {
            display: inline-block;
        }

        #shopping-cart .txt-heading .txt-heading-label {
            margin-top: 5px;
        }

        .btnAddAction {
            padding: 3px 10px;
            height: 30px;
            cursor: pointer;
            border: #CCC 1px solid;
            background: #f3f0f0;
        }

        .cart-item {
            border-bottom: #79b946 1px dotted;
            padding: 10px;
        }

        #product-grid {
            margin-bottom: 30px;
            text-align: center;
            padding-bottom: 20px;
        }

        .product-item {
            display: inline-block;
            margin: 8px;
            border: #CCC 1px solid;
        }

        .product-title {
            position: absolute;
            bottom: 0px;
            background: rgba(0, 0, 0, 0.3);
            width: 100%;
            padding: 5px 0px;
            color: #f1f1f1;
        }

        .product-image {
            height: 300px;
            width: 300px;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 300px;
        }

        .product-footer {
            padding: 20px 10px 10px;
            overflow: auto;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .input-cart-quantity {
            padding: 4px;
            margin: 0;
            vertical-align: top;
            border: #CCC 1px solid;
            border-right: 0px;
        }

        .cart-info {
            text-align: right;
            display: inline-block;
            width: 20%;
        }

        .cart-info.title {
            width: 35%;
            text-align: left;
        }

        .cart-info.quantity {
            width: 100px;
            border: #ccc 1px solid;
        }

        .cart-info.price {
            min-width: 30%;
            position: relative;
        }

        .cart-info.action {
            width: 5%;
            vertical-align: middle;
            float: right;
        }

        .cart-item-container {
            padding: 15px 10px;
            border-bottom: #e2e2e2 1px solid;
            background-color: #FBFCFC;
        }

        .cart-status {
            color: #666;
            float: right;
            font-size: 0.8em;
            padding: 0px 10px;
            line-height: 18px;
        }

        #btnEmpty img {
            margin-top: 6px;
            cursor: pointer;
        }

        .cart-item-container.header {
            background: black;
            color: white;
            text-align: left;
            border-bottom: #b9b8b8 1px solid;
        }

        .btn-increment-decrement {
            display: inline-block;
            padding: 5px 0px;
            background: #e2e2e2;
            width: 30px;
            height: 30px;
            text-align: center;
            cursor: pointer;
        }

        .input-quantity {
            border: 0px;
            height: 30px;
            width: 30px;
            display: inline-block;
            margin: 0;
            box-sizing: border-box;
            text-align: center;
        }


        .jumbotron {
            background-color: #f4511e;
            color: #fff;
            padding: 100px 25px;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .bg-grey {
            background-color: #f6f6f6;
        }

        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }

        .logo {
            color: #f4511e;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .carousel-control.right,
        .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }

        .carousel-indicators li {
            border-color: #f4511e;
        }

        .carousel-indicators li.active {
            background-color: #f4511e;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel {
            border: 1px solid #f4511e;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid #f4511e;
            background-color: #fff !important;
            color: #f4511e;
        }

        .panel-heading {
            color: #fff !important;
            background-color: #f4511e !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel-footer h3 {
            font-size: 32px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #f4511e;
            color: #fff;
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }
        }

        .radio-item {
            display: block;
            position: relative;
            padding: 0 6px;
            margin: 10px 0 0;
            font-weight: normal;
        }

        input[type='radio']:after {

            width: 15px;

            height: 15px;

            border-radius: 15px;

            top: -2px;

            left: -1px;

            position: relative;

            background-color: #d1d3d1;

            content: '';

            display: inline-block;

            visibility: visible;

            border: 2px solid white;

        }

        input[type='radio']:checked:after {

            width: 15px;

            height: 15px;

            border-radius: 15px;

            top: -2px;

            left: -1px;

            position: relative;

            background-color: #ffa500;

            content: '';

            display: inline-block;

            visibility: visible;

            border: 2px solid white;

        }

        .bordes {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            text-align: center;
            vertical-align: middle;
            box-shadow: inset 0 0 15px 0 #1B2631;
            box-shadow: 1px 4px 10px #101010;
        }

        h2 {
            font-family: "lust-display-didone", serif;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            width: 100%;
            letter-spacing: 0.5rem;
            color: rgb(105, 10, 3);
            text-shadow: 2px 5px 8px #030000;
        }

        p {
            font-family: Century Schoolbook, Century Schoolbook L, Georgia, serif;
            font-size: 20px;
            text-align: justify;
            margin: 2rem 3rem 0;
            color: rgb(10, 10, 10);
            font-weight: 100;
            text-shadow: 2px 5px 8px #030000;
        }

        /* imagen en formulario */
        .container {
            position: relative;
            width: 20%;
            border-radius: 50%;
        }

        .image {
            display: block;
            width: 20%;
            height: auto;
            border-radius: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>

<body>
    <!-- contenedor -->
    <div class="header" style="background-image: url('assets/img/fondo26.jpg');width: 100%; height: 100%; background-size: 100%;">
        <center>
            <!-- Top to bottom -->
            <div class="row" style="justify-content: center">
                <div class="col-sm-6">
                    <!-- normal -->
                    <div class="ih-item circle effect18 right_to_left sombra_svg"><a href="#">
                            <div class="img sombra_svg"><img src="assets/img/Logo.png" style="background-color: #ffdd90;" alt="img"></div>
                            <div class="info">
                                <div class="info-back">
                                    <h3 style="color: rgb(253, 155, 8);">Bienvenido <?php echo   $member_id; ?></h3>
                                    <p>Todos Caminan, pero pocos dejan su huella, juntos hacia el futuro</p>
                                </div>
                            </div>
                        </a></div>
                    <!-- end normal -->
                </div>
            </div>
            <!-- end Top to bottom -->
        </center>

        <h1 class="shadow" style="color: rgb(253, 155, 8);">Calzado Endromides</h1>

    </div>
    <!-- barra de navegacion -->
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark" style="float: none;height: 80px;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="MiTienda.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Perfil.php">Mi Pefil</a>
                    </li>
            </div>
        </div>
        <form action="<?php echo   $urlCli; ?>">
            <button class="button me-md-2 p-4" style="vertical-align:middle;width: 100%;float: right;"><span><?php echo   $nomBtn; ?></span></button>
        </form>
    </nav>
    <!-- final de barra de nav -->
    <!-- Creamos un contendor para los datos -->
    <div class="container-fluid" align="center">
        <!-- Creamos una Card -->
        <div class="card text-dark bg-light bordes w-50 m-5">
            <!-- Creamos la cabeza de la card -->
            <div class="card-header text-white bg-dark" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                <!-- titulo del encabezado de la card -->
                <h1 style="color: rgb(253, 155, 8);"><?php echo   $member_id; ?></h1>
            </div>
            <!-- Cuerpo de la card -->
            <div class="card-body">
                <!-- titulo de la tarjeta -->
                <h2 class="card-title">Historial de compras</h2>
                <hr>
                <!-- comentario -->
                <p>Aqui podras encontrar el historial de compras y algunos de tus datos personales, nosotros no compartiremos tus datos personales con nadie.</p>
                <!-- contendor para imagen de usuario -->
                <div class="main" align="center">
                    <img src="assets/img/img_avatar.png" alt="Avatar" class="image">
                </div>
                <!-- Otro contenedor -->
                <div class="container-fluid">
                    <!-- Conexion con la BD -->
                    <?php
                    include('conn.php');
                    $query = mysqli_query($conn, "select * from login where user='" . $member_id . "'");
                    while ($erow = mysqli_fetch_array($query)) {
                    ?>
                        <!-- Etiqueta de Usuario e input -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Usuario:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="user" class="form-control" value="<?php echo $erow['user']; ?>">
                            </div>
                        </div>
                        <!-- Etiqueta de Nombre e input -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Nombre:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="user" class="form-control" value="<?php echo $erow['firstname']; ?>">
                            </div>
                        </div>
                        <!-- Etiqueta de Apellido e input -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Apellido:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="user" class="form-control" value="<?php echo $erow['lastname']; ?>">
                            </div>
                        </div>
                        <!-- Etiqueta de Direccion e input -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Direccion:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="user" class="form-control" value="<?php echo $erow['address']; ?>">
                            </div>
                        </div>
                        <!-- Etiqueta de Rol e input -->
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Rol:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="user" class="form-control" value="<?php echo $erow['userrol']; ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Creamos una tabla -->
                <table class="table table-striped table-bordered table-hover " id="example">
                    <!-- Encabezado de la tabla -->
                    <thead>
                        <th>
                            <center>ID Producto:</center>
                        </th>
                        <th>
                            <center>Nombre Producto:</center>
                        </th>
                        <th>
                            <center>Cantidad:</center>
                        </th>
                        <th>
                            <center>Costo:</center>
                        </th>
                        <th>
                            <center>Fecha:</center>
                        </th>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        <!-- Conexion con la BD -->
                        <?php
                        include('conn.php');
                        $query = mysqli_query($conn, "select * from tbl_sold where member_id='" . $member_id . "'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <!-- elementos del cuerpo de la tabla -->
                            <tr>
                                <td align="center"><?php echo $row['product_id']; ?></td>
                                <td align="center"><?php echo $row['name']; ?></td>
                                <td align="center"><?php echo $row['quantity']; ?></td>
                                <td align="center"><?php echo '$' . $row['costo']; ?></td>
                                <td align="center"><?php echo $row['date']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Termina el contendor para los datos -->

    <!-- Container (Seccion de comentarios) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <div class="footer">
        <div class="container-fluid bg-grey">
            <h2 class="text-center">CONTACT</h2>
            <!-- Agregamos informacion de la tienda y un mensaje -->
            <div class="row">
                <div class="col-sm-5">
                    <p>Contáctenos y le responderemos dentro de las 24 horas.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> Tijuana, Mexico</p>
                    <p><span class="glyphicon glyphicon-phone"></span> +00 664 01800911</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> Calzado_Endromides@mail.com</p>
                </div>
                <!-- Formulario para comentarios -->
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <!-- El form llamara nuestro codigo php -->
                            <form method="POST" action="enviar.php">
                                <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <!-- Boton para enviar los datos -->
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>