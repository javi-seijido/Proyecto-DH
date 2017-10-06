<?php
function ingresar_al_menu(){
  header('location: main_menu.php'); exit;
}

function validarUsuario($data){
  $errores = [];

  if (trim($data['usr']) == '') {
    $errores['er_usr'] = 'Usuario Obligatorio';
  }
  if (trim($data['pass']) == '') {
    $errores['er_pass'] = 'Password Obligatoria';
  }
  return $errores;
}

function traerTodos($data){
  // Obtengo el contenido del JSON
  $archivo = file_get_contents("../json/usuarios.json");

  // esto me arma un array con todos los usuarios
    $usuariosJSON = explode(PHP_EOL, $archivo);

  // Saco el último elemento que es una línea vacia
  array_pop($usuariosJSON);

  // Creo un array vacio, para guardar los usuarios
  $usuariosFinal = [];

  // Creo un array de usuarios geerado desde el json
  foreach ($usuariosJSON as $usuario) {
    $usuariosFinal[] = json_decode($usuario, true);
  }
  return $usuariosFinal;
}

function comprobarUsuario ($usr_selec,$todo){
  // Traigo todos los usuario
  $usuarios = traerTodos($todo);

  $encontrado = [];
  // Recorro ese array
  foreach ($usuarios as $unUsuario) {
    // Si el mail del usuario en el array es igual al que me llegó por POST, devuelvo al usuario
    if ($unUsuario['name'] == $usr_selec) {
      $encontrado = $unUsuario;
    }
  }
  return $encontrado;
}

 ?>
