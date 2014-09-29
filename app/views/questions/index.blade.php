@extends('layouts.master')

@section('title')
@parent
:: Questions
@stop

@section('content')
<div>
	<legend class="text-center">Ask a Question</legend>
	@if (Auth::check())
		@if( $errors->has() )
			<ul class="alert alert-danger">
				{{ $errors->first('question','<li>:message</li>')}}
			</ul>
		@endif
		{{ Form::open( array('url'=>'questions','class' =>'form-horizontal') ) }}
		{{ Form::token() }}

		<div class="form-group">
			{{ Form::label('question','Question',['class'=>'col-md-2 control-label']) }}
			<div class="col-md-8">
				{{ Form::text('question',Input::old('question'),['class'=>'form-control'] ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
			</div>
		</div>
		{{ Form::close() }}
	@else
		<p>Please login to ask or answer questions.</p>
	@endif
</div>
<hr>
<div id="questions" >
	<legend class="text-center">Unsolved Questions</legend>
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