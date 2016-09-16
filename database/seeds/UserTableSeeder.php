<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'id' => '1',
                'name_first' => 'Susanne',
                'name_last' => 'Meeuwissen',
                'email' => 'susanne@embav.nl',
                'initial_pwd' => 'password',
                'password' => Hash::make('password')
            ],
            [
                'id' => '2',
                'name_first' => 'Maarten',
                'name_last' => 'de Jager',
                'email' => 'maartendejager@gmail.com',
                'initial_pwd' => 'password',
                'password' => Hash::make('password')
            ],
            [
            	'id' => '3',
                'name_first' => 'admin',
            	'name_last' => 'admin',
            	'email' => 'admin@temp.com',
                'initial_pwd' => 'password',
            	'password' => Hash::make('password')
            ],
            [
            	'id' => '4',
                'name_first' => 'participant',
            	'name_last' => 'participant',
            	'email' => 'participant@temp.com',
                'initial_pwd' => 'password',
            	'password' => Hash::make('password')
            ]
        ];

        DB::table('users')->insert($users);
    }
}
