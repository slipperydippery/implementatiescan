<?php

use Illuminate\Database\Seeder;

class ScansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scans')->delete();

        $scans = [
            // [
            // 	'id' => '1',
            //     'title' => 'Maartens test scan',
            //     'blurb' => 'hier is een blurb',
            //     'user_id' => '1',
            //     'scanmodel_id' => '1'
            // ]
        ];

        DB::table('scans')->insert($scans);
    }
}
