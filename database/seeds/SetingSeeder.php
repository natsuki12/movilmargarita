<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        	'name'=>'Moviltrend',
        	'address'=>'Sambil',
        	'email'=>'mmoviltrend@gmail.com',
        	'phone'=>'04248647474',
        	'mobile'=>'04160302290',
        	'logo'=>'Sambil',
        	'city'=>'Pampatar',
        	'country'=>'margarita',
        	'zip_code'=>'6302',
        ]);
    }
}
