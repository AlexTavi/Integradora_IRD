<!DOCTYPE html>
<html>
<head>
  <title>Tabla con estilo neon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Estilo neon con colores rojos */
    .table-neon {
      background-color: #fff;
    }
  
    .table-neon th, .table-neon td {
      color: #ff0000;
      text-shadow: 0 0 5px #e6b0aa  , 0 0 10px #e6b0aa  , 0 0 15px #e6b0aa  , 0 0 20px #e6b0aa  , 0 0 25px #e6b0aa  , 0 0 30px #e6b0aa  , 0 0 35px #e6b0aa  ;
    }
  
    /* Estilo para el campo de ID con ID "producto_id" */
    #producto_id {
      font-weight: bold;
      color:  #ff0000 ;
      background-color:  #ec7063 ;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    $servername = "localhost";
    $username = "Maoui";
    $password = "maouicafe";
    $database = "BDMAOUI";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
      die("Error en la conexión: " . $conn->connect_error);
    }

    // Consulta para obtener los productos ordenados por fecha de caducidad
    $sql = "SELECT * FROM Productos ORDER BY fecha_caducidad";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Mostrar los productos en una tabla con estilo Bootstrap
      echo '<table class="table table-neon">';
      echo '<thead>';
      echo '<tr>';
      echo '<th id="producto_id">ID</th>';
      echo '<th>Nombre</th>';
      echo '<th>Fecha de caducidad</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';

      while ($row = $result->fetch_assoc()) {
        $idProducto = $row['producto_id'];
        $nombreProducto = $row['nombre'];
        $fechaCaducidad = $row['fecha_caducidad'];

        echo '<tr>';
        echo '<td id="producto_id">' . $idProducto . '</td>';
        echo '<td>' . $nombreProducto . '</td>';
        echo '<td>' . $fechaCaducidad . '</td>';
        echo '</tr>';
      }

      echo '</tbody>';
      echo '</table>';
    } else {
      echo "No se encontraron productos.";
    }

    // Cerrar conexión
    $conn->close();
    ?>
  </div>
</body>
</html>
