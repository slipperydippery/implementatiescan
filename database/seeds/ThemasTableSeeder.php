<?php

use Illuminate\Database\Seeder;

class ThemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themas')->delete();

        $themas = [
            [
                'title' => 'Focus op werk en talent',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '2'
            ],
            [
                'title' => 'Kwaliteit begeleiding',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '3'            
            ],
            [
                'title' => 'Effectieve samenwerking',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '4'            
            ]
        ];

        DB::table('themas')->insert($themas);
    }
}
