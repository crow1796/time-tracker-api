<?php

use Illuminate\Database\Seeder;

class IterationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('iterations')->delete();

        $iterations = [
        	[
        		'started_at' => \Carbon\Carbon::now(),
        		'ended_at' => \Carbon\Carbon::now()->addDays(7),
        		'created_at' => \Carbon\Carbon::now(),
        	],
        	[
        		'started_at' => \Carbon\Carbon::now()->addDays(7),
        		'ended_at' => \Carbon\Carbon::now()->addDays(14),
        		'created_at' => \Carbon\Carbon::now(),
        	],
        	[
        		'started_at' => \Carbon\Carbon::now()->addDays(14),
        		'ended_at' => \Carbon\Carbon::now()->addDays(21),
        		'created_at' => \Carbon\Carbon::now(),
        	],
        ];

        \DB::table('iterations')->insert($iterations);
    }
}
