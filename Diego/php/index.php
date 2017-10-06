<?php
  require_once('funciones_log.php');

	$var_usr = '';
	$var_pass = '';
  $errores_finales = [];

	if ($_POST) {
		// Validación
		$errores_finales = validarUsuario($_POST);

    if (empty($errores_finales)){
       //$usuarios = traerTodos($_POST);

       $usr_selec = $_POST["usr"];
       $todo = $_POST;

       $usr_ok = comprobarUsuario($usr_selec,$todo);


       if (empty($usr_ok)) {
         $errores_finales['er_usr'] =  'Usuario Erroneo';
       } else {
           if (!password_verify($_POST["pass"], $usr_ok["password"])) {
             $errores_finales['er_pass'] =  'Password Erronea';
           } else {
             ingresar_al_menu();
           }
       }
    // Para la persistencia
      $var_usr = $_POST['usr'];
	 }
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
						 <span class="error_usr_360" >.</span>
						 <span class="men_er_usr_360" ><?=$errores_finales['er_usr'];?></span>
						 <span class="class_err" ><?=$errores_finales['er_usr'];?></span>
						 <img class="class_men_err" src="../images/menssage_err.png" alt="">
					 </div>
					<?php endif; ?> <br><br>

					<div class="pos_ayes">
						<label class="label_usr" for="pass">Password: </label>
						<input id="pass" class="pa_log" type="password" name="pass" placeholder=" Password" >

						<?php

						if (isset($errores_finales['er_pass'])):
						?>
						 <div class="div_err_pass">
							 <span class="class_err_pass" ><?=$errores_finales['er_pass'];?></span>
							 <img class="class_men_err_pass" src="../images/menssage_err.png" alt="">
			 		  </div>
						<?php endif; ?>

						<img class="ayes"src="../images/ayes_pass.svg" alt="ver_pass" >
					</div>
						<!-- <button class="borrar" type="reset">Borrar</button> -->
			 </section>
		 <a class="change_pass" href="reset_pass.html">¿Olvido su contraceña?</a>

		 <label class="remember"> Remember me.
			 <input  type="checkbox" name="remember" id="remember"> <br><br>
		 </label>

		 <button class="input" type="submit"> Loguin.
		 </button>

		</form>
	</body>
</html>
