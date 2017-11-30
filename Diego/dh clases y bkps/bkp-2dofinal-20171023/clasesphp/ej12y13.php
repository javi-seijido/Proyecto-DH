<?php
echo "Ejercicio 12y13:";
echo "<br>";


$ceu = [
   "Argentina" => ["ciudades" => ["Buenos Aires", "Córdoba", "Santa Fé"], "esamericano" => true],
   "Brasil" => ["ciudades" => ["Brasilia", "Rio de Janeiro", "Sao Pablo"],  "esamericano" => true],
   "Colombia" => ["ciudades" => ["Cartagena", "Bogota", "Barranquilla"], "esamericano" => true],
   "Francia" => ["ciudades" => ["Paris", "Nantes", "Lyon"], "esamericano" => false],
   "Italia" => ["ciudades" => ["Roma", "Milan", "Venecia"], "esamericano" => false],
   "Alemania" => ["ciudades" => ["Munich", "Berlin", "Frankfurt"], "esamericano" => false]

 ];

   foreach ($ceu as $pais => $v1) {
      echo "Las ciudades $pais son:";
      foreach ($v1 as $ciudad => $v2) {
        if(is_array($v2)){
          foreach ($v2 as $key => $v3) {
             echo $v3;
          }
        else {
           if ()$v3 = true) {
             echo "Es Americano";
           }
           else {
             echo "No es amercano";
           }
        }
      }

   }

 ?>
