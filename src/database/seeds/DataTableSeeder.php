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
                'language_id' => 6,
                'content_id' => 1,
                'hour' => 5
            ],[
                'user_id' => 1,
                'date' => '2022-03-01',
                'language_id' => 5,
                'content_id' => 2,
                'hour' => 3
            ],[
                'user_id' => 2,
                'date' => '2022-03-20',
                'language_id' => 7,
                'content_id' => 1,
                'hour' => 1
            ],[
                'user_id' => 2,
                'date' => '2022-03-16',
                'language_id' => 7,
                'content_id' => 2,
                'hour' => 6
            ],[
                'user_id' => 1,
                'date' => '2022-03-15',
                'language_id' => 5,
                'content_id' => 1,
                'hour' => 3
            ],[
                'user_id' => 1,
                'date' => '2022-03-13',
                'language_id' => 4,
                'content_id' => 2,
                'hour' => 7
            ],[
                'user_id' => 1,
                'date' => '2022-03-11',
                'language_id' => 1,
                'content_id' => 4,
                'hour' => 9
            ],[
                'user_id' => 1,
                'date' => '2022-03-01',
                'language_id' => 3,
                'content_id' => 1,
                'hour' => 7
            ],[
                'user_id' => 2,
                'date' => '2022-03-09',
                'language_id' => 7,
                'content_id' => 1,
                'hour' => 2
            ],[
                'user_id' => 1,
                'date' => '2022-03-25',
                'language_id' => 4,
                'content_id' => 1,
                'hour' => 5
            ],[
                'user_id' => 2,
                'date' => '2022-03-21',
                'language_id' => 2,
                'content_id' => 2,
                'hour' => 1
            ],[
                'user_id' => 1,
                'date' => '2022-03-25',
                'language_id' => 6,
                'content_id' => 3,
                'hour' => 29
            ],[
                'user_id' => 2,
                'date' => '2022-03-28',
                'language_id' => 8,
                'content_id' => 1,
                'hour' => 5
            ],
        ];
        DB::table('data')->insert($params);
    }
}
