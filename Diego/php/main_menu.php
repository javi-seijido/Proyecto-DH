<?php
session_start();

require_once('funciones_log.php');

if(!estaLogueado()){
   header('Location: index.php'); exit;
}
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
$usrname = $_SESSION['name'];

$images = glob('../avatares/' . $_SESSION['email'] . '*');

?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Menú Principal GIB</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style_menu.css">
</head>
<body>

      <header>

        <nav id="navigation2" class="menu_logeado">

          <div class="control-menu2">
              <a href="#navigation2" class="open2"><span><?=$usrname?></span> <img class="img_user" src="<?= $images[0] ?>" alt=""></a>
              <a href="#" class="close2"><span><?=$usrname?></span> <img class="img_user" src="<?= $images[0] ?>" alt=""></a>
          </div>

          <ul  class="nav-items2">
            <li><a href="#>">Cambiar Password</a></li>
            <li><a href="logout.php">Cerrar Sesion</a></li>
          </ul>

        </nav>

      	<nav id="navigation" class="menu">

              <div class="control-menu">
                  <a href="#navigation" class="open"><span><img class="img_ctrol" src="../images/home.gif" /></span></a>
                  <a href="#" class="close"><span> </span><img class="img_ctrol" src="../images/home.gif" /></a>
              </div>

          		<ul class="nav-items">

          			<li class="li_flecha" id="Usuarios"><a href="#Usuarios"> <span>ABM Usuarios</span>
                                   <img class="img_consultas" src="../images/select.png" alt=""></a></li></a></li>

                <li class="li_flecha" id="Personal"><a href="registro_personal.php"><span>ABM Personal</span>
                                   <img class="img_consultas" src="../images/select.png" alt=""></a></li>

                <li class="li_flecha" id="Alarmas"><a href="#Alarmas"><span>ABM Alarmas</span>
                                  <img class="img_consultas" src="../images/select.png" alt=""></a></li>

                <li class="li_flecha" id="Suministros"><a href="#Suministros"><span>ABM Suministros</span>
                                  <img class="img_consultas" src="../images/select.png" alt=""></a></li>

                <li class="li_flecha" id="Procedimientos"><a href="faq.php"><span>Procedimientos</span>
                                  <img class="img_consultas" src="../images/select.png" alt=""></a></li>

                <li class="li_flecha" id="Consultas"><a href="#Consultas"><span>Consultas/Informes</span>
                                  <img class="img_consultas" src="../images/select.png" alt=""></a></li>

          		</ul>

      	</nav>
        <div style="clear: both;"></div>
      </header>


      <!-- <script>
        var boton = document.querySelector(".menu_logeado");
        var contenedor = document.querySelector("#menu_usr_open");
        var botonCerrar = document.querySelector("#cerrar_rec");

        boton.onclick = function (){
          contenedor.style.display = "block";
        }

        botonCerrar.onclick = function (){
          contenedor.style.display = "none";
        } -->

      </body>
</html>
