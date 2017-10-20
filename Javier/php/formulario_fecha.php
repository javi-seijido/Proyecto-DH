
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prueba Fecha</title>
  </head>
  <body>
    <form method="post"enctype="multipart/form-data">
      <input type="text" name="fechas" />
  <input type="submit" value="Validar Fecha" name="validar" />
    <br>

<?php

    echo'<pre>';
  	print_r($_POST);
  	echo'</pre>';
    // vemos si hay datos
    if(isset($_POST["validar"]))

    {


    // capturamos los datos en una variable desde la caja de texto de nuestro formulario

    $fecha=$_POST["fechas"];


    //usamos la funcion explode y ponemos como cortador /

    $partes= explode("/", $fecha);

    If (checkdate ($partes[1],$partes[0],$partes[2]))
    {
    echo "La fecha es correcta";
    }
    else
    {
    echo "La fecha no es correcta";
    }
  }
  ?>


  </body>
</html>
