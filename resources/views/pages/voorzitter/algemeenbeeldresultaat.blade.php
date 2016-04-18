@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Resultaat</h1>
		<fieldset class="fieldset">
  			<legend>Doel</legend>
			<p class=subheading>
				In algemene zin: hoe goed is onze huidige aanpak en samenwerking om jongeren met LVB aan het werk te helpen? 
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns algemeenbeeldslider--group">
		<div class="row sliders-sub slider-gemiddeld">
			<div class="large-3 columns">Gemiddelde beoordeling</div>
			<div class="large-9 columns">
				
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
		</div>
		<div class="row sliders-sub slider-onderwijs">
			<div class="large-3 columns">Onderwijs</div>
			<div class="large-9 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
		</div>
		<div class="row sliders-sub slider-gemsd">
			<div class="large-3 columns">Gemeenten: <span>sociale dienst en werkbedrijf/intermediair</span></div>
			<div class="large-9 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
				<input type="range" class="algemeenbeeldslider" value="40">
			</div>
		</div>
		<div class="row sliders-sub slider-gemsmw">
			<div class="large-3 columns">Gemeenten: <span>leerplicht / SMW</span></div>
			<div class="large-9 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
		</div>
		<div class="row sliders-sub slider-werk">
			<div class="large-3 columns">Werk: <span>werkgevers (vertegenwoordigers)</span></div>
			<div class="large-9 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
		</div>
		<div class="row sliders-sub slider-zorg">
			<div class="large-3 columns">Zorg: <span>bijv MEE, Jeugdzorg</span></div>
			<div class="large-9 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
		</div>
		<div class="row sliders-sub slider-overig">
			<div class="large-3 columns">Overig: <span>bijv UWV, Projectorganisaties</span></div>
			<div class="large-9 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
				<input type="range" class="algemeenbeeldslider" value="55">
			</div>
		</div>
		
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('thema1') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
