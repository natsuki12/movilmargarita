<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name'=>'Cesar',
        	'email'=>'cesar12piso09@gmail.com', 
        	'password'=>Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');

        $contador = User::create([
        	'name'=>'Julio',
        	'email'=>'julio@gmail.com', 
        	'password'=>Hash::make('12345678'),
        ]);
        $contador->assignRole('contador');

        $caja = User::create([
        	'name'=>'Alberto',
        	'email'=>'alberto@gmail.com', 
        	'password'=>Hash::make('12345678'),
        ]);
        $caja->assignRole('caja');
    }
}
