<?php
	session_start();
	require_once('func.php');

	$nivel = [
		'A'=> 'Administrador',
		'B'=> 'Perfil 1',
		'C'=> 'Perfil 2'
	];

	$codigo = '';
	// $pass = '';
	// $verpass = '';
	$email = '';

	if ($_POST) {

		// Validación
		$erroresFinales = validarUsuario($_POST);

		$codigo = $_POST['codigo'];
		// $pass = $_POST['pass'];
		// $verpass = $_POST['pass'];
		$email = $_POST['email'];


		if (empty($erroresFinales)) {
			// Creo Usuario en ARRAY, $usuarioAGuardar recibe el return de la función crear usuario, que es un array asociativo que armé como yo quería.
			$usuarioAGuardar = crearUsuario($_POST);

			// Guardo Usuario en JSON, recibe el array guardado en la variable de arriba
			guardarUsuario($usuarioAGuardar);




		}

	}

?>

﻿<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alta de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../css/normalize.css">
    <link href="../css/styles_user.css" rel="stylesheet">
		<link href="../css/style_menu.css" rel="stylesheet">

  </head>
  <body>

				<div class="container">
					<h1>Alta de Usuarios</h1>
				</div>


        <br><br>

        <div class="container">

                <form class="personal_border" method="post">

                  <section class="datos_personales">

                            <img class="foto_perfil" src="../images/sin_perfil2.png" alt="foto_perfil">

														<input class="botonimg" type="file" name="avatar" multiple>
														<?php if (isset($erroresFinales['imagen'])): ?>
															<span style="color: red;"><i class="ion-ios-close"></i></span>
															<span style="color: red;"><?=$erroresFinales['imagen'];?></span>
														<?php endif; ?>
                            <br><br><br>

                  </section>

                    <section class="datos_personales">
                            <label class="label_usr" for="codigo">Código Usuario:</label>
                            <input class="us_campo"type="text" name="codigo"  value="<?=$codigo;?>">
														<?php if (isset($erroresFinales['codigo'])): ?>
                      				<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                      				<span class="span_error"><?=$erroresFinales['codigo'];?></span>
                      			<?php endif; ?>

                            <br><br><br>


                            <label class="label_usr" for="nombre">Contraseña:</label>
                            <input class="us_campo"type="password" name="pass">
														<?php if (isset($erroresFinales['pass'])): ?>
                      				<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                      				<span class="span_error"><?=$erroresFinales['pass'];?></span>
                      			<?php endif; ?>
                            <br><br><br>

														<label class="label_usr" for="nombre">Verificar Contraseña:</label>
                            <input class="us_campo"type="password" name="repass">
														<?php if (isset($erroresFinales['repass'])): ?>
															<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
															<span class="span_error"><?=$erroresFinales['repass'];?></span>
														<?php endif; ?>
                            <br><br><br>



                            <!-- <label class="label_usr" for="correo">email:</label> value="<?=$email;?>"
                            <input class="us_campo"type="text" name="email" value="<?=$email;?>">
														<?php if (isset($erroresFinales['email'])): ?>
															<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
															<span class="span_error"><?=$erroresFinales['email'];?></span>
														<?php endif; ?> -->

														<label class="label_usr" for="email">Correo electrónico:</label>
														<input class="us_campo" type="text" name="email" value="<?=$email?>">
														<?php if (isset($erroresFinales['email'])): ?>
															<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
															<span class="span_error"><?=$erroresFinales['email'];?></span>
														<?php endif; ?><br><br>

                            <br><br><br>

                            <label class="label_nivel">Nivel:</label>
														<select class="boton_nivel" name="nivel">
															<option  value="">Definir Nivel</option>
															<?php foreach ($nivel as $letra => $valor): ?>
																<?php if (isset($_POST['nivel']) && $letra == $_POST['nivel']): ?>
																	<option selected value="<?=$letra;?>"><?=$valor;?></option>
																<?php else: ?>
																	<option value="<?=$letra;?>"><?=$valor;?></option>
																<?php endif; ?>
															<?php endforeach; ?>
														</select>
														<?php if (isset($erroresFinales['nivel'])): ?>
															<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
															<span class="span_error"><?=$erroresFinales['nivel'];?></span>
														<?php endif; ?><br><br>
                            <br><br>

                            <div class="botonera">

                              <button class="boton" type="submit">Crear</button>
                              <button class="boton" type="submit">Buscar</button>
                              <button class="boton" type="submit">Modificar</button>
                              <label>Activo</label>
                              <input class="check" type="checkbox" name="habilitado" checked value="checked">

                            </div>
                  </section>

                </form>

    </div>
      <footer class="footer_reg">

          <a href="main_menu.php">
              <img class="volver_logo" src="../images/volver.png">

          </a>

      </footer>



  </body>
</html>
