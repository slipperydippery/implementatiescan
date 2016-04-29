<?php

use Illuminate\Database\Seeder;

class PermissionRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->delete();

        $permission_role = [
            [
            	'permission_id' => '2',
            	'role_id' => '1'
            ],
            [
            	'permission_id' => '1',
            	'role_id' => '1'
            ],
            [
            	'permission_id' => '1',
            	'role_id' => '2'
            ],
        ];

        DB::table('permission_role')->insert($permission_role);
    }
}
