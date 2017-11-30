<?php

Class pyme extends Cliente{
  Private $cuit;
  Private $razon;

  public function setcuit($cuit){
    $this->cuit = $cuit;
  }
  public function getcuit(){
    return $this->cuit;
  }

  public function setrazon($razon){
    $this->cuit = $cuit;
  }
  public function getrazon(){
    return $this->razon;
  }

  public function CantidadLetras(){
    return strlen($this->razon)*5;
  }

 ?>
