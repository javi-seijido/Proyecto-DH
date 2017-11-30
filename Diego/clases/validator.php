<?php

require_once("db.php");

class Validator {


// --------------------------------FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------

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

//--------------------------------FIN FUNCIONES UTILIZADAS POR EL LOGUIN------------------------------------------------------

// --------------------------------FUNCIONES UTILIZADAS POR EL ABM DE PERSONAL---------------------------------------------------------

function validarFecha($fecha)
{
  $valores = [];

  $valores = explode('-', $fecha);
    if(!(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])))
      {
          return false;
      }
      return true;
}


function convertirFecha_us($fecha_sp)

{
  $date = new DateTime($fecha_sp);
  $resultado = $date->format('Y-m-d');
  return $resultado;
}



function validarPersonal($data){
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
          if (!validarFecha($data['fnacimiento'])) {
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
$errores['email'] = 'Formato Erroneo..!';
} elseif (comprobarEmail($data['email'], $db) == 1) {
$errores['email'] = 'El Email ya Existe';
}


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
            if (!validarFecha($data['falta'])) {
              $errores['falta'] = 'Formato Erroneo.!';
            }


            }

            if (!validarFecha($data['fbaja'])) {
              $errores['fbaja'] = 'Formato Erroneo.!';
            }





return $errores;
}

function comprobarEmail ($email, $db){


$query = $db->prepare("SELECT count(*) as cantidad
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

function guardarImagen($laImagen, $errores){
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


// --------------------------------FUNCIONES UTILIZADAS POR EL ABM DE PERSONAL---------------------------------------------------------






}







?>
