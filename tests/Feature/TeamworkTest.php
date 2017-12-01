<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamworkTest extends TestCase
{

	public function setUp(){
		$project = \Mockery::mock('Project');
		$project->shouldReceive('first')
				->once()
				->andReturn((object) [
					'id' => 1,
					'title' => 'My Project',
				]);
		$project = $project->first();

		$this->teamwork = new \TimeTracker\Project\Teamwork\Teamwork($project);
	}
    
	public function testGenerateInvitation(){
		$invitation = $this->teamwork->generateInvitationFor('josh@baytech.ph', 2, false);
		$this->assertInstanceOf('TimeTracker\Project\Teamwork\Wrappers\Invitation', $invitation);
		return $invitation;
	}

}
