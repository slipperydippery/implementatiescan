@extends('layouts.master')

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Databank</h1>
			<fieldset class="fieldset large-8">
			<legend>Een weelde aan informatie</legend>
	  			<p class="subheading subheading__time">
	  				Hieronder vindt u informatie over de succesfactoren voor het begeleiden van jongeren met LVB naar werk. 
	Kijk gerust rond tussen de praktijkvoorbeelden, tools/interventies en hyperlinks die inspirerend kunnen zijn om mee te nemen voor het verbeteren van de situatie in uw omgeving.
	  			</p>
			</fieldset>
		</div>
	</div>
</div>


<div class="row page-content">
	<div class="large-12 columns">
		<ul class="tabs" data-tabs id="example-tabs">
		  	<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Instrumenten</a></li>
		  	<li class="tabs-title"><a href="#panel2">Landelijke- regio programma's</a></li>
		  	<li class="tabs-title"><a href="#panel3">Praktijkvoorbeelden</a></li>
		</ul>
		<div class="tabs-content" data-tabs-content="example-tabs">
		  	<div class="tabs-panel is-active" id="panel1">
				<instrumenten></instrumenten>
		  	</div>
		  	<div class="tabs-panel" id="panel2">
		    	<programmas></programmas>
		  	</div>
		  	<div class="tabs-panel" id="panel3">
		    	<praktijkvoorbeelds></praktijkvoorbeelds>
		  	</div>
		</div>
	</div>
	


	@if(Auth::check())
		@if(Auth::user()->hasRole('admin'))
			<a href=" {{ route('instruments.create') }} " class="button float-right">Voeg een instrument of programma toe</a>
		@endif
	@endif


</div>



	
@stop


