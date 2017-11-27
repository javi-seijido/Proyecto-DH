<?php

  include_once("soporte.php");

 if ($auth->estaLogueado()) {
		header('Location: main_menu.php'); exit;
	}

	$var_usr = '';
	$var_pass = '';
  $errores_finales = [];

	if ($_POST) {
		// Validación
		$errores_finales = $validator->validarUsuario($_POST);

    if (empty($errores_finales)){

       $usr_selec = $_POST["usr"];
      //  $todo = $_POST;
       $usr_ok = $db->comprobarUsuario($usr_selec);

       if (!isset($usr_ok)) {
         $errores_finales['er_usr'] =  'Usuario Erroneo';
       } else {
           if (!password_verify($_POST["pass"], $usr_ok["password"])) {
             $errores_finales['er_pass'] =  'Usuario o Password Incorrecta';
           } else {
             // Guardo al ID del usuario en $_SESSION.
             $auth->loguear($usr_ok);

             // Si el boton de recordar pass esta actvado guardo $_COOKIE.

             if (isset($_POST["remember"])) {
                $auth->guardar_cookie($usr_ok);
             }
               header('location: main_menu.php'); exit;
           }
       }
	 }
   // Para la persistencia

     // echo "<pre>";
     // var_dump($_POST);
     // echo "</pre>";
   $var_usr = $_POST['usr'];
 }


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema de Bomberos</title>
		<meta name="viewport" content="width=device-width. initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/styles_log.css">
	</head>
	<body>
   <header>
   	 <img class="logo_bomberos" src="../images/Logo3_Transparente.png" alt="logo_bomberos">
   </header>

	 <form class= "loguin_border" action="" method="post">
  		 <img class="img_usr" src="../images/loguin.png" alt="">
			 <section class="loguin_usr">

					<label class="label_usr" for="user">Usuario: </label>

					<input id="usr" class="us_log" type="text" name="usr" placeholder=" User" value=<?= $var_usr ?>>

					<?php
					if (isset($errores_finales['er_usr'])):
					?>
					 <div class="">
						 <img class="error_usr" src="../images/logo_errores.png" alt="">
					 </div>
					<?php endif; ?> <br><br>

					<div class="pos_ayes">
						<label class="label_usr" for="pass">Password: </label>
						<input class="pa_log" id="myPassword" type="password" name="pass" placeholder=" Password" >

						<?php
						if (isset($errores_finales['er_pass'])):
						?>
						 <div class="div_err_pass">
               <img class="error_pass" src="../images/logo_errores.png" alt="">
      		   </div>
						<?php endif; ?>

						<img class="ayes"src="../images/ayes_pass.svg" alt="ver_pass" onclick="mouseoverPass()" onmouseout="mouseoutPass()">
					</div>
						<!-- <button class="borrar" type="reset">Borrar</button> -->
			 </section>
		 <a class="change_pass" href="#recuperar_pass">¿Olvido su contraceña?</a>

		 <label class="remember"> Remember me.
			 <input  type="checkbox" name="remember" id="remember"> <br><br>
		 </label>

		 <button class="input" type="submit"> Loguin.
		 </button>

		</form>

    <?php
      if (!empty($errores_finales)): ?>
        <div class="err_border">
               <br>
               <?php foreach ($errores_finales as $value) { ?>
                 <img src="../images/logo_errores.png" alt=""><span class="men_er_usr_360" > <?=' - '.$value;?></span><br><br>
               <?php } ?>
        </div>
    <?php endif; ?> <br>


    <div id="recuperar_pass" class="loguin_border">
      <p class="">Ingrese su Correo electronico para restaurar su possword:</p><br>

      <form class="enviar_email" action="" method="get">
        <label  class="" for="email">Email:</label>
        <input  type="email" name="email" value="" placeholder="ejemplo@email.com">
        <button class="enviar" type="submit">Enviar</button>
      </form>

      <span id="cerrar_rec">Cerrar</span>
    </div>

    <div class="reset_pass">
      <form class="" action="" method="post">
            <label  class="label_new_pass" for="new_pass1">Nueva Password:</label>
            <input id="new_pass" class="us_log" type="password" name="" value=""><br><br>

            <label class="label_new_pass" for="new_pass1">Confirmar Password:</label>
            <input id="new_pass" class="us_log" type="password" name="" value=""><br><br>

            <button class="input" type="submit">Guardar</button>
      </form>

    </div>

    <script>
      var boton = document.querySelector(".change_pass");
      var contenedor = document.querySelector("#recuperar_pass");
      var botonCerrar = document.querySelector("#cerrar_rec");

      boton.onclick = function (){
        contenedor.style.display = "block";
      }

      botonCerrar.onclick = function (){
        contenedor.style.display = "none";
      }


      function mouseoverPass(obj) {
        var obj = document.getElementById('myPassword');
        obj.type = "text";
      }
      function mouseoutPass(obj) {
        var obj = document.getElementById('myPassword');
        obj.type = "password";
      }
    </script>
	</body>
</html>
