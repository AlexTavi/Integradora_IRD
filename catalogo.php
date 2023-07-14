<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Catálogo de Productos</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #ffffff;
      margin: 0;
      padding: 0;
    }
    .product-card {
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: inline-block;
      margin: 20px;
      padding: 20px;
      float: left; /* Agregamos float para que los productos aparezcan en una cuadrícula */
    }

    .product-card:hover {
      background-color: #f2f2f2;
    }

    .product-card h2 {
      color: #e60000;
      margin: 0;
      font-size: 20px;
    }

    .cart {
      background-color: #f2f2f2;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .cart h2 {
      color: #666666;
      margin: 0;
      font-size: 20px;
    }

    .cart ul {
      padding: 0;
      margin: 0;
      list-style-type: none;
    }

    .cart li {
      color: #666666;
      margin-bottom: 10px;
    }
    .add-to-cart-button {
      background-color: #e60000;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .add-to-cart-button:hover {
      background-color: #ff3333;
    }
    .center-container {
  margin-left: auto;
  margin-right: auto;
  width: 71%; /* Ajusta este valor al ancho deseado */
}
  </style>
</head>
<body>
  <?php
  // Conexión a la base de datos
  $servername = "127.0.0.1";
  $username = "Maoui";
  $password = "maouicafe";
  $dbname = "BDMAOUI";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }

  // Obtener los productos de la base de datos
  $sql = "SELECT * FROM Productos";
  $result = $conn->query($sql);
  ?>

  <div class="container center-container">
    <h1>Nuestros cafés</h1>
    <?php
    // Mostrar los productos del catálogo
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($row['estatus'] != 0) {
          echo '<form method="post" action="carrito.php">';
          echo '<div class="product-card">';
          echo '<h2>' . $row["nombre"] . '</h2>';
          echo '<img style="width: 100px; height: auto;" src="img/' . $row['img'] . '">';
          echo '<p>Precio: $' . $row["precio"] . '</p>';
          echo '<p>Inventario: ' . $row["stock"] . '</p>';
          echo '<input type="hidden" name="producto_id" value="' . $row["producto_id"] . '">';
          echo '<input type="number" name="quantity" min="1" max="' . $row["stock"] . '" value="1" class="form-control">'; // Campo para seleccionar la cantidad
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Usuario general") {
            echo '<input type="submit" value="Agregar al carrito" class="btn btn-primary add-to-cart-button">';
          }
          echo '</div>';
          echo '</form>';
        }
      }
    } else {
      echo "No hay productos disponibles.";
    }
    $conn->close();
    ?>
    <div style="clear:both;"></div> <!-- Limpiamos el float para que el contenido posterior no se solape con los productos -->
  </div>
</body>
</html>
