<?php

include_once("cuenta.php");

Class gold extends Cuenta{

    public function debitar($monto,$lugar){
      if ( ($lugar == 'Banelco') || ($lugar == 'Caja')) {
        $monto_total = $monto;
      } else {
          $interes = ($monto * 5)/100;
          $monto_total = $monto + $interes;
      }
      $this->balance = $monto_total - $this->balance;
    }

    public function acreditar($monto){
      if ( $monto >= 25000 ) {
        $monto_total = $monto;
      } else {
            $interes = ($monto * 3)/100;
            $monto_total = $monto - $interes;
      }
      $this->balance = $monto_total + $this->balance;

    }

    public function DebitarServicio($cliente){
      $this->balance = $this->balance - $cliente->CantidadLetras();
    }
}

 ?>
