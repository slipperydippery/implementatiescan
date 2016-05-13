@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>RESULTAAT ALGEMEEN BEELD </h1>
		<h2>BEOORDELING AANPAK EN SAMENWERKING</h2>
		<fieldset class="fieldset">
  			<legend>Doel</legend>
			<p class=subheading>
				In algemene zin: hoe goed is onze huidige gezamenlijk aanpak om jongeren met LVB aan het werk te helpen?
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
			@if(count($instantie->users) > 0)
				<div class="row sliders-sub slider-{{$instantie->instantiemodel->id}}">
					<div class="large-2 small-2 columns">{{ $instantie->title }}</div>
					<div class="large-10 small-10 columns">
						@foreach($instantie->users as $participant)
							<!-- Slider -->
							<div class="small-12 columns">
							  <div class="slider" data-slider data-initial-start="{{ (count($participant->answers->intersect($scan->answers)) > 0) ? $participant->answers->intersect($scan->answers)->last()->value : '50' }}">
							    <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
							    <span class="slider-fill" data-slider-fill></span>
							  </div>
							</div>
						@endforeach
					</div>
				</div>
			@endif
		@endforeach

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
