<?php

use Illuminate\Database\Seeder;

class AdminUserTabaleSeeder extends Seeder
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
                'username' => 'admin1',
                'password'=>Hash::make('password'),
                'name'=>'admin_name',
                'avatar'=>'leader',
                'remember_token'=>'aaabbbccc',
            ]
            
        ];
        DB::table('admin_users')->insert($params);
    }
}
