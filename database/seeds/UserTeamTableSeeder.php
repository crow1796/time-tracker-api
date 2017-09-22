<?php

use Illuminate\Database\Seeder;

class UserTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = \App\Team::first();

        $team->members()->attach(\App\User::first());
    }
}
