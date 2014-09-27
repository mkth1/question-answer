<?php

class AnswersController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth',array(
			'only'=> array('store' )
		));
	}
	/**
	 * Store a newly created resource in storage.
	 * POST /answers
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Answer::validate( Input::all() );
		//dd( Input::all() );
		$question_id = Input::get('question_id');

		if ( $validation->passes() ) {
			Answer::create( array(
				'answer'=>Input::get('answer'),
				'user_id'=>Auth::user()->id,
				'question_id'=>$question_id
			));

			return Redirect::to('questions/'.$question_id)
				->with('message','Your answer has been posted');
		} else {
			return Redirect::to('questions/'.$question_id)->withErrors($validation)->withInput();
		}
	}

}