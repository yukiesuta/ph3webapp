<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'language' => 'HTML',
            ],
            [
                'language' => 'CSS',
            ],
            [
                'language' => 'JavaScript',
            ],
            [
                'language' => 'PHP',
            ],
            [
                'language' => 'Laravel',
            ],
            [
                'language' => 'SQL',
            ],
            [
                'language' => 'SHELL',
            ],
            [
                'language' => '情報システム基礎知識',
            ],
            
        ];
        DB::table('languages')->insert($params);
    }
}
