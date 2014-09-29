@extends('layouts.master')

@section('content')
	<legend class="text-center">{{ ucfirst($username) }} asked:</legend>
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