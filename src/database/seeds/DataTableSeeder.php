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
                'date' => '2023-02-01',
                'language_id' => 1,
                'content_id' => 0,
                'hour' => 3
            ],[
                'user_id' => 1,
                'date' => '2023-02-01',
                'language_id' => 0,
                'content_id' => 1,
                'hour' => 3
            ]
        ];
        DB::table('data')->insert($params);
    }
}
