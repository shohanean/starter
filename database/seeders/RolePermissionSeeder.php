<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create all the permission that we will need
        Permission::create(['name' => 'can add role']);
        Permission::create(['name' => 'can edit role']);
        Permission::create(['name' => 'can delete role']);
        Permission::create(['name' => 'can see role list']);
        Permission::create(['name' => 'can add user']);
        Permission::create(['name' => 'can edit user']);
        Permission::create(['name' => 'can delete user']);
        Permission::create(['name' => 'can see user list']);
        Permission::create(['name' => 'can take backup']);
        Permission::create(['name' => 'can restore user']);
        //create the role
        $role = Role::create(['name' => 'Super Admin']);
        //sync all permission to the role
        $role->syncPermissions(Permission::all());
        //assign the user that role
        User::find(1)->assignRole($role);
    }
}
