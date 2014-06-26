@extends('layout')

@section('content')
	{{ HTML::style('css/login-form.css') }}
	<div class="login-form col-xs-12 col-md-4 col-md-offset-4 text-center">
		<br><br>
		{{ Form::open(array( 'route' => 'login', 'role' => 'form' )) }}
			<div class="form-group">
				<input type="email" class="form-control input-large text-center" placeholder="Email">
			</div>
			<div class="form-group">
				<input type="password" class="form-control input-large text-center" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary btn-large btn-block">Login</button>
			
		{{ Form::close() }}	
	</div>
@stop