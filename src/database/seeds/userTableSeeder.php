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
            ['name'=>'user0','email'=>'user0@posse.com','password'=>Hash::make('password'),'admin'=>1],
            ['name'=>'user1','email'=>'user1@posse.com','password'=>Hash::make('password'),'admin'=>0],
            ['name'=>'user2','email'=>'user2@posse.com','password'=>Hash::make('password'),'admin'=>0],
        ];

        DB::table('users')->insert($param);
    }
}
