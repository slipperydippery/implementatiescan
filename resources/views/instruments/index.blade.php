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
	
	<div class="large-12 columns table">
	
		<databank></databank>

	</div>

	@if(Auth::check())
		@if(Auth::user()->hasRole('admin'))
			<a href=" {{ route('instruments.create') }} " class="button float-right">Voeg een instrument of programma toe</a>
		@endif
	@endif
</div>

@stop


