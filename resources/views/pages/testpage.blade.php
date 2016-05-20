@extends('layouts.master')

@section('content')
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Databank</h1>
			<fieldset class="fieldset">
				<legend>Een weelde aan informatie</legend>
				<p class=subheading>
				</p>
			</fieldset>
		</div>
	</div>

	<div class="row page-content">
		<div class="large-12 columns">
			<h1>Get Request</h1>
			<button type="button" class="button" id="getRequest">getRequest</button>
		</div>
	</div>
	<div id="getRequestData">
		
	</div>
@stop

@section('additional-scripts')
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('#getRequest').click(function()
			{
				$.get('getRequest', function(data)
				{
					$('#getRequestData').append(data);
					console.log(data);
				});
			});
		});
	  
	</script>
@stop

