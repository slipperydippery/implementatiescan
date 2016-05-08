@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>RESULTAAT BEOORDELING ALGEMEEN BEELD AANPAK EN SAMENWERKING</h1>
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
			<div class="large-2 small-2 small-2 columns">Gemiddeld</div>
			<div class="large-10 small-10 small-10 columns">
				<!-- Slider -->
				<div class="small-12 columns">
					<div class="slider" data-slider data-initial-start="50">
						<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
						<span class="slider-fill" data-slider-fill></span>
					</div>
				</div>
			</div>
		</div>

		@foreach($scan->instanties as $instantie)
			<div class="row sliders-sub slider-{{$instantie->instantiemodel->id}}">
				<div class="large-2 small-2 columns">{{ $instantie->title }}</div>
				<div class="large-10 small-10 columns">
					@foreach($instantie->users as $participant)
						<!-- Slider -->
						<div class="small-12 columns">
						  <div class="slider" data-slider data-initial-start="{{ $participant->answers->intersect($scan->answers)->last()->value }}">
						    <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
						    <span class="slider-fill" data-slider-fill></span>
						  </div>
						</div>
					@endforeach
				</div>
			</div>
		@endforeach

		<div class="row sliders-sub slider-gemsd">
			<div class="large-2 small-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="sociale dienst en werkbedrijf/intermediair.">Sociale Diensten/Werkbedrijf</span>
				</div>
			<div class="large-10 small-10 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
				<input type="range" class="algemeenbeeldslider" value="40">
			</div>
		</div>
		<div class="row sliders-sub slider-gemsmw">
			<div class="large-2 small-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="leerplicht / SMW.">Leerplicht/SMW </span></div>
			<div class="large-10 small-10 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
		</div>
		<div class="row sliders-sub slider-werk">
			<div class="large-2 small-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="weerkgevers (vertegenwoordigers).">Werkgevers (vertegenwoordigers)</span></div>
			<div class="large-10 small-10 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
		</div>
		<div class="row sliders-sub slider-zorg">
			<div class="large-2 small-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="bijv MEE, Jeugdzorg.">Zorg</span></div>
			<div class="large-10 small-10 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
		</div>
		<div class="row sliders-sub slider-overig">
			<div class="large-2 small-2 columns">
			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="bijv UWV, Projectorganisaties.">Overig</span></div>
			<div class="large-10 small-10 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
				<input type="range" class="algemeenbeeldslider" value="55">
			</div>
		</div>
	
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	

		<a href="{{ URL::route('scans.director', [$scan, 1, 0]) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
