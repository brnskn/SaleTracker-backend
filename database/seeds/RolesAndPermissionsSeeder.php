<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $super_admin = Role::firstOrCreate(['name' => 'super_admin']);
        $distributor = Role::firstOrCreate(['name' => 'distributor']);
        $field_worker = Role::firstOrCreate(['name' => 'field_worker']);
    }
}
