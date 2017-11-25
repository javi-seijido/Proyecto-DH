<?php

include_once("cuenta.php");

Class classic extends Cuenta{

    public function debitar($monto,$lugar){
      if ( $lugar == 'Banelco') {
        $interes = ($monto * 5)/100;
        $monto_total = $monto + $interes;
      } else {
            if ($lugar == 'link') {
                $interes = ($monto * 10)/100;
                $monto_total = $monto + $interes;
            } else {
                $monto_total = $monto;
            }
      }
      $this->balance = $monto_total - $this->balance;
    }

    public function acreditar($monto){
      $interes = ($monto * 5)/100;
      $monto_total = $monto - $interes;
      $this->balance = $monto_total + $this->balance;

    }

    public function DebitarServicio($cliente){
      $this->balance = $this->balance - 100;
    }
}

 ?>
