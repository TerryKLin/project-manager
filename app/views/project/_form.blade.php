<div class="form-group">
	{{ Form::label("name","Name") }}
	{{ Form::text('name', $project->name or null,array("class"=>"form-control")) }}
</div>

<div class="form-group">
	{{ Form::label("description","Description") }}
	<ul class="nav nav-tabs" role="tablist">
		<li class="active"><a href="#write" role="tab" data-toggle="tab">Write</a></li>
		<li><a href="#preview" role="tab" data-toggle="tab">Preview</a></li>
	</ul>
	<div class="tab-content">
			<div class="tab-pane active" id="write">
				{{ Form::textarea('description', $project->description or null,array("class"=>"form-control")) }}
			</div>
			<div class="tab-pane active" id="preview"></div>
		</div>
	</div>
	
	{{ HTML::script('js/showdown.js') }}
	<script>
		var converter = new Showdown.converter();

		$('a[href=#preview]').click(function(){
			$('#preview').html(converter.makeHtml($('textarea[name="description"]').val()));
		});
	</script>
</div>