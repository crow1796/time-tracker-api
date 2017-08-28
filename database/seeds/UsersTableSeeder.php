<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        $users = [
        	[
        		'name' => 'Joshua Tundag',
        		'username' => 'admin',
        		'email' => 'admin',
        		'password' => \Hash::make('admin'),
        		'created_at' => \Carbon\Carbon::now(),
        	]
        ];

        \DB::table('users')->insert($users);
    }
}
