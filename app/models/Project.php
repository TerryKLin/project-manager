<?php

class Project extends Eloquent {

	public static $create_rules = array(
		'name' => 'required|unique:projects'
	);

	public static $edit_rules = array(
		'name' => 'required'
	);

	protected $fillable = array("name", "description");

	protected $guarded = array("id", "user_id");

	public $timestamps = false;
	
	/**
	 * User who create the project
	 * @return User User who create the project
	 */
	public function user()
	{
		return $this->belongsTo("User");
	}

	/**
	 * Array of votes made by the user
	 * @return Array<Vote> Array of votes
	 */
	public function votes()
	{
		return $this->hasMany('Vote');
	}
}