<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();
    ?>

    <?php
    $user = $_POST['usuario'];
    $password = $_POST['contra'];
    $compara = $_POST['usuario'];

    include("conn.php");

    $sql = "SELECT * FROM login WHERE user = '$user'";
    // Consulta de la base de datos

    // Resultado de la BD
    $result = $conexion->query($sql);

    //Traer el renglón encontrado 
    $row = $result->fetch_array(MYSQLI_ASSOC);

    //if (123 == $password && "Melchor" == $username){
    if ($row['password'] == $password && $row['user'] == $user) {

        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60); //(2 * 60)
        echo "Bienvnido! " . $_SESSION['user'];

        if ($row == true) {
            //validar rol
            $_SESSION['rol'] = $row['userrol'];
            //si el user es nivel cliente sera enviado directamente a la tienda
            if ($_SESSION['rol']  == 'Cli') {
                header('Location: Tienda/MiTienda.php');
                mysqli_close($conexion);
            //si es usuario administrador sera enviado al menu de operaciones
            } else {
                header('Location: menu.php');
                mysqli_close($conexion);
            }

        }

        if ($compara == '') {
            unset($_SESSION['user']);
            session_destroy();
            header('location: index.php');
        }
    } else {
        echo "<div>Username o Password son incorrectos</div> ";
        header('Location: index2.php');
        exit;
    }
    ?>
</body>

</html>