@extends('layout')

@section('content')    
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        <br><br>
        {{ Form::open(array('url' => 'password/remind', 'role' => 'form')) }}
            <div class="form-group">
                {{ Form::text('email', null, array('class'=>'form-control text-center', 'placeholder'=>'Email Address')) }}
            </div>
         
            <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>
            

        {{ Form::close() }}    
    </div>
@stop