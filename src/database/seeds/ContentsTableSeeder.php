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
                'color'=>'#338FC8',
            ],
            [
                'content' => 'N予備校',
                'color'=>'#6CB753',
            ],
            [
                'content' => 'POSSE課題',
                'color'=>'#EEB30D',
            ],
            
        ];
        DB::table('contents')->insert($params);
    }
}
