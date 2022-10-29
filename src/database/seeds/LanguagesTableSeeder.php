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
                'color' => '#EA563D',
            ],
            [
                'language' => 'CSS',
                'color' => '#6CB753',
            ],
            [
                'language' => 'JavaScript',
                'color' => '#338FC8',
            ],
            [
                'language' => 'PHP',
                'color' => '#EEB30D',
            ],
            [
                'language' => 'Laravel',
                'color' => '#C66596',
            ],
            [
                'language' => 'SQL',
                'color' => '#606060',
            ],
            [
                'language' => 'SHELL',
                'color' => '#727171',
            ],
            [
                'language' => '情報システム基礎知識',
                'color' => '#90AF86',
            ],

        ];
        DB::table('languages')->insert($params);
    }
}
