<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
  protected $fillable = [
    'name'
  ];

  public function personales(){
     return $this->hasMany(Personal::class, 'ranks_id');


  }
}
