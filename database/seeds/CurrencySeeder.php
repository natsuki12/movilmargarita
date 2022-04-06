<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Currency::create([
            'name' => 'Dólares',
            'value' => '2100000',
        ]);
    }
}
