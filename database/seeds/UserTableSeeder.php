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
                'password' => Hash::make('password')
            ],
            [
                'id' => '2',
                'name_first' => 'Maarten',
                'name_last' => 'de Jager',
                'email' => 'maartendejager@gmail.com',
                'password' => Hash::make('password')
            ],
            [
            	'id' => '3',
                'name_first' => 'admin',
            	'name_last' => 'admin',
            	'email' => 'admin@temp.com',
            	'password' => Hash::make('admin')
            ],
            [
            	'id' => '4',
                'name_first' => 'participant',
            	'name_last' => 'participant',
            	'email' => 'participant@temp.com',
            	'password' => Hash::make('participant')
            ]
        ];

        DB::table('users')->insert($users);
    }
}
