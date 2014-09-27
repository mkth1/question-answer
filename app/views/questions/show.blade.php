@extends('layouts.master')

@section('title')
@parent
:: Questions
@stop

@section('content')
	<h1>{{ ucfirst($question->user->username) }} asked:</h1>
	<p> {{$question->question}} </p>
@stop
