<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
    'name'
  ];

  public function users(){
     return $this->hasMany(User::class, 'perfil_id')


  }
}
