@extends('layouts.app')
@section('links')
<link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
<link href="/css/styles_users.css" rel="stylesheet">

@endsection
@section('content')

<!-- $nivel = [
  '1'=> 'Administrador',
  '2'=> 'Perfil 1',
  '3'=> 'Perfil 2'
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
    $usuarioAGuardar = crearUsuario_create($_POST);

    // Guardo Usuario en JSON, recibe el array guardado en la variable de arriba
    guardarUsuario_create($usuarioAGuardar,$db);
  } -->



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


      <div class="container">
        <h1>Alta de Usuarios</h1>
      </div>




      <div class="container">

              <form class="personal_border" method="post" action="{{ route('register') }}">
                  {{ csrf_field() }}

                <section class="datos_personales">

                          <img class="foto_perfil" src="../images/sin_perfil2.png" alt="foto_perfil">

                          <input type="file" name="avatar" style="display:none;" id="botonFileReal">

                          <input class="input-file" type="button" value="Subir Foto" onclick="document.getElementById('botonFileReal').click();" style="">




                </section>

                  <section class="datos_personales">
                          <label class="label_usr" for="codigo">Código Usuario:</label>
                          <input class="us_campo"type="text" name="codigo"  value="$codigo;">


                          <br><br><br>


                          <label class="label_usr" for="nombre">Contraseña:</label>
                          <input class="us_campo"type="password" name="pass">

                          <br><br><br>

                          <label class="label_usr" for="nombre">Verificar Contraseña:</label>
                          <input class="us_campo"type="password" name="repass">

                          <br><br><br>





                          <label class="label_usr" for="email">Correo electrónico:</label>
                          <input class="us_campo" type="text" name="email" value="$email">


                          <br><br>

                          <label class="label_nivel">Nivel:</label>
                          <select class="boton_nivel" name="nivel">
                            <option  value="">Definir Nivel</option>

                                <option value="$letra;">=$valor;></option>

                          </select>

                          <label class="activo">Activo</label>
                          <input class="check" type="checkbox" name="habilitado" checked><br><br>

                          <div class="botonera">

                            <button class="input" type="submit">Crear</button>
                            <button class="input" type="submit">Buscar</button>
                            <button class="input" type="submit">Modificar</button>


                          </div>
                </section>

              </form>

  </div>
    <footer class="footer_reg">

        <a href="main_menu.php">
            <img class="volver_logo" src="../images/volver.png">

        </a>

    </footer>



</body>
@endsection
