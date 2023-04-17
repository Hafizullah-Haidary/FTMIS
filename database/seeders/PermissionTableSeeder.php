<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-show',
            'role-create',
            'role-edit',
            'role-delete',
            'foreigntrip-show',
            'foreigntrip-create',
            'foreigntrip-edit',
            'foreigntrip-delete',
            'employee-show',
            'employee-create',
            'employee-edit',
            'employee-delete',
            'doner-show',
            'doner-create',
            'doner-edit',
            'doner-delete',
            'permission-show',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'invitingAuthority-show',
            'invitingAuthority-create',
            'invitingAuthority-edit',
            'invitingAuthority-delete',
            'user-show',
            'user-create',
            'user-edit',
            'user-delete'
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
