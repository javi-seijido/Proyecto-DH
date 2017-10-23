<?php
	function validarUsuario_create($data){
		$errores = [];

		if (trim($data['codigo']) == '') {
			$errores['codigo'] = 'Ingresar codigo';
		}

		if (trim($data['pass']) == '') {
			$errores['pass'] = 'Ingresar contraseña';
		}

		if (trim($data['repass']) == '') {
			$errores['repass'] = 'Verificar contraseña';
		} elseif (trim($data['pass']) != trim($data['repass'])) {
			$errores['repass'] = 'Las contraseñas no coinciden!';
		}

		if (trim($data['email']) == '') {
			$errores['email'] = 'Ingresar e-mail!';
		} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$errores['email'] = 'e-mail invalido!';
		}

		if (trim($data['nivel']) == '') {
			$errores['nivel'] = 'Determinar Nivel';
		}



		return $errores;
	}

	function crearUsuario($usuario){
		$usuarioFinal = [
			'codigo' => $usuario['codigo'],
			'password' => password_hash($usuario['pass'], PASSWORD_DEFAULT),
			'email' => $usuario['email'],
			'nivel' => $usuario['nivel'],
		];

		return $usuarioFinal;
	}

	function guardarUsuario($usuario){
		$usuarioFinal = json_encode($usuario);

		file_put_contents('usuarios.json', $usuarioFinal . PHP_EOL, FILE_APPEND); //PHP_EOL = Salto de linea
	}

	function enviarAAltaOk(){
		header('location: altaOk.php'); exit;
	}
?>
