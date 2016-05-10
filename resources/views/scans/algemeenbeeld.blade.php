@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>ALGEMEEN BEELD </h1>
		<h2>HUIDIGE AANPAK EN SAMENWERKING</h2>
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


			  <div class="slider input_slider" data-slider data-initial-start="0">
			    <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
			    <span class="slider-fill" data-slider-fill></span>
			  </div>
				<span class="slider__label__left">
					0
				</span>
				<span class="slider__label__right">
					100
				</span>


			<div class="small-2 columns">
			  <input type="hidden" name="value" id="sliderOutput2">
			</div>

			<br><br>
			<br><br>
			<br><br>

			<!-- Add Submit Field -->
			<div class="form-group">
			    {!! Form::submit('Verstuur antwoord', ['class' => 'button float-right']) !!}
			</div>
		{!! Form::close() !!}

		
	</div>
	

</div>


@stop
