<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            [
            	'id' => '1',
                'name' => 'superadmin',
                'label' => 'All-powerful Super Administrator'
            ],
            [
            	'id' => '2',
                'name' => 'admin',
                'label' => 'Administrator'
            ],
            [
            	'id' => '3',
                'name' => 'participant',
                'label' => 'Deelnemer'
            ],

        ];

        DB::table('roles')->insert($roles);
    }
}
