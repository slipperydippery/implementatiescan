<?php

use Illuminate\Database\Seeder;

class InstantiemodelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instantiemodels')->delete();

        $instantiemodels = [
            [
                'title' => 'Scholen',
                'blurb' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Sociale Diensten / Werkbedrijf',
                'blurb' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Leerplicht / SMW',
                'blurb' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Werkgevers (vertegenwoordigers)',
                'blurb' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Zorg',
                'blurb' => 'bijv MEE, Jeugdzorg.',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Overig',
                'blurb' => 'bijv UWV, Projectorganisaties.',
                'scanmodel_id' => '1'
            ],
        ];

        DB::table('instantiemodels')->insert($instantiemodels);
    }
}