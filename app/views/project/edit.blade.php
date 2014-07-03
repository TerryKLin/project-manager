@extends('layout')

@section('content')
    <div class="row">
		<h1>Project</h1>
		
	    {{ Form::open(array('route' => 'project.update')) }}
	    	@include('project._form', compact('project'))

  			{{ Form::submit("Save", array('class'=>'btn btn-primary')) }}
	    {{ Form::close() }}
	</div>
@stop