<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $fillable = [
    'name'
  ];

  public function streets(){

     return $this->hasMany(street::class, 'locations_id');

  }

  public function personales(){

     return $this->hasMany(Personal::class, 'locations_id');

  }



}
