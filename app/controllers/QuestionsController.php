<?php

class QuestionsController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth',array(
			'only'=> array('store' )
		));
	}
	public $restful = true;
	/**
	 * Display a listing of the resource.
	 * GET /questions
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('questions.index')
				->with('title','Make It Snappy Q&A - Home')
				->with('questions', Question::unsolved());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /questions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /questions
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Question::validate( Input::all() );

		if ( $validation->passes() ) {
			Question::create( array(
				'question'=>Input::get('question'),
				'user_id'=>Auth::user()->id
			));

			return Redirect::to('/')
				->with('message','Your question has been posted');
		} else {
			return Redirect::to('/')->withErrors($validation)->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$question = Question::find($id);

		return View::make('questions.show')
			->with('title','Make It Snappy - View Question')
			->with('question',$question);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /questions/{id}/edit
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
	 * PUT /questions/{id}
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
	 * DELETE /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}