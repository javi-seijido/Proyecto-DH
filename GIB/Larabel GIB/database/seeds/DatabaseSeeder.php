<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ProfileSeeder::class);
        // $this->call(UserSeeder::class);
        \DB::table('profiles')->insert(
        ['name' => 'admisnitrador']);


        \DB::table('users')->insert(
        ['username'  =>	'Administrador',
         'email'		  =>	'Administrador@hotmail.com',
         'password'  =>	bcrypt('1234'),
         'act' 		  =>	'1',
         'perfil_id' => '1']);

       \DB::table('locations')->insert(
       ['name'  =>	'Avellaneda']);

       \DB::table('streets')->insert(
       ['name'  =>	'Calle Falsa',
        'num_from'  =>	'0',
        'num_to'  =>	'2000',
        'state'  =>	'Buenos Aires',
        'locations_id'  =>	'1']);

        \DB::table('ranks')->insert(
        ['name'  =>	'Bombero']);

    }
}
