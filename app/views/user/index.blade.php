@extends('layout')

@section('content')
	<div class="login-form col-xs-12 col-md-4 col-md-offset-4">
		<br><br>
		{{ Form::open(array( 'route' => 'login', 'role' => 'form' )) }}
			<div class="form-group">
				{{ Form::email('email', null, array('class'=>"form-control text-center", 'placeholder'=>"Email")) }}
			</div>
			<div class="form-group">
				{{ Form::password('password', array('class' => "form-control text-center", 'placeholder' => "Password")) }}
			</div>
			<div class="checkbox">
				<label>
					{{ Form::checkbox('remember_me') }} Remember Me
				</label>
			</div>
			<button type="submit" class="btn btn-primary col-xs-5">Login</button>
			<div class="col-xs-2"></div>
			<a href="{{ route('register') }}" class="btn btn-success col-xs-5">Register</a>
			
		{{ Form::close() }}	
	</div>
@stop