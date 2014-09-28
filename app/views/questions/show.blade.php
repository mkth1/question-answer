@extends('layouts.master')

@section('title')
@parent
:: Questions
@stop

@section('content')
	<h1>{{ ucfirst($question->user->username) }} asked:</h1>
	<p> {{$question->question}} </p>

	<div id="answers">
		<h2>Answers</h2>
		@if ( !$question->answers)
			<p> This question has not been answered yet.</p>
		@else
			<ul>
				@foreach( $question->answers as $answer )
					<li> {{ e($answer->answer) }} - by {{ ucfirst($answer->user->username) }} </li>
				@endforeach
			</ul>
		@endif
	</div>

	<id id="post-answer">
		<h2>Answer this Question</h2>

		@if( !Auth::check() )
			<p>Please login to post an answer for this question</p>
		@else
			@if($errors->has())
				<ul id="form-errors">
					{{ $errors->first('answer','<li>:message</li>') }}
				</ul>
			@endif
			{{ Form::open( array('url'=>'answer') ) }}
			{{ Form::token() }}
			{{ Form::hidden('question_id',$question->id) }}
			<p>
				{{ Form::label('answer','Answer') }}
				{{ Form::text('answer',Input::old('answer') )}}

				{{ Form::submit('Post Answer') }}
			</p>
			{{ Form::close() }}
		@endif
	</id>
@stop
