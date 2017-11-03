<?php
	require_once('control_session.php');
	require_once('func.php');
	require_once('conexion.php');


//---------------------Carga de browser------------------------------------//
  require_once('master_browser.php');
  $param_table = 'user';

	$list_browser= stmt_list_browser($param_table, $db);
	//  echo "<pre>";
	//  var_dump($list_browser);
	//  echo "</pre>";
	//  exit;
//-------------------------------------------------------------------------//

	$nivel = [
		'A'=> 'Administrador',
		'B'=> 'Perfil 1',
		'C'=> 'Perfil 2'
	];

	$codigo = '';
	// $pass = '';
	// $verpass = '';
	$email = '';

	if ($_POST) {

		// Validación
		$erroresFinales = validarUsuario_create($_POST);

		$codigo = $_POST['codigo'];
		// $pass = $_POST['pass'];
		// $verpass = $_POST['pass'];
		$email = $_POST['email'];


		if (empty($erroresFinales)) {
			// Creo Usuario en ARRAY, $usuarioAGuardar recibe el return de la función crear usuario, que es un array asociativo que armé como yo quería.
			$usuarioAGuardar = crearUsuario($_POST);

			// Guardo Usuario en JSON, recibe el array guardado en la variable de arriba
			guardarUsuario($usuarioAGuardar);
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Alta de Usuarios</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/normalize.css">
	<link href="../css/styles_user.css" rel="stylesheet">
	<link href="../css/style_menu.css" rel="stylesheet">
</head>
<body>
  <?php require_once ('menu_cabecera.php'); ?>
  <h5>Listado de Usuarios:</h5>
  <ol>
  	<li class="titulo_browser">ID</li>
		<li class="titulo_browser">NAME</li>
  </ol>
	<nav class="nav_list_browser">
		<ol>
			<?php foreach ($list_browser as $value) { ?>
					<li><a href="#"><?= $value['id']. '    -    '. $value['username']; ?></a></li>
			<?php } ?>
		</ol>
	</nav>


  </body>
</html>
