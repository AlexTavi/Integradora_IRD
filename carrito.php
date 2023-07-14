<?php
session_start();

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

// Agregar producto al carrito
if ($_POST) {
    $selected_product = $_POST['producto_id'];
    $quantity = $_POST['quantity']; // Cantidad seleccionada

    // Obtener la información del producto seleccionado
    $sql_product = "SELECT * FROM Productos WHERE producto_id = '$selected_product'";
    $result_product = $conn->query($sql_product);
    $row_product = $result_product->fetch_assoc();

    // Verificar si la cantidad seleccionada es válida
    if ($quantity > 0 && $quantity <= $row_product['stock']) {
        // Agregar el producto al arreglo de carrito en la sesión con la cantidad seleccionada
        $row_product['stock'] = $quantity;
        $_SESSION['cart'][] = $row_product;
        header("Location: catalogo.php");
        die();
    } else {
        echo "<a href='catalogo.php'><button class='button buttonr'>Volver al catálogo</button></a>";
        echo "La cantidad seleccionada no es válida.";
    }
}

// Eliminar producto del carrito
if ($_POST && isset($_POST['remove_product'])) {
    $product_id = $_POST['remove_product'];

    // Recorrer el arreglo de carrito en la sesión y eliminar el producto con el ID correspondiente
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['producto_id'] === $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Redireccionar al carrito después de eliminar el producto
    header("Location: carrito.php");
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Carrito de Compras</title>
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
            margin-bottom: 20px;
            padding: 20px;
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

        .cart .row {
            margin-bottom: 20px;
        }

        .cart .product-card {
            flex-direction: column;
        }

        .cart img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .cart p {
            margin: 0;
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

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5px;
        }

        .buttonr {
            background-color: #ff0000;
            color: white;
            border: 2px solid #ff0000;
        }

        .buttonr:hover {
            background-color: white;
            color: black;
        }
    </style>
    <script>
        function reloadParentPage() {
            if (window.top !== window.self) {
                window.top.location.reload();
            } else {
                window.location.reload();
            }
        }
    </script>
</head>
<body>
<div class="cart container">
    <h2>Carrito</h2>
    <div class="row">
        <?php
        // Mostrar los productos seleccionados en el carrito
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $product) {
                echo '<div class="product-card col-md-4">';
                echo '<h2>' . $product["nombre"] . '</h2>';
                echo '<img src="img/' . $product['img'] . '">';
                echo '<p>Precio: ' . $product["precio"] . '</p>';
                echo '<p>Stock: ' . $product["stock"] . '</p>';

                // Formulario para eliminar el producto del carrito
                echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
                echo '<input type="hidden" name="remove_product" value="' . $product['producto_id'] . '">';
                echo '<button type="submit" class="button buttonr">Eliminar del carrito</button>';
                echo '</form>';

                echo '</div>';
            }
        } else {
            echo "El carrito está vacío.";
        }
        ?>
    </div>
</div>
<button onclick="reloadParentPage()" class="button buttonr">Actualizar carrito</button>
<small>Presionar en caso de que su producto no se vea.</small>
</body>
</html>
