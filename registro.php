<script>
  .disabled {
    pointer - events: none; //This makes it not clickable
    opacity: 0.6; //This grays it out to look disabled
  }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>REGISTRO DE USUARIOS</title>
</head>
<style>
  h1 {
    color: rgb(253, 155, 8);
    font-family: Georgia, 'Times New Roman', Times, serif;
  }

  h1 {
    text-align: center
  }

  body {
    background: url(assets/img/Calzado1.jpg) no-repeat center center fixed;
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
  }

  /* para la imagen  */
  .container {
    position: relative;
    width: 50%;
    border-radius: 50%;
  }

  .image {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 50%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: #008CBA;
    border-radius: 50%;
  }

  .container:hover .overlay {
    opacity: 1;
  }

  .text {
    color: white;
    font-size: 20px;
    text-shadow: 2px 2px 4px #000000;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
  }

  /* efecto para la imagen  */
  /* sombra texto  */
  .shadow {
    text-shadow: 2px 2px 4px #000000;
  }

  /* sombra ventana  */
  .sombra_svg {
    /*box-shadow:1px 1px 2px #333;*/
    -webkit-filter: drop-shadow(0px 0px 5px #333);
    filter: drop-shadow(0px 0px 5px #333);
  }

  /* animacion de boton*/
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
</style>

<body>
  <h1 class="shadow">REGISTRO DE USUARIOS</h1>
  <table border="" class="sombra_svg" width="400" cellspacing="2" cellpadding="15" align="center" bgcolor="#F4D03F">
    <tbody>
      <tr>
        <td align="center">
          <form action="registrar.php" method="post">

            <div class="container">
              <img src="assets/img/img_avatar.png" alt="Avatar" class="image">
              <div class="overlay">
                <div class="text">Select Image</div>
              </div>
            </div>

            <p class="shadow"><strong>USUARIO: <input maxlength="10" class="form-control" name="user" type="text" value="" placeholder="usuario" style="float: right;width: 60%;" /></strong></p>
            <p class="shadow"><strong>CLAVE: <input maxlength="8" name="password" type="password" value="" placeholder="contraseña" style="float: right;width: 60%;" /></strong></p>
            <p class="shadow"><strong>NOMBRE: <input name="firstname" type="text" value="" placeholder="nombre" style="float: right;width: 60%;" /></strong></p>
            <p class="shadow"><strong>APELLIDO: <input name="lastname" type="text" value="" placeholder="Apellido" style="float: right;width: 60%;" /></strong></p>
            <p class="shadow"><strong>DIRECCION: <input name="address" type="text" value="" placeholder="direccion" style="float: right;width: 60%;" /></strong></p>

            <p class="shadow"><strong>ROL DE USUARIO: <input list="Roles" name="userrol" class="form-control" placeholder="rol de usuario" style="float: right;width: 60%;" required pattern="Cli" autocomplete="off" />
                <datalist id="Roles">
                  <option value="Cli">Cliente</option>
                </datalist></strong></p>
            <p class="shadow"><strong>FECHA: <input type="datetime-local" class="form-control" name="date" style="float: right;width: 60%;"></strong></p>
            <div style="height:1px;"></div>
            <p><button class="button" name="submit" type="submit" style="vertical-align:middle;width: 100%;"><strong>REGISTRAR <span class="glyphicon glyphicon-pencil"></strong> </button></p>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
  <table border="" class="sombra_svg" width="400" cellspacing="2" cellpadding="2" align="center" bgcolor="#F4D03F">
    <tbody>
      <tr bgcolor="#F4D03F">
        <td align="center">
          <br>
          <form action="exit.php">
            <button class="btn btn-danger button" style="vertical-align:middle;width: 95%;background-color: #283747 "><span>atras </span></button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>