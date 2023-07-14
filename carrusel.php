<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {
    vertical-align: middle;
    height: 450px;
    border-radius: 5px;
}
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@media screen and (min-width:300px) and (max-width:800px) {
    body{
  .text {font-size: 11px}
}
}
</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 6</div>
  <img src="./img/siembra-de-plantones.jpg" style="width:100%">
  <div class="text">Sembrado</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 6</div>
  <img src="./img/flor-del-cafe.png" style="width:100%">
  <div class="text">Planta</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 6</div>
  <img src="./img/recolectora-de-cafe.jpg" style="width:100%">
  <div class="text">Cosechado</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 6</div>
  <img src="./img/secado-del-cafe.jpg" style="width:100%">
  <div class="text">Secado</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 6</div>
  <img src="./img/Cafe_Ge_-_Cafe_tostado_940x.webp" style="width:100%">
  <div class="text">Tostado</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 6</div>
  <img src="./img/cafe-molido-1.jpg" style="width:100%">
  <div class="text">Molido</div>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html> 
