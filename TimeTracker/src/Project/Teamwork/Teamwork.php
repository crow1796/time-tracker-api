<?php 
namespace TimeTracker\Project\Teamwork;

use TimeTracker\Project\Teamwork\Wrappers\Invitation;

class Teamwork {

	private $id;
	private $title;

	public function construct($project){
		$this->setProject($project);
	}

	public function generateInvitationFor($email, $duration = 2, $sendEmail = true){
		$token = 'invite_' . md5(\Carbon\Carbon::now()->getTimestamp()) . '_' . \Carbon\Carbon::now()->getTimestamp();
		return (new Invitation([
			'to' => $email,
			'duration' => $duration,
			'token' => $token,
		]));
	}

	public function send($invitation){

	}

	public function setProject($project){
		$this->id = $project->id;
		$this->title = $project->title;
	}

}