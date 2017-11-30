<?php

require_once("db.php");
require_once("usuario.php");


class dbMySQL extends db {
  private $conn;

  public function __construct() {
    $dsn = 'mysql:host=192.168.10.48;dbname=gib;
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




// ------------------------------FUNCIONES UTILIZADAS POR EL ABM DE PERSONAL--------------------------------------------------
public function cargarcombo($table){
  $query = $this->conn->prepare("SELECT * FROM $table");
  $query->execute();
  $resul = $query->fetchall(PDO::PARAM_STR);
  return $resul;
}

public function crearUsuario($datos){
  $usuarioFinal = [
    // 'id' => generarId(),
    'nombre' => $datos['nombre'],
    'apellido' => $datos['apellido'],
    'edad' => $datos['edad'],
    'genero' => $datos['genero'],
    // 'fnacimiento' =>	$validator->convertirFecha_us($datos['fnacimiento']),
    'fnacimiento' =>	$datos['fnacimiento'],
    // 'fnacimiento' =>	$datos['fnacimiento'],
    'dni' => $datos['dni'],
    'telefonomovil' => $datos['telefonomovil'],
    'email' => $datos['email'],
    'calle' => $datos['calle'],
    'num_calle' => $datos['num_calle'],
    'localidad' => $datos['localidad'],
    'escalafon' => $datos['escalafon'],
    'falta' => $datos['falta'],
    'fbaja' => $datos['fbaja'],
    'genero' => $datos['genero'],
    'info' => $datos['info']

    ];

  return $usuarioFinal;
}

public function guardarUsuario($usuario){
//  echo "<pre>";
//  var_dump($usuario);
//  echo "</pre>";
//  exit;
$stmt = $this->conn->prepare("INSERT INTO personal (name,lastname,age,gender,date_age,dni,movil_phone,email,number_street,date_start,date_end,info,rank_id,location_id,street_id) VALUES(:name,:lastname,:age,:gender,:date_age,:dni,:movil_phone,:email,:number_street,:date_start,:date_end,:info,:rank_id,:location_id,:street_id)");

$stmt->bindValue(':name',$usuario['nombre'], PDO::PARAM_STR);
$stmt->bindValue(':lastname',$usuario['apellido'], PDO::PARAM_STR);
$stmt->bindValue(':age',$usuario['edad'], PDO::PARAM_INT);
$stmt->bindValue(':gender',$usuario['genero'], PDO::PARAM_STR);
$stmt->bindValue('date_age',$usuario['fnacimiento'], PDO::PARAM_STR);
$stmt->bindValue(':dni',$usuario['dni'], PDO::PARAM_STR);
$stmt->bindValue(':movil_phone',$usuario['telefonomovil'], PDO::PARAM_STR);
$stmt->bindValue(':email',$usuario['email'], PDO::PARAM_STR);
$stmt->bindValue(':number_street',$usuario['num_calle'], PDO::PARAM_INT);
$stmt->bindValue(':date_start',$usuario['falta'], PDO::PARAM_STR);
$stmt->bindValue(':date_end',$usuario['fbaja'], PDO::PARAM_STR);
$stmt->bindValue(':info',$usuario['info'], PDO::PARAM_STR);
$stmt->bindValue(':rank_id',$usuario['escalafon'], PDO::PARAM_INT);
$stmt->bindValue(':location_id',$usuario['localidad'], PDO::PARAM_INT);
$stmt->bindValue(':street_id',$usuario['calle'], PDO::PARAM_INT);

$stmt->execute();
}



// ---------------------------FIN  FUNCIONES UTILIZADAS POR EL ABM DE PERSONAL--------------------------------------------------
public function comprobarEmail ($email){
$query = $this->conn->prepare("SELECT count(*) as cantidad
  FROM personal

  WHERE email LIKE :busqueda

  ");


$query->bindValue(':busqueda', '%'.$email.'%', PDO::PARAM_STR);
$query->execute();
$resul_cant = $query->fetch(PDO::FETCH_ASSOC);

$numero=intval ($resul_cant['cantidad']);
// echo "<pre>";
// var_dump($numero);
// echo "<pre>";
// exit;
return $numero;
}


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

}

?>
