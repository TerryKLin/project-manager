<?php

class Vote extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Mass Assignment
	protected $fillable = ['project_id','user_id'];

	/**
	 * User who voted
	 * @return User user who voted
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
}