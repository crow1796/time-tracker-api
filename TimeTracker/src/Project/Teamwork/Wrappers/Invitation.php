<?php 
namespace TimeTracker\Project\Teamwork\Wrappers;

class Invitation {

	private $to;
	private $duration;
	private $token;

	public function __construct($invitation){
		foreach($invitation as $key => $value){
			$this->{$key} = $value;
		}
	}

	public function __get($property){
		if(!property_exists($this, $property) throw new \Exception($property . ' is undefined');
		return $this->{$property};
	}

}