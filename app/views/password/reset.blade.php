@extends('layout')

@section('content')    
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <br><br>
            {{ Form::open(array('url' => 'password/reset', 'role' => 'form')) }}
                {{ Form::hidden('token',$token) }}
                <div class="form-group">
                    {{ Form::text('email', null, array('class'=>'form-control text-center', 'placeholder'=>'Email Address')) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', array('class'=>'form-control text-center', 'placeholder'=>'Password')) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password_confirmation', array('class'=>'form-control text-center', 'placeholder'=>'Confirm Password')) }}
                </div>
        
                <button type="submit" class="btn btn-primary btn-block">Reset</button>
                
        
            {{ Form::close() }}    
        </div>
    </div>
@stop