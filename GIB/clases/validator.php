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



// --------------------------------FUNCIONES UTILIZADAS POR EL ABM DE PERSONAL---------------------------------------------------------

public function validarFecha($fecha)
{
  $valores = [];

  $valores = explode('-', $fecha);
    if(!(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])))
      {
          return false;
      }
      return true;
}


public function convertirFecha_us($fecha_sp)

{
  $date = new DateTime($fecha_sp);
  $resultado = $date->format('Y-m-d');
  return $resultado;
}



public function validarPersonal($data){
$errores = [];


if (trim($data['nombre']) == '') {
  $errores['nombre'] = 'Ingrese un Nombre.!';
}
if (trim($data['apellido']) == '') {
  $errores['apellido'] = 'Ingrese un Apellido.!';
}

if (trim($data['edad']) == '') {
    $errores['edad'] = 'Ingrese la Edad.!';
} else {
          if (!(is_numeric($data['edad'])))
          {
              $errores['edad'] = 'Ingrese Edad Valida.!';
          }
}

if (trim($data['fnacimiento']) == '') {
    $errores['fnacimiento'] = 'Ingrese una Fecha.!';
  } else {
          if (!$this->validarFecha($data['fnacimiento'])) {
            $errores['fnacimiento'] = 'Formato Erroneo.!';
          }


          }

if (trim($data['dni']) == '') {
    $errores['dni'] = 'Ingresar D.N.I.!';
} else {
          if (!(is_numeric($data['dni'])))
          {
              $errores['dni'] = 'Ingrese un Numero.!';
          }
}


if (trim($data['telefonomovil']) == '') {
    $errores['telefonomovil'] = 'Ingresar telef. Movil.!';
} else {
          if (!(is_numeric($data['telefonomovil'])))
          {
              $errores['telefonomovil'] = 'Ingrese un Numero.!';
          }
}


if (trim($data['email']) == '') {
$errores['email'] = 'Ingrese Email.!';
} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
$errores['email'] = 'Formato Erroneo..!';}
// } elseif ($this->comprobarEmail($data['email']) == 1) {
// $errores['email'] = 'El Email ya Existe';
// }


if (trim($data['calle']) == '') {
$errores['calle'] = 'Ingrese la Calle';
}

if (trim($data['num_calle']) == '') {
  $errores['num_calle'] = 'Ingresar Numero de Calle!';
} else {
        if (!(is_numeric($data['num_calle'])))
        {
            $errores['num_calle'] = 'Ingrese un Numero.!';
        }
}


if (trim($data['localidad']) == '') {
  $errores['localidad'] = 'Elegir localidad';
}


if (trim($data['escalafon']) == '') {
    $errores['escalafon'] = 'Elegir Escalafon';
  }


  if (trim($data['falta']) == '') {
      $errores['falta'] = 'Ingrase una Fecha.!';
    } else {
            if (!$this->validarFecha($data['falta'])) {
              $errores['falta'] = 'Formato Erroneo.!';
            }


            }

            if (!$this->validarFecha($data['fbaja'])) {
              $errores['fbaja'] = 'Formato Erroneo.!';
            }





return $errores;
}

public function guardarImagen($laImagen, $errores){
  if ($_FILES[$laImagen]['error'] == UPLOAD_ERR_OK) {
    // Capturo el nombre de la imagen, para obtener la extensión
    $nombreImagen = $_FILES[$laImagen]['name'];
    // Obtengo la extensión de la imagen
    $ext = pathinfo($nombreImagen, PATHINFO_EXTENSION);
    // Capturo el archivo temporal
    $archivoImagen = $_FILES[$laImagen]['tmp_name'];

    // Pregunto si la extensión es la deseada
    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
      // Armo la ruta donde queda gurdada la imagen

      $rutaArchivo = dirname(__FILE__) . '/../avatares/' . $_POST['email'] . '.' . $ext;




      // Subo la imagen definitivamente
      move_uploaded_file($archivoImagen, $rutaArchivo);
    } else {
      $errores['imagen'] = 'El formato tiene que ser JPG, JPEG, PNG o GIF';
    }
  } else {
    // Genero error si no se puede subir
    $errores['imagen'] = 'No se pudo subir la imagen';
  }

  return $errores;
}


// --------------------------------FIN FUNCIONES UTILIZADAS POR EL ABM DE PERSONAL---------------------------------------------------------
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
