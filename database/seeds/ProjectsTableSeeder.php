<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->delete();

        $baytech = \App\Team::where(['slug' => 'baytechph'])->first()->id;

        $projects = [
        	[
        		'team_id' => $baytech,
        		'title' => 'LawFormsUSA',
        		'slug' => 'lawformsusa',
        		'created_at' => \Carbon\Carbon::now(),
        	],
        	[
        		'team_id' => $baytech,
        		'title' => 'PDFRun',
        		'slug' => 'pdfrun',
        		'created_at' => \Carbon\Carbon::now(),
        	],
        	[
        		'team_id' => $baytech,
        		'title' => 'PassportUSA',
        		'slug' => 'passportusa',
        		'created_at' => \Carbon\Carbon::now(),
        	],
        	[
        		'team_id' => $baytech,
        		'title' => 'PDFFormPro',
        		'slug' => 'pdfformpro',
        		'created_at' => \Carbon\Carbon::now(),
        	],
        	[
        		'team_id' => $baytech,
        		'title' => 'Oill.io',
        		'slug' => 'oill-io',
        		'created_at' => \Carbon\Carbon::now(),
        	]
        ];

        \DB::table('projects')->insert($projects);
    }
}
