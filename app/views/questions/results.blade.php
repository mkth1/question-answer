@extends('layouts.master')

@section('title')
@parent
:: Questions
@stop

@section('content')
	<legend class="text-center">Search Results:</legend>

	@if ( !count($questions) )
		<p>Nothing found,please try a different search.</p>
	@else
		<ul>
			@foreach( $questions as $question )
				<li>
					{{ HTML::linkRoute('questions.show',$question->question,$question->id);}}
					by {{ ucfirst($question->user->username)}}
				</li>

			@endforeach
		</ul>
		{{ $questions->links() }}
	@endif
@stop
