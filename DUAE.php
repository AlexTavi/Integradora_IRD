<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador") {
    header("Location:DUA.php");
}else{
}

// Dirección o IP del servidor MySQL
$host = "127.0.0.1";

// Nombre de usuario del servidor MySQL
$username = "Maoui";

// Contraseña del usuario
$password = "maouicafe";

// Nombre de la base de datos
$baseDeDatos ="BDMAOUI";

// Nombre de la tabla a trabajar
$tabla = "Usuarios";

function Conectarse()
{
   global $host, $username, $password, $baseDeDatos, $tabla;

   if (!($link = mysqli_connect($host, $username, $password))) 
   { 
      exit(); 
   }
   else
   {
   }
   if (!mysqli_select_db($link, $baseDeDatos)) 
   { 
      exit(); 
   }
   else
   {
   }
return $link; 
} 

$link = Conectarse();

if ($_POST) {
    $num=rand(1000,9999);
    $ID_Usuario=$_POST['ID_Usuario'];
    $Nom_Usuario=$_POST['Nombre'];
    $apellido=$_POST['Apellido'];
    $Pass=$_POST['Password'];
    $Email=$_POST['Email'];
    $Telefono=$_POST['Telefono'];
    $Tipo=$_POST['Tipo'];
    $Domicilio=$_POST['Domicilio'];
    $Estatus=0;
    $querySelect="SELECT correo FROM $tabla WHERE correo='$Email'";
    $selectResult= mysqli_query($link,$querySelect);
    if ($row= $selectResult->fetch_assoc()){
      echo "Correo previamente registrado";
    }
    else{
      // Construct the Python script
      $pythonScript = <<<SCRIPT
import smtplib 
from email.message import EmailMessage
#Email
asunto = "Codigo de validación" 
yo = "tavizone1885@outlook.com"
num="$num"
id="$ID_Usuario"
contra="$Pass"  
tu = "$Email"
nom="$Nom_Usuario"
ape="$apellido"
smtp = "smtp-mail.outlook.com"
contraseña = "drpepper85@"
#Mensaje
mensaje = EmailMessage()  
mensaje['Subject'] = asunto 
mensaje['From'] = yo 
mensaje['To'] = tu 
mensaje.set_content("Hola usuario:"+ nom+" "+ape+" Tus datos fueron -- Email: "+tu+" -- ID: "+str(id)+" -- Contraseña: "+contra+" -- Numero de seguridad: "+str(num))
#Servidor
servidor = smtplib.SMTP(smtp, 587) 
servidor.ehlo() 
servidor.starttls() 
servidor.login(yo, contraseña) 
servidor.send_message(mensaje) 
servidor.quit()
SCRIPT;

      // Save the Python script to a file
      $pythonScriptFile = "send_email.py";
      file_put_contents($pythonScriptFile, $pythonScript);

      // Execute the Python script
      $output = shell_exec("python $pythonScriptFile 2>&1");

      // Display the output
      echo "<pre>$output</pre>";
      $queryInsert="INSERT INTO $tabla (usuario_id, nombre, apellido, correo, telefono, tipo_usuario, estatus,codigo, Password, domicilio) VALUES ('$ID_Usuario','$Nom_Usuario','$apellido','$Email','$Telefono','$Tipo','$Estatus','$num','$Pass','$Domicilio');";
      $resultInsert = mysqli_query($link, $queryInsert);
      if($resultInsert){
        
      }
      $nuevaURL="Verificar";
      header("Location: $nuevaURL.php");
      die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0
.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min
.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/p
opper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.
min.js"></script>
    <title>Registro</title>
    <style>
        body {
            text-align: center;
            background-color: #F2F2F2;
        }
        
        .navbar {
            background-color: red;
        }
        
        .form-group label {
            color: #FF5050;
            font-weight: bold;
        }
        
        .form-control {
            border: 1px solid #FF5050;
            border-radius: 5px;
        }
        
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 5px #FF5050;
        }
        
        .btn {
            background-color: red;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            padding: 20px 20px;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: #FFFFFF;
            color: #FF5050;
        }
    </style>
    <script>
    function reloadParentPage() {
      window.top.location.href = "index.php";
    }
  </script>
</head>
<body>
<nav class="navbar">
<button onclick="reloadParentPage()" class="btn">Regresar</button>
</nav>
<form action="" method="POST">
  <fieldset>
    <center>
        <br>
    <div style="width: 150px">
    <div class="form-group">
      <label for="ID_Usuario">ID del Usuario</label>
      <input type="text" name="ID_Usuario" class="form-control" placeholder="U00XX" required>
      <small class="form-text text-muted">Ingresa un ID.</small>
    </div>
    </div>
    <div style="width: 150px">
    <div class="form-group">
      <label for="Nombre">Nombre del Usuario</label>
      <input type="text" name="Nombre" class="form-control" placeholder="Miau" required>
    </div>
    </div>
    <div style="width: 150px">
    <div class="form-group">
      <label for="Apellido">Apellido del Usuario</label>
      <input type="text" name="Apellido" class="form-control" placeholder="Miau" required>
    </div>
    </div>
    <div style="width: 150px">
    <div class="form-group">
      <label for="Password">Contraseña</label>
      <input type="password" name="Password" class="form-control" minlength="8" placeholder="********" required>
    </div>
</div>
<div style="width: 150px">
<div class="form-group">
      <label for="Email">Correo</label>
      <input type="email" name="Email" class="form-control" aria-describedby="emailHelp" placeholder="@miau.com" required>
      <small id="emailHelp" class="form-text text-muted">Este dato es importante para validar la cuenta.</small>
    </div>
</div>
<div style="width: 150px">
    <div class="form-group">
      <label for="Telefono">Telefono del Usuario</label>
      <input type="text" name="Telefono" class="form-control" placeholder="xxx-xxx-xxxx" required>
    </div>
    </div>

<div style="width: 150px">
    <div class="form-group">
      <label for="Domicilio">Domicilio del Usuario</label>
      <input type="text" name="Domicilio" class="form-control" placeholder="Av. Gatolandia 2023" required>
    </div>
    </div>
    <div style="width: 150px">
    <div class="form-group">
      <label for="Tipo">Tipo de cuenta</label>
      <select class="form-select" name="Tipo">
        <option>Usuario general</option>  
        <option>Empleado</option>
      </select>
    </div>
    </div>
    <br>
    <button type="submit" class="btn">Guardar</button>
</center>  
</fieldset>
</form>
</body>
</html>
