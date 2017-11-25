<?php
	function validarUsuario_create($data){
		$errores = [];

		if (trim($data['codigo']) == '') {
			$errores['codigo'] = 'Ingresar codigo';
		}

		if (trim($data['pass']) == '') {
			$errores['pass'] = 'ingresar contraseña';
		}

		if (trim($data['repass']) == '') {
			$errores['repass'] = 'Verificar contraseña';
		} elseif (trim($data['pass']) != trim($data['repass'])) {
			$errores['repass'] = 'Las contraseñas no coinciden!';
		}

		if (trim($data['email']) == '') {
			$errores['email'] = 'ingresar email!';
		} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$errores['email'] = 'El email ES INVALIDO!';
		}

		if (trim($data['nivel']) == '') {
			$errores['nivel'] = 'Definir nivel';
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

		if (isset($usuario['habilitado'])) {
				$usuarioFinal['act'] = 1;
		} else {
				$usuarioFinal['act'] = 0;
		}

		return $usuarioFinal;
	}

	function guardarUsuario_create($usuario, $db){
		try {
			$stmt=$db->prepare("
			 INSERT INTO user (username,email,password,act,perfil_id)
			 VALUES (:username,:email,:password,:act,:perfil_id);
			");

			$stmt->bindValue(":username",$usuario['codigo'],PDO::PARAM_STR);
			$stmt->bindValue(":email",$usuario['email'],PDO::PARAM_STR);
			$stmt->bindValue(":password",$usuario['password'],PDO::PARAM_STR);
			$stmt->bindValue(":act",$usuario['act'],PDO::PARAM_INT);
			$stmt->bindValue(":perfil_id",$usuario['nivel'],PDO::PARAM_INT);
			$stmt->execute();

	  }catch( PDOException $e ){
					 echo 'El error fue->'.$e->getMessage();
		}
	}

	// 	$usuarioFinal = json_encode($usuario);
	//
	// 	file_put_contents('usuarios.json', $usuarioFinal . PHP_EOL, FILE_APPEND); //PHP_EOL = Salto de linea
	// }
	//
	function enviarAAltaOk(){
		header('location: altaOk.php'); exit;
	}

?>
