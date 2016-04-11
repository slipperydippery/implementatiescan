@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema 1: resultaat</h1>
		<h2>Focus op werk en talent</h2>
		<fieldset class="fieldset">
  			<legend></legend>
  				<div id="time">15:00</div>
  			<p class="subheading subheading__time">
  				Hieronder kunt u zien wat iedereen zojuist heeft ingevuld. Wat valt u op? Bespreek de resultaten de komende 15 minuten, en selecteer dan de in uw ogen belangrijkste 2 verbeterpunten.
				
  			</p>


		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns algemeenbeeldslider--group">
		<div class="row sliders-sub slider-gemiddeld">
			<div class="large-2 columns slider-empty">.
			 </div>
			<div class="large-2 columns center slider-columnhead">
				Werkend leren <br>	
			</div>
			<div class="large-2 columns center slider-columnhead">
				Samenwerking werkgevers <br>	
			</div>
			<div class="large-2 columns center slider-columnhead">
				Samenwerking andere organisaties <br>	
			</div>
			<div class="large-2 columns center slider-columnhead">
				Ontzorgen werkgevers <br>	
			</div>
			<div class="large-2 columns center slider-columnhead">
				Beschikbaarheid werkgevers <br>	
			</div>
		</div>
		<div class="row sliders-sub ">
			<div class="large-2 columns">Gemiddelde beoordeling</div>
			<div class="large-2 columns center">
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
		</div>
		<div class="row sliders-sub slider-onderwijs">
			<div class="large-2 columns">Onderwijs</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
		</div>
		<div class="row sliders-sub slider-gemsd">
			<div class="large-2 columns">Gemeenten: <span>sociale dienst en werkbedrijf/intermediair</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
				<input type="range" class="algemeenbeeldslider" value="40">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
				<input type="range" class="algemeenbeeldslider" value="40">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
				<input type="range" class="algemeenbeeldslider" value="40">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
				<input type="range" class="algemeenbeeldslider" value="40">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
				<input type="range" class="algemeenbeeldslider" value="40">
			</div>
		</div>
		<div class="row sliders-sub slider-gemsmw">
			<div class="large-2 columns">Gemeenten: <span>leerplicht / SMW</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
		</div>
		<div class="row sliders-sub slider-werk">
			<div class="large-2 columns">Werk: <span>weerkgevers (vertegenwoordigers)</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
				<input type="range" class="algemeenbeeldslider" value="75">
			</div>
		</div>
		<div class="row sliders-sub slider-zorg">
			<div class="large-2 columns">Zorg: <span>bijv MEE, Jeugdzorg</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
				<input type="range" class="algemeenbeeldslider" value="60">
			</div>
		</div>
		<div class="row sliders-sub slider-overig">
			<div class="large-2 columns">Overig: <span>bijv UWV, Projectorganisaties</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
				<input type="range" class="algemeenbeeldslider" value="55">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
				<input type="range" class="algemeenbeeldslider" value="55">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
				<input type="range" class="algemeenbeeldslider" value="55">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
				<input type="range" class="algemeenbeeldslider" value="55">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
				<input type="range" class="algemeenbeeldslider" value="55">
			</div>
		</div>

		<div class="row sliders-sub slider-verbeterpunten">
			<div class="large-2 columns">Verbeterpunt:</div>
			<div class="large-2 columns">
				<input type="checkbox" class="verbetercheck">
			</div>
			<div class="large-2 columns">
				<input type="checkbox" class="verbetercheck">
			</div>
			<div class="large-2 columns">
				<input type="checkbox" class="verbetercheck">
			</div>
			<div class="large-2 columns">
				<input type="checkbox" class="verbetercheck">
			</div>
			<div class="large-2 columns">
				<input type="checkbox" class="verbetercheck">
			</div>
		</div>		
	</div>

</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('actieoverzicht') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop

@section('additional-scripts')
<script>
	function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fifteenMinutes = 60 * 15,
        display = document.querySelector('#time');
    startTimer(fifteenMinutes, display);
};
</script>

@stop