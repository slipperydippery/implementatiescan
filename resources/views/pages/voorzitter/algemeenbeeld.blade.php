@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Beoordeel de samenwerking</h1>
		<fieldset class="fieldset">
  			<legend>Algemeen beeld van de huidige samenwerking beoordelen</legend>
			<p class=subheading>
				Hieronder ziet u een schuif van 0 tot 100. Kunt u in algemene zin aangeven op uw eigen scherm in welke mate uw organisatie goed samenwerkt met de andere netwerk partners om jongeren met LVB aan het werk te helpen? Nul is geen goede samenwerking, en honderd is perfecte samenwerking. 
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--participant">
		<input type="range" class="fullslider algemeenbeeldslider" value="50">
		<span class="slider__label__left">
			0
		</span>
		<span class="slider__label__right">
			100
		</span>

		<div class="slider" data-slider data-initial-start="50" data-end="200">
		  <span class="slider-handle"  data-slider-handle role="slider" tabindex="1"></span>
		  <span class="slider-fill" data-slider-fill></span>
		  <input type="hidden">
		</div>	
		
	</div>
	
	<div class="large-12 columns pre-resultaat">

		<a class="button" href="{{ URL::to('algemeenbeeldresultaat') }}">Verstuur antwoord</a><br>
				
	</div>
</div>


@stop
