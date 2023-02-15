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
            ['name'=>'user0','email'=>'user0@posse.com','password'=>Hash::make('password')],
            ['name'=>'user1','email'=>'user1@posse.com','password'=>Hash::make('password')],
            ['name'=>'user2','email'=>'user2@posse.com','password'=>Hash::make('password')],
        ];

        DB::table('users')->insert($param);
    }
}
