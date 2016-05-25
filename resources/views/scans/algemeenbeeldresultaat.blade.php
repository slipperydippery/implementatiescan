@extends('layouts.scan')

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
	<button class="button" @click="allAnswered">@{{ unanswered }} vragen zijn nog onbeantwoord</button>
	<div class="large-12 columns algemeenbeeldslider--group" v-show="showMe">


		<scan-slider></scan-slider>


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
