<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'safezone_access',],
            ['id' => 18, 'title' => 'safezone_create',],
            ['id' => 19, 'title' => 'safezone_edit',],
            ['id' => 20, 'title' => 'safezone_view',],
            ['id' => 21, 'title' => 'safezone_delete',],
            ['id' => 22, 'title' => 'around_you_access',],
            ['id' => 23, 'title' => 'broadcast_access',],
            ['id' => 24, 'title' => 'broadcast_create',],
            ['id' => 25, 'title' => 'broadcast_edit',],
            ['id' => 26, 'title' => 'broadcast_view',],
            ['id' => 27, 'title' => 'broadcast_delete',],
            ['id' => 28, 'title' => 'help_access',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
