@extends('layouts.master')

@section('title')
@parent
:: Register
@stop

@section('content')
	@if( $errors->has() )
		<div class="alert alert-danger">
			{{ $errors->first('username','<li>:message</li>')}}
			{{ $errors->first('password','<li>:message</li>')}}
			{{ $errors->first('password_confirmation','<li>:message</li>')}}
		</div>
	@endif

	{{ Form::open( array('url'=>'register', 'class' =>'form-horizontal')) }}
	<legend class="text-center">Register</legend>
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
		{{ Form::label('password_confirmation','Confirm',['class'=>'col-md-2 control-label']) }}
		<div class="col-md-8">
			{{ Form::password('password_confirmation',['class'=>'form-control'] ) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Register',['class' => 'btn btn-primary']) }}
		</div>
	</div>
	{{ Form::close() }}
@stop