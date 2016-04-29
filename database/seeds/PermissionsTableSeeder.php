<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            [
            	'id' => '1',
                'name' => 'manage_scans',
                'label' => 'Create and Manage Scans'
            ],
            [
            	'id' => '2',
                'name' => 'manage_users',
                'label' => 'Manage any user'
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
