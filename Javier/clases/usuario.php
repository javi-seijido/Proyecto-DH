<?php

class Usuario {
  private $id;
  private $username;
  private $email;
  private $password;
  private $act;
  private $perfil_id;

  public function __construct($email, $password, $act, $username, $perfil_id, $id = null) {
    if ($id == null) {
      // Viene por POST
      $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
      // Viene de la base
      $this->password = $password;
    }

    $this->email = $email;
    $this->act = $act;
    $this->username = $username;
    $this->perfil_id = $perfil_id;
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getact() {
    return $this->act;
  }

  public function setact($act) {
    $this->act = $act;
  }

  public function getperfil() {
    return $this->perfil_id;
  }

  public function setperfil($perfil_id) {
    $this->perfil_id = $perfil_id;
  }




  function guardarImagen() {

		if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK)
		{

			$nombre=$_FILES["avatar"]["name"];
			$archivo=$_FILES["avatar"]["tmp_name"];

			$ext = pathinfo($nombre, PATHINFO_EXTENSION);

			$miArchivo = dirname(__FILE__);
			$miArchivo = $miArchivo . "/../img/";
			$miArchivo = $miArchivo . $this->email . "." . $ext;

			move_uploaded_file($archivo, $miArchivo);
		}
	}
}

?>
