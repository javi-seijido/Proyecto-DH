<?php
// require('conexion.php');
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



	function validarPersonal($data,$db){
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

			// if (trim($data['fbaja']) == '') {
			// 		$errores['fbaja'] = 'Ingrese una Fecha.!';
			// 	} else {
								if (!validarFecha($data['fbaja'])) {
									$errores['fbaja'] = 'Formato Erroneo.!';
								}


								// }


		return $errores;
	}

	function crearUsuario($datos){
		$usuarioFinal = [
			// 'id' => generarId(),
			'nombre' => $datos['nombre'],
			'apellido' => $datos['apellido'],
			'edad' => $datos['edad'],
			'genero' => $datos['genero'],
			'fnacimiento' =>	convertirFecha_us($datos['fnacimiento']),
			// 'fnacimiento' =>	$datos['fnacimiento'],
			'dni' => $datos['dni'],
			'telefonomovil' => $datos['telefonomovil'],
			'email' => $datos['email'],
			'calle' => $datos['calle'],
			'num_calle' => $datos['num_calle'],
			'localidad' => $datos['localidad'],
			'escalafon' => $datos['escalafon'],
			'falta' => convertirFecha_us($datos['falta']),
			'fbaja' => convertirFecha_us($datos['fbaja']),
			'genero' => $datos['genero'],
			'info' => $datos['info']

			];

		return $usuarioFinal;
	}

	function cargarJson(){
		// Obtengo el contenido del JSON
		$archivo = file_get_contents("../json/usuarios_personal.json");

		// esto me arma un array con todos los usuarios
      $usuariosJSON = explode(PHP_EOL, $archivo);

		// Saco el último elemento que es una línea vacia
		array_pop($usuariosJSON);

		// Creo un array vacio, para guardar los usuarios
		$usuariosFinal = [];

		// Recorremos el array y generamos por cada usuario un array del usuario
		foreach ($usuariosJSON as $usuario) {
			$usuariosFinal[] = json_decode($usuario, true);
		}

		return $usuariosFinal;
	}

	function generarId(){
		// me traigo todos los usuarios
		$usuarios = cargarJson();

		if (count($usuarios) == 0) {
			return 1;
		}

		// en caso de que haya usuarios agarro el ultimo usuario
		$elUltimo = array_pop($usuarios);

		// pregunto por le id de ese ultimo usuario
		$id = $elUltimo['id'];

		// a ese ID le sumo 1, para asignarle el nuevo ID al usuario  que se esta registrando
		return $id + 1;
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

	// function comprobarEmail ($mail){
	// 	// Traigo todos los usuario
	// 	$usuarios = cargarJson();
	//
	// 	// Recorro ese array
	// 	foreach ($usuarios as $unUsuario) {
	// 		// Si el mail del usuario en el array es igual al que me llegó por POST, devuelvo al usuario
	// 		if ($unUsuario['email'] == $mail) {
	// 			return $unUsuario;
	// 		}
	// 	}
	//
	// 	return false;
	// }

	function guardarUsuario($usuario, $db){
	//  echo "<pre>";
	//  var_dump($usuario);
	//  echo "</pre>";
	//  exit;
	$stmt = $db->prepare("INSERT INTO personal (name,lastname,age,gender,date_age,dni,movil_phone,email,number_street,date_start,date_end,info,rank_id,location_id,street_id) VALUES(:name,:lastname,:age,:gender,:date_age,:dni,:movil_phone,:email,:number_street,:date_start,:date_end,:info,:rank_id,:location_id,:street_id)");

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





	// function guardarUsuario($usuario){
	//
	// 	$usuarioFinal = json_encode($usuario);
	//
	// 	file_put_contents('../json/usuarios_personal.json', $usuarioFinal . PHP_EOL, FILE_APPEND); //PHP_EOL = Salto de linea
	// }

	// Recibe dos parámetros, el nombre el input de la imagen y el array de errores
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


?>
