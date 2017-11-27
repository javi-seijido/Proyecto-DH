<?php

require_once("db.php");

class dbJSON extends db {
  private $arch;

  public function __construct() {
    $this->arch = "usuarios.json";
  }

// -------------------------------FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------
  public function traerTodos(){
    // Obtengo el contenido del JSON
    $archivo = file_get_contents("../json/usuarios.json");

    // esto me arma un array con todos los usuarios
      $usuariosJSON = explode(PHP_EOL, $archivo);

    // Saco el último elemento que es una línea vacia
    array_pop($usuariosJSON);

    // Creo un array vacio, para guardar los usuarios
    $usuariosFinal = [];

    // Creo un array de usuarios generado desde el json
    foreach ($usuariosJSON as $usuario) {

      $usuariosFinal[] = json_decode($usuario, true);

    }

    return $usuariosFinal;
  }
// -------------------------------FIN FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------

public function traerPorMail($email) {

}

public function guardarUsuario($usuario) {

}


}

?>
