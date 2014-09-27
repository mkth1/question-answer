@extends('layouts.master')

@section('title')
@parent
:: Register
@stop

@section('content')
	@if( $errors->has() )
		<p>the errors are here</p>

		<ul class="alert alert-danger">
			{{ $errors->first('username','<li>:message</li>')}}
			{{ $errors->first('password','<li>:message</li>')}}
			{{ $errors->first('password_confirmation','<li>:message</li>')}}
		</ul>
	@endif

	{{ Form::open( array('url'=>'register')) }}
	{{ Form::token() }}
		<p>
			{{ Form::label('username','Username') }} <br />
			{{ Form::text('username',Input::old('username') ) }}
		</p>

		<p>
			{{ Form::label('password','Password') }} <br />
			{{ Form::password('password') }}
		</p>

		<p>
			{{ Form::label('password_confirmation','Confirm Password') }} <br />
			{{ Form::password('password_confirmation') }}
		</p>

		<p> {{ Form::submit('Register',['class' => 'btn btn-primary']) }}</p>
	{{ Form::close() }}
@stop