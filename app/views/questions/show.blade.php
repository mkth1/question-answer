@extends('layouts.master')

@section('title')
@parent
:: Questions
@stop

@section('content')
	<legend class="text-center">{{ ucfirst($question->user->username) }} asked:</legend>
	<p> {{$question->question}} </p>
			@if ( !$question->answers)
			<p> This question has not been answered yet.</p>
		@else
			<ul>
				@foreach( $question->answers as $answer )
					<li> {{ e($answer->answer) }} - by {{ ucfirst($answer->user->username) }} </li>
				@endforeach
			</ul>
		@endif

	<div id="answers">
		<legend class="text-center">Answers</legend>
	</div>

	<id id="post-answer">
		@if( !Auth::check() )
			<p>Please login to post an answer for this question</p>
		@else
			@if($errors->has())
				<ul id="form-errors">
					{{ $errors->first('answer','<li>:message</li>') }}
				</ul>
			@endif
			{{ Form::open( array('url'=>'answer','class' =>'form-horizontal') ) }}
			{{ Form::token() }}
			{{ Form::hidden('question_id',$question->id) }}

		<div class="form-group">
			{{ Form::label('answer','Answer',['class'=>'col-md-2 control-label']) }}
			<div class="col-md-8">
				{{ Form::text('answer',Input::old('answer'),['class'=>'form-control'] ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
			</div>
		</div>
			{{ Form::close() }}
		@endif
	</id>
@stop
