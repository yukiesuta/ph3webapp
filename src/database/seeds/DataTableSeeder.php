<?php

use Illuminate\Database\Seeder;

class DataTableSeeder extends Seeder
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
                'user_id' => 1,
                'date' => '2022-03-01',
                'language_id' => 1,
                'content_id' => 1,
                'hour' => 1
            ]
        ];
        DB::table('data')->insert($params);
    }
}
