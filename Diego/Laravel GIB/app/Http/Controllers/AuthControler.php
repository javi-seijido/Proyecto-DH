<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class AuthControler extends Controller
{

  public function showLogin(){

      // if (Auth::check()){
      //   return Redirect('/menu');
      // }

      return View('index');
  }

  public function validateUserResult (Request $request){
        $this->validate(
               $request,
               [
                   'usr' => 'required | string | unique:users',
                   'pass' => 'required | string',

               ],
               [
                 'usr.required' => 'Usuario Obligatorio'
                 'pass.required' => 'Password Erronea'
               ]
          );

          $user = User::where('usr', '=', $request['usr'])->get();

          dd($user);


  }




}
