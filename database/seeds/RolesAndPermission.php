<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$role = Role::create(['name' => 'admin']);
		$role = Role::create(['name' => 'contador']);
		$role = Role::create(['name' => 'caja']);
    }
}
