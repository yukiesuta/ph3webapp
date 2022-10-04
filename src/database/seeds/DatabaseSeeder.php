<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContentsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(DataTableSeeder::class);
    }
}
