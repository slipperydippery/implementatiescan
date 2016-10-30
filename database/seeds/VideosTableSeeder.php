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
                'id' => '1',
                'title' => 'Provisional Video',
                'subtitle' => 'To be used as a test',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => 'P5_GlAOCHyE',
                'download' => '',
            ],
            [
                'id' => '2',
                'title' => 'Focus op werk',
                'subtitle' => 'Video voor thema 1: focus op werk en talent',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => 'Y3nYAdGBFKU',
                'download' => 'noreason.mp3',
            ],
            [
                'id' => '3',
                'title' => 'Kwaliteit Begeleiding',
                'subtitle' => 'Video voor thema 2: Kwaliteit Begeleiding',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => 'JJEWn8ao6qY',
                'download' => 'noreason.mp3',
            ],
            [
                'id' => '4',
                'title' => 'Efficiente Samenwerking',
                'subtitle' => 'Video voor thema 3: Efficiente Samenwerking ',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => '_3bAx_-wshA',
                'download' => 'noreason.mp3',
            ],
        ];

        DB::table('videos')->insert($videos);
    }
}

