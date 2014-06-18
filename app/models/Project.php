<?php

class Project extends Eloquent {
	protected $fillable = ["name","description","user_id"];

	public $timestamps = false;
	
	public function createdBy()
	{
		return $this->belongsTo("User");
	}
}