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

    $usuario = $_POST['user'];
    $contra = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $rol = $_POST['userrol'];
    $fecha = $_POST['date'];

    include("conn.php");
    $sql = "INSERT INTO login (user,password,firstname,lastname,address,userrol,date) VALUES ('$usuario','$contra','$firstname','$lastname','$address','$rol','$fecha')";
    if (mysqli_query($conexion, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    //Cerrar Base de Datos
    mysqli_close($conexion);
    header('location:index.php');
    ?>
</body>

</html>