<?php
  require('conexion.php');
	require('func.php');

	$nivel = [
		'A'=> 'Administrador',
		'B'=> 'Perfil 1',
		'C'=> 'Perfil 2'
	];

	$codigo = '';
	$pass = '';
	$email = '';

	if ($_POST) {


		// Validación
		$erroresFinales = validarUsuario_create($_POST);

		$codigo = $_POST['codigo'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];


		if (empty($erroresFinales)) {
			// Creo Usuario en ARRAY, $usuarioAGuardar recibe el return de la función crear usuario, que es un array asociativo que armé como yo quería.

			$usuarioAGuardar = crearUsuario_create($_POST);

			// Guardo Usuario en JSON, recibe el array guardado en la variable de arriba
			guardarUsuario_create($usuarioAGuardar, $db);

			// Ok guardado
			// enviarALaFelicidad();
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
		    	<link rel="stylesheet" href="../css/style_menu.css">
    <link href="../css/styles_user.css" rel="stylesheet">

  </head>
  <body>
		<?php
				require 'control_session.php';
				require 'menu_cabecera.php';

		?>


        <h1 align="center">Alta de Usuarios</h1>
        <br><br><br>

        <div class="container">

                <form class="personal_border" method="post">

                  <section class="datos_personales">

                            <img class="foto_perfil" src="images/bombero.jpg" alt="foto_perfil">
                            <br><br><br>

                  </section>

                    <section class="datos_personales">
                            <label class="label_usr" for="codigo">Código Usuario:</label>
                            <input class="us_campo"type="text" name="codigo"  value="<?=$codigo;?>">
                            <br><br><br>


                            <label class="label_usr" for="nombre">Contraseña:</label>
                            <input class="us_campo"type="password" name="pass" value="<?=$pass;?>">
                            <br><br><br>

                            <label class="label_usr" for="correo">email:</label> value="<?=$email;?>"
                            <input class="us_campo"type="text" name="email" value="<?=$email;?>">
                            <br><br><br>

                            <label class="label_usr">Nivel:</label>
														<select name="nivel">
															<option value="">Definir Nivel</option>
															<?php foreach ($nivel as $letra => $valor): ?>
																<?php if (isset($_POST['nivel']) && $letra == $_POST['nivel']): ?>
																	<option selected value="<?=$letra;?>"><?=$valor;?></option>
																<?php else: ?>
																	<option value="<?=$letra;?>"><?=$valor;?></option>
																<?php endif; ?>
															<?php endforeach; ?>
														</select>
														<?php if (isset($erroresFinales['nivel'])): ?>
															<span style="color: red;"><?=$erroresFinales['determinar nivel'];?></span>
														<?php endif; ?>
                            <br><br><br>

                            <div class="">

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
