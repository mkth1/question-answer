<?php

class UsersController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function register()
	{
		return View::make('users.register')
				->with('title','Q&A - Register');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$validate = User::validate(Input::all());

		if ( $validate->passes() ) {
			User::create(array(
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password'))
			));

			$user = User::whereUsername(Input::get('username'))->first();
			Auth::login($user);
			return Redirect::to('/')->with('message','Thanks for registering You are now logged in');
		} else {
			return Redirect::to('register')->withErrors($validate)->withInput();
		}
	}

	/**
	 * For user loging
	 */
	public function login() {
		return View::make('users.login')->with('title','Q&A - Login');
	}

	public function postLogin()
	{
		$user = array(
			'username'=>Input::get('username'),
			'password'=>Input::get('password')
		);

		if ( Auth::attempt($user) ) {
			return Redirect::to('/')->with('message','You are logged in');
		} else {
			return Redirect::to('login')->with('message','Incorrect user combination')
					->withInput();
		}
	}

	public function logout()
	{
		if (Auth::check()) {
			Auth::logout();
			return Redirect::to('login')->with('message','You are now logged out');
		} else {
			return Redirect::to('/');
		}
	}

	public function contact()
	{
		return View::make('users.contact')->with('title','Q&A - Contact');
	}

}