<?php

use Illuminate\Database\Seeder;

class ScanmodelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scanmodels')->delete();

        $scanmodels = [
            [
            	'id' => '1',
                'title' => 'Basis Implementatiescan',
                'blurb' => 'Dit is de basis implementatiescan. Dit is de scan zoals hij in de originele opdracht is opgegeven.'
            ]
        ];

        DB::table('scanmodels')->insert($scanmodels);
    }
}
