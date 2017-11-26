<!DOCTYPE HTML>
<html>
<body>
<form action="imprimir.php" method="post">
    Nombre: <input type="text" name="nombre"><br>
    E-mail: <input type="text" name="email"><br><br><br>
    Internet: <input type="checkbox" name="check" value="in1"> <br>
    Revistas: <input type="checkbox" name="check" value="in2"> <br>
    Diarios: <input type="checkbox" name="check" value="in3"> <br><br><br><br>

    Masculino: <input type="radio" name="r1" value="r1">
    Femenino: <input type="radio" name="r2" value="r2"> <br><br><br><br>

    Como te sentiste anoche: <select name="select">
      <option value="value1">Value 1</option>
      <option value="value2">Value 2</option>
      <option value="value3">Value 3</option>
      <option value="value3">Value 4</option>
      <option value="value3">Value 5</option>
      <option value="value3">Value 6</option>
      <option value="value3">Value 7</option>
      <option value="value3">Value 8</option>
      <option value="value3">Value 9</option>
      <option value="value3">Value 10</option>
    </select> <br><br><br><br>

    Aceptar Terminos y Condiciones: <input type="checkbox" name="term" value="term"> <br><br><br><br>

    <input type="submit">



</form>
</body>
</html>


<?php
 echo "<br>";
  echo "<br>";
   echo "<br>";
    echo "<br>";
foreach ($_POST as $key => $value) {
  echo $value;
  echo "<br>";
}
 // echo $_POST["nombre"];

 // var_dump($_POST)

 ?>
