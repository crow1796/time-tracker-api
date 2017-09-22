<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teams')->delete();

        $teams = [
        	[
        		'name' => 'Syntactics Inc.',
        		'slug' => 'syntactics-inc',
        		'created_at' => \Carbon\Carbon::now(),
        	],
        	[
        		'name' => 'BaytechPH',
        		'slug' => 'baytechph',
        		'created_at' => \Carbon\Carbon::now(),
        	]
        ];

        \DB::table('teams')->insert($teams);
    }
}
