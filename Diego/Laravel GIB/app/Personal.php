<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
  protected $fillable = ['name', 'lastname', 'age', 'gender', 'date_age', 'dni', 'movil_phone', 'email', 'number_street', 'date_start', 'date_end', 'info', 'urlImg'];


  public function locations(){

   return $this->belongsTo(Location::class, 'locations_id');

  }

  public function ranks(){

   return $this->belongsTo(Rank::class, 'ranks_id');

  }

  public function streets(){

   return $this->belongsTo(Street::class, 'streets_id');

  }


}
