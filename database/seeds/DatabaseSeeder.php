<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SetingSeeder::class);
        $this->call(RolesAndPermission::class);
        $this->call(UsersSeeder::class);
        $this->call(CurrencySeeder::class);
    }
}
