@extends('layout')

@section('title')
	New Project
@stop

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<h1>Project</h1>
			{{ Form::open(array('route' => 'project.store')) }}
		    	@include('project._form', compact('project'))

	  			<div class="form-group">
	  				{{ Form::submit("Submit", array('class'=>'col-md-3 btn btn-lg btn-primary')) }}
	  			</div>
		    {{ Form::close() }}	
		</div>
	</div>
@stop