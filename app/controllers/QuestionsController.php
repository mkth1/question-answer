<?php

class QuestionsController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth',array(
			'only'=> array('store' , 'edit', 'update' ,'yourQuestions')
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
			->with('title','View Question')
			->with('question',$question);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /questions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = null)
	{
		if ( !$this->_question_belongs_to_user($id) ) {
			return Redirect::to('your-questions')
				->with('message','Invalid Question');
		}
		return View::make('questions.edit')
			->with('title','Make It Snappy Q&A - Edit')
			->with('question',Question::find($id) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		if ( !$this->_question_belongs_to_user($id) ) {
			return Redirect::to('your-questions')
				->with('message','Invalid Question');
		}

		$validation = Question::validate(Input::all());
		if ( $validation->passes() ) {
			$question = Question::find($id);
			$question->question = Input::get('question');
			$question->solved = (Input::get('solved')? 1:0 );
			$question->save();

			return Redirect::to('questions/'.$id)
				->with('message','Your question has been update');
		} else {
			return Redirect::to('questions/'.$id.'/edit')
				->withErrors( $validation );

		}

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

	public function yourQuestions() {
		return View::make('questions.your-questions')
			->with('title','Q&A - Your Question')
			->with('username',Auth::user()->username)
			->with('questions',Question::your_questions() );
	}

	private function _question_belongs_to_user($id) {
		$question = Question::find($id);

		if ( $question->user_id == Auth::user()->id ) {
			return true;
		} else {
			return false;
		}
	}

}