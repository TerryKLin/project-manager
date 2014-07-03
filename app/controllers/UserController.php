<?php

class UserController extends BaseController {

	/**
     * Instantiate a new UserController instance.
     */
	public function __construct() {
    	$this->beforeFilter('auth', array('only' => array('edit','update','destroy')));
        $this->beforeFilter('csrf', array('on' => 'post'));
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
		$validator = Validator::make(Input::all(), User::$registration_rules);
		
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

			//Login the new user
			Auth::login($user);

			// redirect
			return Redirect::route('projects')->with('message','Welcome to the Project Manager!');
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
		$validator = Validator::make(Input::all(), User::$login_rules);

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
				return Redirect::route('projects')->with('message','Welcome Back!');
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
		return Redirect::route('home')->with('message','Good Bye!');
	}
}
