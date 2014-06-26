<?php

class UserController extends BaseController {

	public function __construct() {
    	$this->beforeFilter('csrf', array('on'=>'post'));
	}
	
	/*
	 * Show the login page
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.index');
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function register()
	{
		return View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		
		if ($validator->fails()){
			return Redirect::route('register')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));

			$user->save();

			// redirect
			Session::flash('message', 'Successfully created user!');
			return Redirect::route('user.index');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('user.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = User::find($id);
		$user->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the user!');
		return Redirect::to('/');
	}

	public function login()
	{
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('home')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}
		else {
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			if (Auth::attempt($userdata)){
				return Redirect::route('projects')->with('message','Login Succeeded');
			}
			else {
				return Redirect::route('home')->with('error', 'Login Failed');
			}
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}
}
