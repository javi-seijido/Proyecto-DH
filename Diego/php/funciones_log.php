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

// function validaremail($data){
//   $errores = [];
//
//   if (trim($data['email']) == '') {
//     $errores['er_email'] = 'mail invalido';
//   }
//   return $errores;
// }
//
// function comprobarEmail ($email){
//   // Traigo todos los usuario
//   $usuarios = traerTodos($email);
//
//   $encontrado = [];
//   // Recorro ese array
//   foreach ($usuarios as $unUsuario) {
//     // Si el mail del usuario en el array es igual al que me llegó por POST, devuelvo al usuario
//     if ($unUsuario['email'] == $email) {
//       $encontrado = $unUsuario;
//       return $encontrado;
//     }
//   }
//   return $encontrado;
// }
//
// function update_pass($pass_reset,$id_usr){
//    $usuarios = traerTodos($email);
//
//    $encontrado = [];
//    // Recorro ese array
//    foreach ($usuarios as $unUsuario) {
//      // Si el mail del usuario en el array es igual al que me llegó por POST, devuelvo al usuario
//      if ($unUsuario['email'] == $email) {
//        $unUsuario['password'] = password_hash($pass_reset,PASSWORD_DEFAULT);
//
//        return $encontrado;
//      }
//    }
//    return $encontrado;
//
// }

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

function comprobarUsuario ($usr_selec,$db){
  $stmt = $db->prepare("SELECT id, username, password, email, act FROM user WHERE username = :username");

  $stmt->bindValue(':username',$usr_selec, PDO::PARAM_STR);

  $stmt->execute();

   $encontrado = $stmt->fetch(PDO::FETCH_ASSOC);
  //  echo "<pre>";
  //  var_dump(($encontrado);
  //  echo "</pre>";
 if (!empty($encontrado)) {
   if ($encontrado['act'] == "1") {
     return $encontrado;
   }
 }
   return false;
 }




  //
  // // Traigo todos los usuario
  // $usuarios = traerTodos($todo);
  //
  // $encontrado = [];
  // // Recorro ese array
  // foreach ($usuarios as $unUsuario) {
  //   // Si el mail del usuario en el array es igual al que me llegó por POST, devuelvo al usuario
  //   if ($unUsuario['name'] == $usr_selec) {
  //     $encontrado = $unUsuario;
  //   }
  // }





// FUNCTION - estaLogueado
function estaLogueado() {
  return isset($_SESSION['id']);
}

// FUNCION - tomar cookie

// FUNCION - guardar en cookie
function guardar_cookie($usuario){
  setcookie('id',$usuario['id'], time()+3600, "/");
  setcookie('username',$usuario['username'], time()+3600, "/");

  // $_COOKIE['id'] = $usuario['id'];
  // $_COOKIE['name'] = $usuario['name'];
  // $_COOKIE['password'] = $usuario['password'];
}

// FUNCTION - loguear
function loguear($usuario) {
  // Guardo en $_SESSION el ID del USUARIO
   $_SESSION['id'] = $usuario['id'];
   $_SESSION['name'] = $usuario['username'];
   $_SESSION['email'] = $usuario['email'];
   $_SESSION['date_log'] = date('Y/m/d');

}

 ?>
