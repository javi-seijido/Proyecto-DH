<?php

namespace App\Http\Controllers;
use App\Rank;

use Illuminate\Http\Request;

class RancksController extends Controller
{
  public function Carga_Escalafon()
  {
    $ranks = rank::all();
    return view('registro_personal' , compact('$ranks'));
  }
}
