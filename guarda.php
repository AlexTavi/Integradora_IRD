<!DOCTYPE html>
<html>
<head>
  <title>Respaldo de Base de Datos</title>
<style>
    body {
  background-color: #f8f8f8;
  font-family: Arial, sans-serif;
}

h1 {
  color: red;
  text-align: center;
}

form {
  width: 300px;
  margin: 0 auto;
  background-color: white;
  padding: 20px;
  border: 2px solid red;
}

label {
  display: block;
  margin-bottom: 10px;
  color: red;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: red;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: darkred;
}

</style>  
</head>
<body>
  <h1>Respaldo de Base de Datos</h1>
  <form action="backup.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" value="Maoui" readonly>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" value="maouicafe" readonly>

    <input type="submit" value="Realizar Respaldo">
  </form>
</body>
</html>
