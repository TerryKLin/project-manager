@extends('layout')

@section('title')
	Projects
@stop

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<h1>My Projects <a href="{{ route('project.create') }}" class="btn btn-success">New Project</a></h1>
			@if (empty($projects))
				<p>You have not proposed any projects.</p>	
			@else
			<ul>
				@foreach ($projects as $project)
					<li><a href="{{ route('project.show', $project->id) }}">{{{ $project->name }}}</a></li>
				@endforeach
			</ul>
			@endif
		</div>
	</div>
@stop