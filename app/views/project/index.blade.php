@extends('layout')

@section('content')
	<dl>
		@foreach ($projects as $project)
			<dt>{{ $project->name }}</dt>
			<dd>{{ $project->description }} <small>{{ $project->createdBy() }}</small></dd>
		@endforeach
	</dl>
@stop