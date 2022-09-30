<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
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
                'content' => 'ドットインストール',
            ],
            [
                'content' => 'N予備校',
            ],
            [
                'content' => 'POSSE課題',
            ],
            
        ];
        DB::table('contents')->insert($params);
    }
}
