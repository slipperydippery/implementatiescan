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
                'title' => 'Thema: Focus op werk en talent',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '1'
            ],
            [
                'title' => 'Thema: Kwaliteit begeleiding',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '1'            
            ],
            [
                'title' => 'Thema: Effectieve samenwerking',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '1'            
            ]
        ];

        DB::table('themas')->insert($themas);
    }
}
