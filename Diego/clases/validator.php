<?php

require_once("db.php");

class Validator {


// -------------------------------FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------
  public 	function validarUsuario($data){
    $errores = [];

    if (trim($data['usr']) == '') {
      $errores['er_usr'] = 'Usuario Obligatorio';
    }
    if (trim($data['pass']) == '') {
      $errores['er_pass'] = 'Password Obligatoria';
    }
    return $errores;
  }

// -------------------------------FIN FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------

   function validarInformacion($informacion, db $db) {
     $errores = [];

     $nombre=$_FILES["avatar"]["name"];

     $ext = pathinfo($nombre, PATHINFO_EXTENSION);

     if ($_FILES["avatar"]["error"] != 0) {
       $errores["avatar"] = "Error al cargar la foto";
     } else if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
       $errores["avatar"] = "La extension de la foto no es válida";
     }

     foreach ($informacion as $clave => $valor) {
       $informacion[$clave] = trim($valor);
     }


     if (strlen($informacion["username"]) <= 3) {
       $errores["username"] = "Tenes que poner más de 3 caracteres en tu nombre de usuario";
     }

     if ($informacion["edad"] < 18) {
       $errores["edad"] = "Tenes que tener más de 18 años";
     }

     if (is_numeric($informacion["telefono"]) == false) {
       $errores["telefono"] = "El telefono debe ser un numero";
     }


     if ($informacion["email"] == "") {
       $errores["email"] = "Che, dejaste el mail incompleto";
     }
     else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
       $errores["mail"] = "El mail tiene que ser un mail";
     } else if ($db->traerPorMail($informacion["email"]) != NULL) {
       $errores["mail"] = "El usuario ya existia!";
     }

     if ($informacion["password"] == "") {
       $errores["password"] = "No llenaste la contraseña";
     }

     if ($informacion["cpassword"] == "") {
       $errores["cpassword"] = "No llenaste completar contraseña";
     }

     if ($informacion["password"] != "" && $informacion["cpassword"] != "" && $informacion["password"] != $informacion["cpassword"]) {
       $errores["password"] = "Las contraseñas no coinciden";
     }


     return $errores;
   }

}







?>
