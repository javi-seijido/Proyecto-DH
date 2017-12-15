<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class street extends Model
{
  protected $fillable = [
    'name'
  ];

  public function locations(){

   return $this->belongsTo(Location::class, 'locations_id');
  }

  public function Personales(){
     return $this->hasMany(Personal::class, 'streets_id');


  }


}
