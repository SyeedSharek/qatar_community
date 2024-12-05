<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $permissions = [
            ['name' => 'user list'],
            ['name' => 'create user'],
            ['name' => 'edit user'],
            ['name' => 'delete user'],
            ['name' => 'role list'],
            ['name' => 'create role'],
            ['name' => 'edit role'],
            ['name' => 'delete role'],
            ['name' => 'permission list'],
        ];

        foreach($permissions as $item) {
            Permission::create($item);
        }
        // Assign permissions to roles  

        $adminRole = Role::create(['name' => 'admin']);  

        $adminRole->syncPermissions(Permission::all());

        // Admin  user  
        $user = User::first();
        if ($user) {
            $user->assignRole($adminRole);
        }


    }
}
