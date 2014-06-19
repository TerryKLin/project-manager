@extends('layout')

@section('content')
	<dl>
		@foreach ($projects as $project)
			<dt>{{ $project->name }} by <small>{{ $project->user->first_name }}</small></dt>
			<dd>{{ $project->description }}</dd>
		@endforeach
	</dl>
@stop