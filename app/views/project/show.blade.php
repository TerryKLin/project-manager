@extends('layout')

@section('title')
    Project
@stop

@section('content')
    <div class="row">
    	<div class="col-xs-12">
    		<h1>{{{ $project->name }}} <a href="{{ route('project.edit', $project->id) }}" class="btn btn-info">Edit Project</a></h1>
    		<hr>
    		<div class="description">{{{ $project->description }}}</div>

    		{{ HTML::script('js/showdown.js') }}
			<script>
				var converter = new Showdown.converter();
				$('.description').html(converter.makeHtml($('.description').text()));
			</script>
    	</div>
    </div>
@stop