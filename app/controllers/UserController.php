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
		if (Auth::check())
			return Redirect::route('projects');
		else return View::make('user.index');
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
			'password' => 'required|confirmed|min:4',
			'password_confirmation' => 'required|min:4',
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
			return Redirect::route('user.index')->with('message', 'Successfully created user!');
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
		return Redirect::route('home')->with('message', 'Successfully deleted the user!');
	}

	/**
	 * Login a user with credentials
	 * @return [Redirect] redirects based on credentials
	 */
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

			$remember_me = Input::get('remember_me');

			if (Auth::attempt($userdata, $remember_me)){
				return Redirect::route('projects')->with('message','Login Succeeded');
			}
			else {
				$errors = array('login' => 'Email or Password are incorrect!');
				return Redirect::route('home')->withErrors($errors);
			}
		}
	}

	/**
	 * Logout the current user
	 * @return [Redirect] Redirects user to home page
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::route('home')->with('message','Logged Out!');
	}
}
