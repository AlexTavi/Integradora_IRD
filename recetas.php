<!DOCTYPE html>
<html>
<head>
  <title>Recetas de Café</title>
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
  <style>
    body {
      font-family: Helvetica, century;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h1 {
      color: #e60000;
      text-align: center;
      padding: 20px;
    }

    .recipe-card {
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      margin: 20px;
      padding: 20px;
    }

    .recipe-card:hover {
      transform: scale(1.05);
    }

    .recipe-card img {
      width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .recipe-card h2 {
      color: #e60000;
      margin: 0;
      font-size: 20px;
    }

    .recipe-content {
      display: none;
    }

    .recipe-content img {
      width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <h1>Recetas de Café</h1>

  <div class="recipe-card" onclick="toggleRecipe(this)">
    <img src="./img/cafe-con-leche.webp" style="width: 50px; height:auto;" alt="Café con leche">
    <h2>Café con Leche</h2>
    <div class="recipe-content">
    <h3>Paso 1: Preparar el café</h3>
    <p>Prepara una taza de café filtrado o utiliza una cafetera para hacer café.</p>
    <p>Utiliza la cantidad de café y agua que prefieras según tu gusto personal.</p>
    <p>Asegúrate de que el café esté bien preparado y tenga el sabor que deseas.</p>

<img src="./img/cafetera.jpg" style="width: 250px; height:auto;" alt="Café con leche - Paso 1">
<h3>Paso 2: Calentar la leche</h3>
<p>Vierte la cantidad deseada de leche en una cacerola pequeña.</p>
<p>Calienta la leche a fuego medio, revolviendo ocasionalmente para evitar que se queme o se forme una capa en la superficie.</p>
<p>Si lo deseas, puedes agregar un poco de azúcar o endulzante a la leche mientras se calienta para darle un toque dulce.</p>
<img src="./img/leche.webp" style="width: 250px; height:auto;" alt="Café con leche - Paso 2">
<h3>Paso 3: Mezclar y servir</h3>

<p>Una vez que el café esté listo y la leche esté caliente, vierte la leche caliente en la taza de café.</p>
<p>Mezcla bien la leche y el café para combinar los sabores.</p>
<p>Si deseas, puedes espolvorear un poco de canela o cacao en polvo en la parte superior para darle un toque decorativo y aromático.</p>
<p>Sirve el café con leche caliente y disfruta de esta deliciosa bebida.</p>
<img src="./img/cl.jpg" style="width: 250px; height:auto;" alt="Café con leche - Paso 3">
<br>
<br>
<small>Recuerda que estos pasos son solo una guía básica y puedes ajustar las cantidades de café y leche según tus preferencias personales.</small>
    </div>
  </div>

  <div class="recipe-card" onclick="toggleRecipe(this)">
    <img src="./img/ex.jpg" style="width: 50px; height:auto;" alt="Café expreso">
    <h2>Café Expreso</h2>
    <div class="recipe-content">
<h3>Paso 1: Prepara tu máquina de café expreso</h3>
<p>Asegúrate de que tu máquina de café expreso esté limpia y en buen estado.</p>
<p>Llena el depósito de agua con agua fresca y purificada.</p>
<p>Enciende la máquina y deja que se caliente durante unos minutos.</p>
<img src="./img/m.jpg" style="width: 250px; height:auto;" alt="Café expreso - Paso 1">

<h3>Paso 2: Muele los granos de café y prepáralos</h3>
<p>Toma granos de café frescos y de alta calidad.</p>
<p>Toma granos de café frescos y de alta calidad.</p>
<p>Muele los granos de café en un molinillo fino para obtener un polvo fino y uniforme.</p>
<p>Coloca el café molido en el portafiltros de la máquina de café y presiónalo ligeramente con un tamper.</p>
<img src="./img/p.webp" style="width: 250px; height:auto;" alt="Café expreso - Paso 2">

<h3>Paso 3: Extrae el café expreso</h3>
<p>Asegúrate de que el portafiltros esté colocado de manera segura en la máquina.</p>
<p>Coloca una taza debajo del portafiltros para recoger el café.</p>
<p>Activa la máquina de café para que extraiga el agua caliente a través del café molido. El proceso debe durar aproximadamente 25-30 segundos.</p>
<p>Una vez que la extracción esté completa, detén la máquina y disfruta de tu café expreso recién hecho.</p>
<img src="./img/f.webp" style="width: 250px; height:auto;" alt="Café expreso - Paso 3">
<br>
<small>Recuerda que la receta del café expreso puede variar según tus preferencias personales y el tipo de máquina que estés utilizando. Es posible ajustar la cantidad de café, la finura de la molienda y el tiempo de extracción para obtener el sabor y la intensidad deseados.</small>
    </div>
  </div>

  <script>
    function toggleRecipe(card) {
      var content = card.getElementsByClassName("recipe-content")[0];
      content.style.display = content.style.display === "none" ? "block" : "none";
    }
  </script>
</body>
</html>
