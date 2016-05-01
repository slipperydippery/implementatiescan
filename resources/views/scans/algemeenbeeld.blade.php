@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>ALGEMEEN BEELD HUIDIGE AANPAK EN SAMENWERKING</h1>
		<fieldset class="fieldset">
  			<legend>Algemeen beeld van de huidige aanpak en samenwerking beoordelen </legend>
			<p class=subheading>
				Hieronder ziet u een schuif van 0 tot 100. Kunt u in algemene zin aangeven op uw eigen scherm hoe goed onze regio het volgens u doet voor wat betreft de huidige aanpak en samenwerking om kwetsbare jongeren, zoals jongeren met LVB, tijdens en na hun schooloopbaanl goed te begeleiden naar werk?  Nul is ‘we doen dat als regio slecht’ en honderd is ‘we doen dat als regio perfect’.
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--participant">

		{!! Form::open(['route' => ['scans.store_algemeenbeeld', $scan]]) !!}
			<!-- bal Form Input -->
			<div class="form-group">
				{!! Form::label('bla', 'bal:') !!}
				{!! Form::text('bla', null, ['class' => 'form-control']) !!}
			</div>

			<!-- Add Submit Field -->
			<div class="form-group">
			    {!! Form::submit('Verstuur Antwoord', ['class' => 'btn form-control']) !!}
			</div>
		{!! Form::close() !!}


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

		<a class="button" href="{{ URL::to('algemeenbeeldresultaat', $scan) }}">Verstuur antwoord</a><br>
				
	</div>
</div>


@stop
