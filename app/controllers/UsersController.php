<?php

class UsersController extends \BaseController {

	/**
	 * User register
	 * GET /users
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

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$validate = User::validate(Input::all());

		if ( $validate->passes() ) {
			User::create(array(
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password'))
			));
			return Redirect::to('/')->with('message','Thanks for registering');
		} else {
			return Redirect::to('register')->withErrors($validate)->withInput();
		}

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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

}