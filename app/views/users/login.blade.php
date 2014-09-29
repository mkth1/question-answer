@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

@section('content')
<legend class="text-center">Login</legend>

	{{ Form::open( array('url'=>'login','class' =>'form-horizontal') ) }}
	{{ Form::token() }}

	<div class="form-group">
		{{ Form::label('username','Username',['class'=>'col-md-2 control-label']) }}
		<div class="col-md-8">
			{{ Form::text('username',Input::old('username'),['class'=>'form-control'] ) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('password','Password',['class'=>'col-md-2 control-label']) }}
		<div class="col-md-8">
			{{ Form::password('password',['class'=>'form-control'] ) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Login',['class' => 'btn btn-primary']) }}
		</div>
	</div>
	{{ Form::close() }}
@stop