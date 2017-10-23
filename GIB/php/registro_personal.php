<?php

require_once('funciones_reg.php');

$localidades = [
  'A' => 'Avellaneda',
  'S' => 'Sarandi',
  'V' => 'Villa Dominico',
  'W' => 'Wilde'

];

$escalafones = [
  'J' => 'Jefe de Cuerpo',
  'SJ' => 'Sub Jefe de Cerpo',
  'O' => 'Oficiales',
  'SO' => 'Sub Oficiales',
  'B' => 'Bomberos'
];

  $nombre = '';
  $apellido = '';
  $edad = '';
  $fnacimiento = '';
  $dni = '';
  $telefonomovil = '';
  $email = '';
  $dir_calle = '';
  $num_calle = '';
  $falta = '';
  $fbaja = '';

if ($_POST) {

  // Persistencia
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $edad = $_POST['edad'];
  $fnacimiento = $_POST['fnacimiento'];
  $dni = $_POST['dni'];
  $telefonomovil = $_POST['telefonomovil'];
  $email = $_POST['email'];
  $dir_calle = $_POST['dir_calle'];
  $num_calle = $_POST['num_calle'];
  $falta = $_POST['falta'];
  $fbaja = $_POST['fbaja'];

  // $username = $_POST['username'];

  // Validación - La función validarUsuario retorna un array
  $erroresFinales = validarPersonal($_POST);


  if (empty($erroresFinales)) {

    // Si no hay errores en POST 1ero ejecuto la función de guardar la imagen
    $erroresFinales = guardarImagen('avatar', $erroresFinales);

    // Vuelvo a preguntar si el array de errores está vació
    if (empty($erroresFinales)) {
      // Creo Usuario en ARRAY, $usuarioAGuardar recibe el return de la función crear usuario, que es un array asociativo que armé como yo quería.
      $usuarioAGuardar = crearUsuario($_POST);

      // Guardo Usuario en JSON, recibe el array guardado en la variable de arriba
      guardarUsuario($usuarioAGuardar);






      // Ok guardado, redireccionado
      header('location: registro_personal.php'); exit;
    }
  }

}

?>


﻿<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de Personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../css/normalize.css">
    <link href="../css/styles_reg.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_menu.css">

  </head>
  <body>
    <?php
        require 'control_session.php';
        require 'menu_cabecera.php';

    ?>
      <form method="post" enctype="multipart/form-data">

        <h1 align="center"> Registro De Personal:    </h1>

        <div class="container">

                <div class="personal_foto">

                  <!-- <section class="datos_personales"> -->
                        <img class="foto_perfil" src="../images/sin_perfil2.png" alt="foto_perfil"><br>



                        <input type="file" name="avatar" style="display:none;" id="botonFileReal">

                        <input class="input-file" type="button" value="Subir Foto" onclick="document.getElementById('botonFileReal').click();" style="">




                          <?php if (isset($erroresFinales['imagen'])): ?>
                          <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                          <span class="span_error"><?=$erroresFinales['imagen'];?></span>
                        <?php endif; ?>
                  <!-- </section> -->

                </div>




                <div class="personal_border">

                    <section class="datos_personales">


                            <label class="label_usr" for="nombre">Nombre: </label>
                            <input class="us_campo"type="text" name="nombre" value="<?=$nombre;?>">
                            <?php if (isset($erroresFinales['nombre'])): ?>
                      				<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                      				<span class="span_error"><?=$erroresFinales['nombre'];?></span>
                      			<?php endif; ?>
                            <br><br>

                            <label class="label_usr"for="apellido">Apellido: </label>
                            <input class="us_campo" type="text" name="apellido" value="<?=$apellido;?>">
                            <?php if (isset($erroresFinales['apellido'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['apellido'];?></span>
                            <?php endif; ?>
                            <br><br>


                            <label class="label_usr" for="edad">Edad: </label>
                            <input class="us_campo"type="text" name="edad" value="<?=$edad;?>">
                            <?php if (isset($erroresFinales['edad'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['edad'];?></span>
                            <?php endif; ?><br><br>

                            <label class="label_usr">Genero:</label> <br>
                            <br>

                            <label class="genero">
                            <input type="radio" name="genero" value="femenino"> Femenino
                          	</label>

                            <label class="genero">
                      			<input type="radio" name="genero" value="masculino" checked> Masculino
                      			</label>

                      			<label class="genero">
                            <input type="radio" name="genero" value="otro"> Otro
                        		</label>

                      		  <br><br>

                            <label class="label_usr" for="fnacimiento">Fecha de Nacimiento: </label>
                            <input class="us_campo" type="text" name="fnacimiento" value="<?=$fnacimiento;?>">
                            <?php if (isset($erroresFinales['fnacimiento'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['fnacimiento'];?></span>
                            <?php endif; ?><br><br>



                            <label class="label_usr"for="dni">Numero de DNI: </label>
                            <input class="us_campo"type="tex" name="dni" value="<?=$dni;?>">
                            <?php if (isset($erroresFinales['dni'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['dni'];?></span>
                            <?php endif; ?><br><br>


                            <label class="label_usr" for="telefonomovil">Telefono Movil: </label>
                            <input class="us_campo"type="tex" name="telefonomovil" value="<?=$telefonomovil;?>">
                            <?php if (isset($erroresFinales['telefonomovil'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['telefonomovil'];?></span>
                            <?php endif; ?><br><br>

                            <label class="label_usr" for="email">Correo electrónico:</label>
                            <input class="us_campo" type="text" name="email" value="<?=$email?>">
                            <?php if (isset($erroresFinales['email'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['email'];?></span>
                            <?php endif; ?><br><br>

                            <label class="label_usr">Direccion:</label>
                            <br><br>

                            <label class="label_usr" for="dir_calle">Calle: </label>
                            <input class="us_campo"type="text" name="dir_calle" value="<?=$dir_calle;?>">
                            <?php if (isset($erroresFinales['dir_calle'])): ?>
                      				<span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                      				<span class="span_error"><?=$erroresFinales['dir_calle'];?></span>
                      			<?php endif; ?><br><br>


                            <label class="label_usr"for="num_calle">Calle Numero: </label>
                            <input class="us_campo"type="tex" name="num_calle" value="<?=$num_calle;?>">
                            <?php if (isset($erroresFinales['num_calle'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['num_calle'];?></span>
                            <?php endif; ?><br><br>


                            <label class="label_usr">Localidad:</label>

                            <select class="us_campo" name="localidad">
                              <option value="">Elegir</option>
                              <?php foreach ($localidades as $letra => $valor): ?>
                                <?php if (isset($_POST['localidad']) && $_POST['localidad'] == $letra): ?>
                                  <option selected value="<?=$letra;?>"><?=$valor;?></option>
                                <?php else: ?>
                                  <option value="<?=$letra;?>"><?=$valor;?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                            <?php if (isset($erroresFinales['localidad'])): ?>
                              <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                              <span class="span_error"><?=$erroresFinales['localidad'];?></span>
                            <?php endif; ?>
                            <br>

                            <br><br>

                  </section>

                </div>




                <div class="personal_operativo">

                  <section class="datos_operativos">

                      <label class="label_usr">Escalafon:</label>
                      <select class="us_campo" name="escalafon">
                      <option value="">Elegir</option>
                      <?php foreach ($escalafones as $letra => $valor): ?>
                        <?php if (isset($_POST['escalafon']) && $_POST['escalafon'] == $letra): ?>
                          <option selected value="<?=$letra;?>"><?=$valor;?></option>
                        <?php else: ?>
                          <option value="<?=$letra;?>"><?=$valor;?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <?php if (isset($erroresFinales['escalafon'])): ?>
                      <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                      <span class="span_error"><?=$erroresFinales['escalafon'];?></span>
                    <?php endif; ?>
                    <br><br>



                    <label class="label_usr" for="falta">Fecha de Alta: </label>
                    <input class="us_campo" type="text" name="falta" value="<?=$falta;?>">
                    <?php if (isset($erroresFinales['falta'])): ?>
                      <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                      <span class="span_error"><?=$erroresFinales['falta'];?></span>
                    <?php endif; ?><br><br>

                    <label class="label_usr" for="fbaja">Fecha de Baja: </label>
                    <input class="us_campo" type="text" name="fbaja" value="<?=$fbaja;?>">
                    <?php if (isset($erroresFinales['fbaja'])): ?>
                      <span style="color: red;"><img class="error_icon" src="../images/icon_error.png"></span>
                      <span class="span_error"><?=$erroresFinales['fbaja'];?></span>
                    <?php endif; ?><br><br><br>

                     <label>Cursos e Informaion Adicional:</label> <br><br>
                     <textarea class="tex-tarea"name="info"></textarea>
                     <br><br>
                     <br><br>
                          <button class="input" type="submit">Crear</button>
                          <button class="input" type="modificar">Editar</button>
                          <button class="input" type="retroceder"><<<</button>
                          <button class="input" type="avanzar">>>></button>
                          <button class="buscar_button" type="submit">Buscar</button>


                 </section>
      </div>
    </div>

</form>
      <footer class="footer_reg">

          <a href="main_menu.php">
              <img class="volver_logo" src="../images/volver.png">

          </a>

      </footer>



  </body>
</html>
