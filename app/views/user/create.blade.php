@extends('layout')

@section('title')
    Registration
@stop

@section('content')    
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        <br><br>
        {{ Form::open(array('route' => 'user.store', 'role' => 'form')) }}
            <div class="form-group">
                {{ Form::text('email', null, array('class'=>'form-control text-center', 'placeholder'=>'Email Address')) }}
            </div>
            <div class="form-group">
                {{ Form::password('password', array('class'=>'form-control text-center', 'placeholder'=>'Password')) }}
            </div>
            <div class="form-group">
                {{ Form::password('password_confirmation', array('class'=>'form-control text-center', 'placeholder'=>'Confirm Password')) }}
            </div>

            <div class="form-group">
                {{ Form::text('first_name', null, array('class'=>'form-control text-center', 'placeholder'=>'First Name')) }}
            </div>
            <div class="form-group">
                {{ Form::text('last_name', null, array('class'=>'form-control text-center', 'placeholder'=>'Last Name')) }}
            </div>
         
            <a href="{{ route('home') }}" class="btn btn-primary col-xs-5">Back</a>
            <div class="col-xs-2"></div>
            <button type="submit" class="btn btn-success col-xs-5">Register</button>
            

        {{ Form::close() }}    
    </div>
@stop