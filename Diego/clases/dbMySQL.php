<?php

require_once("db.php");
require_once("usuario.php");

class dbMySQL extends db {
  private $conn;

  public function __construct() {
    $dsn = 'mysql:host=192.168.10.18;dbname=gib;
    charset=utf8mb4;port:3306';
    $db_user = 'root';
    $db_pass = '1111';

    try {
      $opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
      $this->conn = new PDO($dsn, $db_user, $db_pass, $opciones);
    }
    catch( PDOException $Exception ) {
     echo $Exception->getMessage();
     header('Location: ../php/create_db.php'); exit;
    }

  }

// -------------------------------FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------

  public function comprobarUsuario ($usr_selec){

    $stmt = $this->conn->prepare("SELECT id, username, password, email, act FROM user WHERE username = :username");

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

// -------------------------------FIN FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------



  public 	function traerPorMail($email) {
  		$query = $this->conn->prepare("Select * from usuarios where email = :email");
  		$query->bindValue(":email", $email);

  		$query->execute();

      //return $query->fetchObject("Usuario");

      $resultado = $query->fetch();

      if (!$resultado) {
        return NULL;
      }

  		return new Usuario($resultado["email"], $resultado["password"], $resultado["edad"], $resultado["username"], $resultado["pais"], $resultado["id"]);
  	}

    public function traerTodos() {
    		$query = $this->conn->prepare("Select * from usuarios");
    		$query->execute();

    		$arrayDeArrays = $query->fetchAll();

        $arrayDeObjetos = [];

        foreach ($arrayDeArrays as $resultado) {
          $arrayDeObjetos[] = new Usuario($resultado["email"], $resultado["password"], $resultado["edad"], $resultado["username"], $resultado["pais"], $resultado["id"]);
        }

        return $arrayDeObjetos;
    	}

    public	function guardarUsuario(Usuario $usuario) {
    		$query = $this->conn->prepare("Insert into usuarios values(default, :email, :password,:edad,:username,:pais)");

    		$query->bindValue(":email", $usuario->getEmail());
    		$query->bindValue(":password", $usuario->getPassword());
    		$query->bindValue(":edad", $usuario->getEdad());
    		$query->bindValue(":username", $usuario->getUsername());
    		$query->bindValue(":pais", $usuario->getPais());

    		$id = $this->conn->lastInsertId();
    		$usuario->setId($id);

    		$query->execute();

    		return $usuario;

    	}
}

?>
