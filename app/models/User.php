<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public $timestamps = false;
	
	// table being used
	protected $table = 'users';

	// Hidden fields when retreiving information
	protected $hidden = array('password', 'remember_token');

	// Mass Assignment
	protected $fillable = ['first_name','last_name','email'];

	// Black-list for Mass Assignment
	protected $guarded = ['id','password', 'role','remember_token'];

	/**
	 * Finds all votes made by user
	 * @return Array<Vote> Array of votes
	 */
	public function votes()
	{
		return $this->hasMany('Vote');
	}

	/**
	 * Return the full name of the user
	 * @return [String] Full name
	 */
	public function name(){
		return $this->first_name." ".$this->last_name;
	}
}
