<?php
  $error = [];
  // $error = [
  //  "email" => "Correo Electronico es requerido"
  //];

  // este array es para hacer la traduccion de los campos de texto a los
  // mensajes de error
  $translate =[
    "name"      => "Nombre",
    "lastname"  => "Apellido",
    "email"     => "Correo Electronico",
    "pass"      => "Clave",
    "equals"    => "Repetir clave",
  ];

  $persistence = [
    "name"      => "",
    "lastname"  => "",
    "email"     => "",
  ];

  // verifico que el metodo sea POST
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /**
     *  se realiza un foreach para verificar si cada campo esta vacio
     *  si lo esta, se agrega un elemento al array error con la clave del input
     *  y como valor el mensaje de error a mostrar
     */
    foreach ($_POST as $key => $value) {
      if (empty($value)) {
        $error[$key] = $translate[$key]." es requerido";
      }else {
        if(array_key_exists($key, $persistence)) {
          $persistence[$key] = $_POST[$key];
        }
      }
    }

    /**
     * Se evalua si exite solo letras con filter_var y expresion regular
     * eso devuelve true si es correcto y se guarda en la variable $name
     *
     */
    $name = filter_var(
      $_POST["name"],
      FILTER_VALIDATE_REGEXP,
      [ "options" => ["regexp" => '/^[a-zA-Z\s]+$/'] ]
    );

   if (!$name && !isset($error["name"])) {
     $error["name"] = "caracteres en el nombre no permitido";
   }

    /**
     * Se evalua el formato de email con filter_var
     * eso devuelve true si es correcto y se guarda en la variable $email
     */
    $email = filter_var(
      $_POST["email"],
      FILTER_VALIDATE_EMAIL
    );

    /**
     * se evalua $email se es false (!true) y si no existe
     * ya definido el mensaje de error email, puede que ya exista
     * en el foreach para validar si estan vacios los campos
     */
    if (!$email && !isset($error["email"])) {
      $error["email"] = "El formato de correo no es permitido";
    }

    /**
     * se evalua la longitud de pass y si no existe
     * ya definido el mensaje de error pass, puede que ya exista
     * en el foreach para validar si estan vacios los campos
     */
    if (strlen($_POST["pass"]) < 2 && !isset($error["pass"])) {
      $error["pass"] = "La clave debe ser de al menos 3 caracteres";
    }

    /**
     * se evalua pass y equals son iguales y si no existe
     * ya definido el mensaje de error pass y equals, puede que ya exista
     * en el foreach para validar si estan vacios los campos
     */
    if ($_POST["pass"] != $_POST["equals"] && !isset($error["pass"]) && !isset($error["equals"])) {
      $error["equals"] = "La clave deben ser iguales";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!--  pregunto si el array de error es mayor a cero, si es asi es porque hay errores-->
    <?php if (count($error) > 0) : ?>
      <!-- defino una lista para mostrar los errores -->
      <ul>
        <!--  realizo un foreach para obtener los errores del array error -->
        <?php foreach ($error as $value) : ?>
          <!--  imprino cada valor de array error -->
          <li><?php echo $value; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <form action="validations.php" method="post">
      <input
        type="text"
        name="name"
        value="<?php echo $persistence["name"]; ?>"
        placeholder="Nombre">
      <br><br>


        <input
          type="text"
          name="lastname"
          value="<?php echo $persistence["lastname"]; ?>"
          placeholder="Apellido">
        <br><br>

        <input
          type="text"
          name="email"
          value="<?php echo $persistence["email"]; ?>"
          placeholder="email">
        <br><br>

      <input
        type="password"
        name="pass"
        value="" placeholder="clave">
      <br><br>

      <input
        type="password"
        name="equals"
        value=""
        placeholder="Repetir clave">
      <br><br>

      <button type="submit">Enviar</button>

    </form>

  </body>
</html>
