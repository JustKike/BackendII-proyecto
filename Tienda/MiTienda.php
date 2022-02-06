<?php
session_start();

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

//si no existe una sesión llamada rol, lo dirige al login
if (!isset($_SESSION['rol'])) {
  header('location: ../login.php');
} else {
  //si el usuario rol es de cliente cambia el boton a cerrar sesión 
  if ($_SESSION['rol'] == 'Cli') {
    $urlCli = "../logout.php";
    $nomBtn = "Cerrar";
  }else{
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
?>
<?php
//ShoppingCart

require_once "ShoppingCart.php";

$member_id = $_SESSION['user']; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST["quantity"])) {

        $productResult = $shoppingCart->getProductByCode($_GET["code"]);

        $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);

        if (!empty($cartResult)) {
          // Update cart item quantity in database
          $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
          $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
        } else {
          // Add to cart table
          $shoppingCart->addToCart($productResult[0]["id"], $_POST["quantity"], $member_id);
        }
      }
      break;
    case "remove":
      // Delete single entry from the cart
      $shoppingCart->deleteCartItem($_GET["id"]);
      break;
    case "empty":
      // Empty cart
      $shoppingCart->emptyCart($member_id);
      break;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Calzado Endromides</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="styles/ihover.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/ihover.css">
  <link rel="stylesheet" type="text/css" href="assets/css/styles2.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/Bold-BS4-Animated-Back-To-Top.css" />
  <script src="assets/js/jquery-3.2.1.min.js"></script>
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
      -ms-flex: 70%;
      /* IE10 */
      flex: 70%;
      background-color: white;
      padding: 20px;
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
      width: 96px;
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
      padding: 5px 10px;
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
  </style>
  <script>
    function increment_quantity(cart_id, price) {
      var inputQuantityElement = $("#input-quantity-" + cart_id);
      var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
      var newPrice = newQuantity * price;
      save_to_db(cart_id, newQuantity, newPrice);
    }

    function decrement_quantity(cart_id, price) {
      var inputQuantityElement = $("#input-quantity-" + cart_id);
      if ($(inputQuantityElement).val() > 1) {
        var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
        var newPrice = newQuantity * price;
        save_to_db(cart_id, newQuantity, newPrice);
      }
    }

    function save_to_db(cart_id, new_quantity, newPrice) {
      var inputQuantityElement = $("#input-quantity-" + cart_id);
      var priceElement = $("#cart-price-" + cart_id);
      $.ajax({
        url: "update_cart_quantity.php",
        data: "cart_id=" + cart_id + "&new_quantity=" + new_quantity,
        type: 'post',
        success: function(response) {
          $(inputQuantityElement).val(new_quantity);
          $(priceElement).text("$" + newPrice);
          var totalQuantity = 0;
          $("input[id*='input-quantity-']").each(function() {
            var cart_quantity = $(this).val();
            totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
          });
          $("#total-quantity").text(totalQuantity);
          var totalItemPrice = 0;
          $("div[id*='cart-price-']").each(function() {
            var cart_price = $(this).text().replace("$", "");
            totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
          });
          $("#total-price").text(totalItemPrice);
        }
      });
    }
  </script>
</head>

<body>

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

  <div class="navbar">
    <a href="#" class="active">Home</a>
    <a href="#">Link</a>
    <a href="#">Link</a>
    <form action="<?php echo   $urlCli; ?>">
      <button class="button" style="vertical-align:middle;width: 10%;float: right;"><span><?php echo   $nomBtn; ?> </span></button>
    </form>
  </div>

  <div class="row">

    <div class="side">

      <?php
      $cartItem = $shoppingCart->getMemberCartItem($member_id);
      $item_quantity = 0;
      $item_price = 0;
      if (!empty($cartItem)) {
        foreach ($cartItem as $item) {
          $item_quantity = $item_quantity + $item["quantity"];
          $item_price = $item_price + ($item["precio"] * $item["quantity"]);
        }
      }
      ?>

      <div id="shopping-cart-table ">
        <div class="txt-heading sombra_svg">
          <div class="txt-heading-label">
            <h1 class="shadow" style="color: rgb(253, 155, 8);">Carrito de Compras</h1>
          </div>

          <a id="btnEmpty" href="MiTienda.php?action=empty"><img src="assets/img/empty-cart.png" alt="empty-cart" title="Empty Cart" class="float-right" /></a>
          <div class="cart-status">
            <div style="color: rgb(253, 254, 254);">Cantidad Total: <span id="total-quantity"><?php echo $item_quantity; ?></span></div>
            <div style="color: rgb(253, 254, 254);">Precio Total: <span id="total-price"><?php echo $item_price; ?></span></div>
          </div>
        </div>

        <?php
        if (!empty($cartItem)) {
        ?>
          <div class="shopping-cart-table">
            <div class="cart-item-container header">
              <div class="cart-info title">Nombre</div>
              <div class="cart-info">Cantidad</div>
              <div class="cart-info price">Precio</div>
            </div>

            <?php
            foreach ($cartItem as $item) {
            ?>
              <div class="cart-item-container">
                <div class="cart-info title">
                  <?php echo $item["name"]; ?>
                </div>

                <div class="cart-info quantity">
                  <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["precio"]; ?>')">-</div><input class="input-quantity" id="input-quantity-<?php echo $item["cart_id"]; ?>" value="<?php echo $item["quantity"]; ?>">
                  <div class="btn-increment-decrement" onClick="increment_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["precio"]; ?>')">+</div>
                </div>

                <div class="cart-info price" id="cart-price-<?php echo $item["cart_id"]; ?>">
                  <?php echo "$" . ($item["precio"] * $item["quantity"]); ?>
                </div>


                <div class="cart-info action">
                  <a href="MiTienda.php?action=remove&id=<?php echo $item["cart_id"]; ?>" class="btnRemoveAction"><img src="assets/img/icon-delete.png" alt="icon-delete" title="Remove Item" /></a>
                </div>
              </div>
            <?php
            }
            ?>
          </div>

        <?php
        }
        ?>
      </div>
      <div style="height:20px;"></div>
      <!-- Comienza contenido oculto, contendor de filtros no 
                    <div class="shopping-cart sombra_svg checkbox" style="background-color: #FDFEFE;border: 15px solid #FDFEFE;">
                    
                    <h2>Tallas</h2>
                    <p>Selecciona productos por talla:</p>
                    <div style="border-top:1px solid gray;"></div>
                    <form>
                      <center>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">12 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">22 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">22.5 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">23 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">23.5 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">24 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">24.5 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">25 cm
                      </label>
                      <div style="height:1px;"></div>
                      <label class="radio" style="text-align:left;">
                        <input type="radio" name="talla" value="">25.5 cm
                      </label>
                            </center>
                    </form>
                    <div style="height:20px;"></div>
                    <h2>Marcas</h2>
                    <p>Selecciona productos por marca:</p>
                    <div style="border-top:1px solid gray;"></div>
                    <form>
                      <center>
                      <?php
                      include('conn.php');

                      $query = mysqli_query($conn, "SELECT  * FROM `product` GROUP BY brand  ORDER BY brand");
                      while ($row = mysqli_fetch_array($query)) {
                        $codigo = $row['id'];
                      ?>
                            <div style="height:1px;"></div>
                            <label class="radio" style="text-align:left;">
                                    <input type="radio" name="talla" value="">
                                    <?php echo ucwords($row['brand']); ?>
                                  </label>
                                  <?php } ?>
                            </center>
                    </form>
                    <div style="height:20px;"></div>
                    <h2>Precios</h2>
                    <p>Selecciona productos por precio:</p>
                    <div style="border-top:1px solid gray;"></div>
                    <form>
                      <center>
                      <?php
                      include('conn.php');

                      $query = mysqli_query($conn, "SELECT  * FROM `product` GROUP BY precio ORDER BY precio");
                      while ($row = mysqli_fetch_array($query)) {
                        $codigo = $row['id'];
                      ?>
                            <div style="height:1px;"></div>
                            <label class="radio" style="text-align:left;">
                                    <input type="radio" name="talla" value="">
                                    <?php echo ucwords($row['precio']); ?>
                                  </label>
                                  <?php } ?>
                            </center>
                    </form>
                    <div style="height:20px;"></div>
                    <h2>Nombre Zapatos</h2>
                    <p>Selecciona productos por Nombre:</p>
                    
                    <div style="border-top:1px solid gray;"></div>
                    <form>
                      <center>
                      <?php
                      include('conn.php');

                      $query = mysqli_query($conn, "SELECT  * FROM `product` GROUP BY name ORDER BY name");
                      while ($row = mysqli_fetch_array($query)) {
                        $codigo = $row['id'];
                      ?>
                            <div style="height:1px;"></div>
                            <label class="radio" style="text-align:left;">
                                    <input type="radio" name="talla" value="" >
                                    <?php echo ucwords($row['name']); ?>
                                  </label>
                                  <?php } ?>
                            </center>
                    </form>
                  </div>
                  Termina contenido oculto-->
    </div>

    <div class="main">
      <h2>Catalogo de Zapatos</h2>
      <h5><?php
          date_default_timezone_set("America/Tijuana");
          $color = "#58D68D";
          $color2 = "#5D6D7E";
          $color3 = "#FF9403";
          $color4 = "#FD6563";
          $date1 = date('Y-m-d H:i:s', $_SESSION['start']);
          $date2 = date('Y-m-d H:i:s', $_SESSION['expire']);

          echo "<p><font color='" . $color . "'>" . $date1 . "</font></p>";
          ?></h5>
      <?php require_once "product-list.php"; ?>

      <a class="cd-top js-cd-top cd-top--fade-out cd-top--show" style="background-image: url('assets/img/cd-top-arrow.svg';);background-color: #f3ab3f;color: rgb(20,84,153);opacity: 0.67;width: 44px;height: 39px;" href="#0">Top</a>
      <script src="assets/js/Bold-BS4-Animated-Back-To-Top.js"></script>
    </div>

  </div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- Container (Seccion de comentarios) -->
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
          <!-- Boton para envair los datos -->
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