<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(ScanmodelsTableSeeder::class);
        $this->call(ThemasTableSeeder::class);
        $this->call(ScanmodelThemasTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
    }
}
