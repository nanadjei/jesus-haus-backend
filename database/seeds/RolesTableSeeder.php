<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Role $role)
    {
        $role->create(['name' => 'super admin', 'slug' => 'super-admin']);
        $role->create(['name' => 'admin', 'slug' => 'admin']);
    }
}
