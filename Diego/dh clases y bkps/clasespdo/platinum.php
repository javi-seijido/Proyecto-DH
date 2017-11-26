<?php

Class platinum extends Cuenta{

  public function debitar($monto,$lugar){
    if ($this->balance < 5000) {
      $interes = ($monto * 5)/100;
      $monto_total = $monto + $interes;
    } else {
           $monto_total = $monto;
    }
    $this->balance = $monto_total - $this->balance;
  }

  public function acreditar($monto){
    $this->balance = $monto + $this->balance;

  }


  }


 ?>
