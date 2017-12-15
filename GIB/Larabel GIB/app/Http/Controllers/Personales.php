<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\street;
use App\Location;
use App\Rank;
use Storage;

class Personales extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    public function Carga_Combos()
    {
      $streets = street::all();
      $locations = Location::all();
      $ranks = Rank::all();



      return view('registro_personal' , compact('streets','locations','ranks'));

    }


     // * @return \Illuminate\Http\Response
     // */
    public function create(Request $request){
      // dd($request);

      // $this->validate($request, [

      //   $request->validate([
      //
      //   'avatar' => 'required',
      //   'nombre' => 'required',
      //   'apellido' => 'required',
      //   'edad' => 'numeric|required|min:10|max:70',
      //   'fnacimiento' => 'required|date_format:"Y-m-d"',
      //   'dni' => 'required|unique:posts|numeric|required|min:1000000000|max:99999999',
      //   'telefonomovil' => 'numeric|required|min:1100000000|max:1199999999',
      //   'email' => 'required|email|unique:personales',
      //   'num_calle' => 'numeric|required|min:1|max:99999',
      //   'falta' => 'required|date_format:"Y-m-d"',
      //   'fbaja' => 'required|date_format:"Y-m-d"'
      // ]);


      $persona = new Personal();

      $persona->name = $request->input('nombre');
      $persona->lastname = $request->input('apellido');
      $persona->age = $request->input('edad');
      $persona->gender = $request->input('genero');
      $persona->date_age = $request->input('fnacimiento');
      $persona->dni = $request->input('dni');
      $persona->movil_phone = $request->input('telefonomovil');
      $persona->email = $request->input('email');
      $persona->number_street = $request->input('num_calle');
      $persona->date_start = $request->input('falta');
      if ($request->input('fbaja') == '') {
        $persona->date_end = '2100-01-01';
      } else {
        $persona->date_end = $request->input('fbaja');
      }
      $persona->info = $request->input('info');
      $persona->ranks_id = $request->input('escalafon');
      $persona->streets_id = $request->input('calle');
      $persona->locations_id = $request->input('localidad');

      $img = $request->file('avatar');

      $file_route = $request->input('email').'_'.$img->getClientOriginalName();

      Storage::disk('imgPersonas')->put($file_route, file_get_contents($img->getRealPath()));

      $persona->urlImg = $file_route;


      $persona->save();

      return redirect('/personal');

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->fbaja);
        // $this->validate($request, [
        //
        //   'avatar' => 'required',
        //   'nombre' => 'required',
        //   'apellido' => 'required',
        //   'edad' => 'numeric|required|min:10|max:70',
        //   'fnacimiento' => 'required|date_format:"Y-m-d"',
        //   'dni' => 'required|unique:posts|numeric|required|min:1000000000|max:99999999',
        //   'telefonomovil' => 'numeric|required|min:1100000000|max:1199999999',
        //   'email' => 'required|email|unique:personales',
        //   'num_calle' => 'numeric|required|min:1|max:99999',
        //   'falta' => 'required|date_format:"Y-m-d"',
        //   'fbaja' => 'required|date_format:"Y-m-d"'
        // ]);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
