<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['name'=>'武田龍一','email'=>'user0@posse.com','password'=>Hash::make('password')],
            ['name'=>'石川朝香','email'=>'user1@posse.com','password'=>Hash::make('password')],
            ['name'=>'松本透歩','email'=>'user2@posse.com','password'=>Hash::make('password')],
        ];

        DB::table('users')->insert($param);
    }
}
