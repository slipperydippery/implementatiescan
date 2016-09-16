<?php

use Illuminate\Database\Seeder;

class ScanmodelThemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scanmodel_thema')->delete();

        $scanmodel_thema = [
            [
                'scanmodel_id' => '1',
                'thema_id' => '1'
            ],
            [
                'scanmodel_id' => '1',
                'thema_id' => '2'
            ],
            [
                'scanmodel_id' => '1',
                'thema_id' => '3'
            ],
        ];

        DB::table('scanmodel_thema')->insert($scanmodel_thema);
    }
}
