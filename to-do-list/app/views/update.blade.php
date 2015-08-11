@extends('layouts.main')



@section('content')

 	<h1>Update New Task</h1>
 	
 		@foreach ($errors->all() as $error)
 		<p class="error">{{ $error }}</p>
 		@endforeach

 	{{ Form::open(array('url' => 'up', 'method' => 'post')) }}
 		<input type="text" name="name" value="{{ $up->name }}" placeholder="The name of your task">
 		<input type="hidden" name="id" value="{{ $up->id }}" />
 		<input type="submit" value="Save" >
 	{{ Form::close() }}

 @stop 
 
