<?php
$ceu = array("Italia"=>"Roma", "Luxembourg"=>"Luxembourg", "Bélgica"=> "Bruselas", "Dinamarca"=>"Copenhagen", "Finlandia"=>"Helsinki", "Francia" => "Paris", "Slovakia"=>"Bratislava", "Eslovenia"=>"Ljubljana", "Alemania" => "Berlin", "Grecia" => "Athenas", "Irlanda"=>"Dublin", "Holanda"=>"Amsterdam", "Portugal"=>"Lisbon", "España"=>"Madrid", "Suecia"=>"Stockholm", "Reino Unido"=>"London", "Chipre"=>"Nicosia", "Lithuania"=>"Vilnius", "Republica Checa"=>"Prague", "Estonia"=>"Tallin", "Hungría"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valletta", "Austria" => "Vienna", "Polonia"=>"Warsaw");

foreach ($ceu as $key => $value) {
  // echo  "Las ciudades de" .$key ." son:    ";
  // echo  $value;
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  echo "La capital de $key es: ". $value;
  echo "<br>";

}

 ?>
