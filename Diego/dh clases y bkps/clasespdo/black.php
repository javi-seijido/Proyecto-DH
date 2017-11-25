<?php

include_once("cuenta.php");

Class black extends Cuenta{

  public function debitar($monto,$lugar){
    $this->balance = $monto_total - $this->balance;
  }

  public function acreditar($monto){
    if ( $monto > 1000000 ) {
      $interes = ($monto * 4)/100;
      $monto_total = $monto - $interes;
    } else {
                $monto_total = $monto;
    }
    $this->balance = $monto_total + $this->balance;

  }

  public function DebitarServicio($cliente){
    $dia = date('d');
    $monto_deb = 500 + (100*$dia);
    $this->balance = $this->balance - $monto_deb;
  }

  }


 ?>
