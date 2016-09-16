<?php

use Illuminate\Database\Seeder;

class QuestionThemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_thema')->delete();

        $question_thema = [
            [
                'question_id' => '1',
                'thema_id' => '1',
            ],
            [
                'question_id' => '2',
                'thema_id' => '1',
            ],
            [
                'question_id' => '3',
                'thema_id' => '1',
            ],
            [
                'question_id' => '4',
                'thema_id' => '1',
            ],
            [
                'question_id' => '5',
                'thema_id' => '1',
            ],
            [
                'question_id' => '6',
                'thema_id' => '2',
            ],
            [
                'question_id' => '7',
                'thema_id' => '2',
            ],
            [
                'question_id' => '8',
                'thema_id' => '2',
            ],
            [
                'question_id' => '9',
                'thema_id' => '2',
            ],
            [
                'question_id' => '10',
                'thema_id' => '2',
            ],
            [
                'question_id' => '11',
                'thema_id' => '3',
            ],
            [
                'question_id' => '12',
                'thema_id' => '3',
            ],
            [
                'question_id' => '13',
                'thema_id' => '3',
            ],
            [
                'question_id' => '14',
                'thema_id' => '3',
            ],
            [
                'question_id' => '15',
                'thema_id' => '3',
            ],
        ];

        DB::table('question_thema')->insert($question_thema);
    }
}
