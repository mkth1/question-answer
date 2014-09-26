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
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
	}


	public function create()
	{
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
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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

}