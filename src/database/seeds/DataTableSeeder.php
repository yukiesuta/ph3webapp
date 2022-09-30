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
                'language_id' => 2,
                'content_id' => 1,
                'hour' => 3
            ],[
                'user_id' => 1,
                'date' => '2022-03-02',
                'language_id' => 1,
                'content_id' => 2,
                'hour' => 1
            ],[
                'user_id' => 1,
                'date' => '2022-03-03',
                'language_id' => 2,
                'content_id' => 1,
                'hour' => 1
            ],[
                'user_id' => 1,
                'date' => '2022-03-04',
                'language_id' => 3,
                'content_id' => 2,
                'hour' => 8
            ],[
                'user_id' => 2,
                'date' => '2022-03-02',
                'language_id' => 2,
                'content_id' => 1,
                'hour' => 5
            ],[
                'user_id' => 2,
                'date' => '2022-03-04',
                'language_id' => 1,
                'content_id' => 1,
                'hour' => 1
            ],[
                'user_id' => 2,
                'date' => '2022-03-05',
                'language_id' => 1,
                'content_id' => 1,
                'hour' => 1
            ],[
                'user_id' => 1,
                'date' => '2022-03-01',
                'language_id' => 1,
                'content_id' => 1,
                'hour' => 1
            ],[
                'user_id' => 1,
                'date' => '2022-03-01',
                'language_id' => 1,
                'content_id' => 1,
                'hour' => 1
            ],
        ];
        DB::table('data')->insert($params);
    }
}
