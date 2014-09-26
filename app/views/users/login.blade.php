@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

@section('content')
	<h1>Login</h1>
	{{ Form::open( array('url'=>'login') ) }}
	{{ Form::token() }}
		<p>
			{{ Form::label('username','Username') }} <br \>
			{{ Form::text('username',Input::old('username')) }}
		</p>

		<p>
			{{ Form::label('password','Password') }} <br \>
			{{ Form::password('password') }}
		</p>

		<p> {{ Form::submit('Login') }} </p>
	{{ Form::close() }}
@stop