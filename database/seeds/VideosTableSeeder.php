<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->delete();

        $videos = [
            [
                'title' => 'Provisional Video',
                'subtitle' => 'To be used as a test',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => 'P5_GlAOCHyE'
            ]
        ];

        DB::table('videos')->insert($videos);
    }
}

