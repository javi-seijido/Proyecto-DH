<?php

class Auth {

// -------------------------------FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------

  public function __construct() {
    session_start();

    if (!isset($_SESSION["id"]) && isset($_COOKIE["id"])) {
      $_SESSION['id'] = $_COOKIE['id'];
      $_SESSION['name'] = $_COOKIE['username'];
      $_SESSION['email'] = $_COOKIE['email'];
      $_SESSION['date_log'] = date('Y/m/d');

      header('Location: ../php/main_menu.php'); exit;
    }

  }

  public function guardar_cookie($usuario){
    setcookie('id',$usuario['id'], time()+3600, "/");
    setcookie('username',$usuario['username'], time()+3600, "/");

  }

  public function logout() {
    session_destroy();
    setcookie("logueado", "", -1);
  }

  public function usuarioLogueado(db $db) {
    if ($this->estaLogueado()) {
      $name = $_SESSION["name"];
      return $name;
    } else {
      return NULL;
    }

  }

  public function estaLogueado() {
    return isset($_SESSION['id']);
  }

  public function loguear($usuario) {
    // Guardo en $_SESSION el ID del USUARIO
     $_SESSION['id'] = $usuario['id'];
     $_SESSION['name'] = $usuario['username'];
     $_SESSION['email'] = $usuario['email'];
     $_SESSION['date_log'] = date('Y/m/d');

  }

// -------------------------------FIN FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------

}

?>
