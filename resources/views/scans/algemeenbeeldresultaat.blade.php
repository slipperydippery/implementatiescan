@extends('layouts.scan')

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>RESULTAAT ALGEMEEN BEELD </h1>
			<h2>BEOORDELING AANPAK EN SAMENWERKING</h2>
			<fieldset class="fieldset large-8">
	  			<legend>Doel</legend>
				<p class=subheading>
					In algemene zin: hoe goed is onze huidige gezamenlijk aanpak om jongeren met LVB aan het werk te helpen?
				</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">

@if(count(Auth::user()->beheert->intersect([$scan])))
		<scan-slider></scan-slider>
@else
	<span class="unanswered">Op het centrale scherm kunt u de gemeenschappelijke resultaten bekijken </span>
@endif
		
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	

		<a href="{{ URL::route('scans.director', [$scan, 1, 0]) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
