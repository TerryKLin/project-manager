@extends('layout')

@section('title')
	Edit Project
@stop

@section('content')
    <div class="row">
    	<div class="col-xs-12">
			<h1>Project</h1>
			
		    {{ Form::open(array('route' => array('project.update',$project->id),'method'=>'PUT')) }}
		    	@include('project._form', compact('project'))

				<div class="form-group">
					{{ Form::submit("Save", array('class'=>'col-md-3 btn btn-lg btn-primary')) }}
				</div>
		    {{ Form::close() }}
	    </div>
	</div>
@stop