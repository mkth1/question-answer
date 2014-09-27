@extends('layouts.master')

@section('content')
	<h1> {{ ucfirst($username) }} </h1>

	@if ( !count($questions) )
		<p>You have not posted any question yet.</p>
	@else
		<ul>
			@foreach( $questions as $question )
				<li>
					{{ Str::limit(e($question->question,40)) }} -
					{{ ($question->solved)?("Solved -"):("")}}
					{{ HTML::linkRoute('questions.edit','Edit',$question->id) }} -
					{{ HTML::linkRoute('questions.show','View',$question->id) }}
				</li>
			@endforeach
		</ul>
		{{ $questions->links() }}
	@endif
@stop