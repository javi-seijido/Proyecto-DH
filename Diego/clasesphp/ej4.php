<?php
$cont = 0;
$tirar_moneda = 0;
 do {
   $random = rand(0,1);
   $tirar_moneda++;
   if ($random == 1) {
     $cont++;
   }

 } while ($cont < 5);

 echo "la moneda se lanzo:" . $tirar_moneda;
 ?>
