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
                'adress' => 'P5_GlAOCHyE'
            ],
            [
                'id' => '2',
                'title' => 'Focus op werk',
                'subtitle' => 'Video voor thema 1: focus op werk en talent',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => '0X6ksSfV51Y'
            ],
            [
                'id' => '3',
                'title' => 'Kwaliteit Begeleiding',
                'subtitle' => 'Video voor thema 2: Kwaliteit Begeleiding',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => '3ONKjef81wk'
            ],
            [
                'id' => '4',
                'title' => 'Efficente Samenwerking',
                'subtitle' => 'Video voor thema 3: Efficente Samenwerking ',
                'blurbtitle' => 'A box of introtext',
                'blurb' => 'lorem ipsum...',
                'adress' => 'oL0zlTyQzig'
            ],
        ];

        DB::table('videos')->insert($videos);
    }
}

