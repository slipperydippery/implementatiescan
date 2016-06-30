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
                'title' => 'Focus op werk',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '1'
            ],
            [
                'title' => 'Kwaliteit begeleiding',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '1'            
            ],
            [
                'title' => 'Effectieve samenwerking',
                'blurbtitle' => '',
                'blurb' => '',
                'video_id' => '1'            
            ]
        ];

        DB::table('themas')->insert($themas);
    }
}
