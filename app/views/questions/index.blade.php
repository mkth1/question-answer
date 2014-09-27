@extends('layouts.master')

@section('title')
@parent
:: Questions
@stop

@section('content')
<div>
	<h1>Ask a Question</h1>
	@if (Auth::check())
		@if( $errors->has() )
			<ul class="alert alert-danger">
				{{ $errors->first('question','<li>:message</li>')}}
			</ul>
		@endif

		{{ Form::open( array('url'=>'questions') )}}
		{{ Form::token() }}
			<p>
				{{ Form::label('question','Question') }} <br />
				{{ Form::text('question',Input::old('question')) }}

				{{ Form::submit('Ask a Question', ['class' => 'btn btn-primary']) }}
			</p>
		{{ Form::close() }}
	@else
		<p>Please login to ask or answer questions.</p>
	@endif
</div>
<div id="questions">
	<h2>Unsolved Questions</h2>
	@if( !count($questions))
		<p>No question have been asked.</p>
	@else
		<ul>
			@foreach( $questions as $question )
				<li>
                    {{ HTML::linkRoute('questions.show',Str::limit($question->question,40),$question->id) }}
					 by {{ ucfirst($question->user->username) }}
					({{ count($question->answers) }} {{ Str::plural('Answer', count($question->answers))}})
				 </li>
			@endforeach
		</ul>
		{{ $questions->links()  }}
	@endif
</div>
@stop