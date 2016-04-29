<?php

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();

        $role_user = [
            [
                'role_id' => '1',
                'user_id' => '1'
            ],
            [
                'role_id' => '2',
                'user_id' => '2'
            ],
            [
                'role_id' => '3',
                'user_id' => '3'
            ],
        ];

        DB::table('role_user')->insert($role_user);
    }
}
