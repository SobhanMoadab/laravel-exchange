<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert(
            [
                ['name' => 'create-post', 'guard_name' => 'web'],
                ['name' => 'update-post', 'guard_name' => 'web'],
                ['name' => 'view-post', 'guard_name' => 'web'],
                ['name' => 'delete-post', 'guard_name' => 'web'],

                ['name' => 'create-permission', 'guard_name' => 'web'],
                ['name' => 'update-permission', 'guard_name' => 'web'],
                ['name' => 'view-permission', 'guard_name' => 'web'],
                ['name' => 'delete-permission', 'guard_name' => 'web'],

                ['name' => 'create-page', 'guard_name' => 'web'],
                ['name' => 'update-page', 'guard_name' => 'web'],
                ['name' => 'view-page', 'guard_name' => 'web'],
                ['name' => 'delete-page', 'guard_name' => 'web'],

                ['name' => 'create-currency', 'guard_name' => 'web'],
                ['name' => 'update-currency', 'guard_name' => 'web'],
                ['name' => 'view-currency', 'guard_name' => 'web'],
                ['name' => 'delete-currency', 'guard_name' => 'web'],

                ['name' => 'create-order', 'guard_name' => 'web'],
                ['name' => 'update-order', 'guard_name' => 'web'],
                ['name' => 'view-order', 'guard_name' => 'web'],
                ['name' => 'delete-order', 'guard_name' => 'web'],

                ['name' => 'create-system-pref', 'guard_name' => 'web'],
                ['name' => 'update-system-pref', 'guard_name' => 'web'],
                ['name' => 'view-system-pref', 'guard_name' => 'web'],
                ['name' => 'delete-system-pref', 'guard_name' => 'web'],

                ['name' => 'create-setting', 'guard_name' => 'web'],
                ['name' => 'update-setting', 'guard_name' => 'web'],
                ['name' => 'view-setting', 'guard_name' => 'web'],
                ['name' => 'delete-setting', 'guard_name' => 'web'],
            ]
        );
    }
}
