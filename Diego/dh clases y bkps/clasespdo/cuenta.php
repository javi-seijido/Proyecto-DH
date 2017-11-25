<?php

abstract Class Cuenta{
  Private $cbu;
  Private $balance;
  Private $Fecha_último_mov;


  public function __construct($cbu){
    $this->cbu = $cbu;
  }

  public function setcbu($cbu){
    $this->cbu = $cbu;
  }
  public function getcbu(){
    return $this->cbu;
  }

  public function setbalance($balance){
    $this->balance = $balance;
  }
  public function getbalance(){
    return $this->balance;
  }

  public function setFecha_último_mov($Fecha_último_mov){
    $this->Fecha_último_mov = $Fecha_último_mov;
  }
  public function getFecha_último_mov(){
    return $this->Fecha_último_mov;
  }

  public abstract function debitar($monto,$lugar);

  public function acreditar($monto){
    $this->balance = $monto + $this->balance ;
    $this->Fecha_último_mov = date('Y/m/d');
  }

 ?>
