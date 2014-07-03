<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// Validation rules used for registration
	public static $registration_rules = array(
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed|min:6',
		'password_confirmation' => 'required',
	);

	// Validation rules used for login
	public static $login_rules = array(
		'email'    => 'required|email',
		'password' => 'required'
	);

	public $timestamps = false;
	
	// table being used
	protected $table = 'users';

	// Hidden fields when retreiving information
	protected $hidden = array('password', 'remember_token');

	// Mass Assignment
	protected $fillable = array('first_name','last_name','email');

	// Black-list for Mass Assignment
	protected $guarded = array('id','password', 'role','remember_token');

	/**
	 * Finds all votes made by user
	 * @return Array<Vote> Array of votes
	 */
	public function votes()
	{
		return $this->hasMany('Vote');
	}

	/**
	 * Find all the projects belonging to this user
	 * @return Array<Project> Array of Projects
	 */
	public function projects()
	{
		return $this->hasMany('Project');
	}

	/**
	 * Return the full name of the user
	 * @return [String] Full name
	 */
	public function name(){
		return $this->first_name." ".$this->last_name;
	}
}
