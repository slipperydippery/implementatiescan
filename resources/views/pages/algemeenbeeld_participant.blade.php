@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Uw Algemeen beeld</h1>
		<fieldset class="fieldset">
  			<legend>Doel</legend>
			<p class=subheading>
				Geef aan met de slider in algemene zin: hoe goed is onze huidige aanpak en samenwerking om jongeren met LVB aan het werk te helpen?
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns algemeenbeeldslider--participant">
		<input type="range" class="algemeenbeeldslider" value="50">
		<span class="slider__label__left">
			erg slecht
		</span>
		<span class="slider__label__right">
			erg goed
		</span>
	</div>

</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	
		<a href="{{ URL::to('wacht_pre_algemeen') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
