@extends('layouts.master')

@section('title')
@parent
:: Edit Questions
@stop

@section('content')
	<h1>Edit Your Question</h1>

	@if ( $errors->has() )
		<ul id="form-errors">
			{{ $errors->first('question','<li>:message</li>') }}
			{{ $errors->first('solved','<li>:message</li>') }}
		</ul>
	@endif

	<!--{{ Form::model($question, array('route'=> array('questions.update',$question->id) ) )}} !-->
	{{ Form::open( array('url'=>'questions/'.$question->id,'method'=>'put') ) }}
	{{ Form::token() }}
		<p>
			{{ Form::label('question','Question') }}<br />
			{{ Form::text('question',$question->question) }}
		</p>

		<p>
			{{ Form::label('solved','Solved') }}

			@if ( $question->solved == 0 )
				{{ Form::checkbox('solved', 1, false)}}
			@elseif( $question->solved == 1 )
				{{ Form::checkbox('solved', 0, true)}}
			@endif
		</p>
		{{ Form::hidden('question_id',$question->id) }}
		<p> {{ Form::submit('Update') }}</p>
	{{ Form::close() }}
@stop