<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PRODUCTOS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function destruirSesionYRecargar() {
            $.ajax({
                url: 'destroy_session.php',
                type: 'POST',
                success: function(response) {
                    // Recargar la página productos fuera del iframe
                    if (window.top !== window.self) {
                        window.top.location.reload();
                    } else {
                        window.location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
    </script>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid red;
            padding: 8px;
        }

        th {
            background-color: red;
            color: white;
        }

        body {
            text-align: center;
        }

        .navbar {
            background-color: #ff0000;
        }

        .navbar img {
            max-width: 50px;
            height: auto;
        }

        button {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: white;
            color: #000000;
        }

        .btn-success {
            background-color: red;
        }

        .btn-primary {
            background-color: red;
        }

        .btn-warning {
            background-color: red;
        }

        .btn-secondary {
            background-color: red;
        }
    </style>
</head>
<body style="text-align:center;">
<nav class="navbar navbar-expand-lg navbar-dark bg-red">
    <div><img src="./img/toothless.png"/></div>
    <div><a href="Principal.php"><button class="btn">Regresar</button></a></div>
</nav>
</p>
<div>
    <a href="DetalleA.php"><button title="Este boton sirve para dar de alta productos es decir registrarlos por primera vez" class="btn btn-success">Altas</button></a>
</div>

</p>
<div style="display: flex;justify-content: center; align-items: center;">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio de venta</th>
                <th>Stock</th>
                <th>ID Sucursal</th>
                <th>Estatus</th>
                <th>Imagen</th>
                <th>Fecha caducidad</th>
                <th>Tipo</th>
                <th>Peso</th>
                <th>Costo de compra</th>
                <th>Función</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Configuración de la conexión a MySQL
            $servername = "localhost";
            $username = "Maoui";
            $password = "maouicafe";
            $database = "BDMAOUI";

            // Crear una conexión
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Falló la conexión a MySQL: " . $conn->connect_error);
            }

            // Consulta SQL para obtener los datos de la tabla Productos
            $sql = "SELECT * FROM Productos";

            // Ejecutar la consulta y obtener los resultados
            $result = $conn->query($sql);

            // Mostrar los datos en la tabla
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["producto_id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["precio"] . "</td>";
                    echo "<td>" . $row["stock"] . "</td>";
                    echo "<td>" . $row["sucursal_id"] . "</td>";
                    echo "<td>" . $row["estatus"] . "</td>";
                    echo "<td> <img style='width: 80px; height: auto;' src='img/" . $row["img"] . "' ></td>";
                    echo "<td>" . $row["fecha_caducidad"] . "</td>";
                    echo "<td>" . $row["tipo"] . "</td>";
                    echo "<td>" . $row["peso"] . "</td>";
                    echo "<td>" . $row["costo"] . "</td>";
                    echo '<td>
                        <form method="POST" action="c.php">
                            <input type="hidden" name="id" value="' . $row["producto_id"] . '">
                            <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>
                    </td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
            }

            // Cerrar la conexión a MySQL
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
