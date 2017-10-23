<?php
	function validarUsuario_create($data){
		$errores = [];

		if (trim($data['codigo']) == '') {
			$errores['codigo'] = 'Ingresar codigo';
		}
		if (trim($data['pass']) == '') {
			$errores['pass'] = 'ingresar contraseña';
		}
		if (trim($data['email']) == '') {
			$errores['email'] = 'Che escribí el email!';
		} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$errores['email'] = 'Che el email ES INVALIDO!';
		}

		if (trim($data['nivel']) == '') {
			$errores['nivel'] = 'Che elegí un usuario';
		}

		return $errores;
	}

	function crearUsuario_create($usuario){
		$usuarioFinal = [
			'codigo' => $usuario['codigo'],
			'password' => password_hash($usuario['pass'], PASSWORD_DEFAULT),
			'email' => $usuario['email'],
			'nivel' => $usuario['nivel'],
		];

		return $usuarioFinal;
	}

	function guardarUsuario_create($usuario, $db){
		//  echo "<pre>";
		//  var_dump($db);
		//  echo "</pre>";
		//  exit;
		$stmt = $db->prepare("INSERT INTO user (username,email,password,act,id_perfil) VALUES(:username,:email,:password,:act,:perfil)");

		$stmt->bindValue(':username',$usuario['codigo'], PDO::PARAM_STR);
		$stmt->bindValue(':email',$usuario['email'], PDO::PARAM_STR);
		$stmt->bindValue(':password',$usuario['password'], PDO::PARAM_STR);
		$stmt->bindValue(':act',1, PDO::PARAM_INT);
		$stmt->bindValue(':perfil',$usuario['nivel'], PDO::PARAM_STR);

		$stmt->execute();
}
	// 	$usuarioFinal = json_encode($usuario);
	//
	// 	file_put_contents('usuarios.json', $usuarioFinal . PHP_EOL, FILE_APPEND); //PHP_EOL = Salto de linea
	// }
	//
	// function enviarALaFelicidad(){
	// 	header('location: felicidad.php'); exit;
	// }
?>
