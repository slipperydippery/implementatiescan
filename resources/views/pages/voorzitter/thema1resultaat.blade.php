@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema 1: resultaat</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  				<div id="time">15:00</div>
  			<p class="subheading subheading__time">
  				Hieronder kunt u zien wat iedereen zojuist heeft ingevuld. Wat valt u op? Bespreek de resultaten de komende 15 minuten, en selecteer dan de in uw ogen belangrijkste 2 verbeterpunten.
				
  			</p>
			<p class=question>
				<b>Vraag 1: </b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec dui auctor ante vulputate efficitur ut id nisi?<br>
				<b>Vraag 2: </b> In lacinia vel arcu non accumsan. Proin pharetra semper pharetra?<br>
				<b>Vraag 3: </b>  Etiam porta laoreet tempus. Mauris aliquam accumsan nunc vel eleifend?<br>
				<b>Vraag 4: </b> Morbi vel neque et nisi condimentum lacinia. Nulla ut mauris orci. Pellentesque arcu ipsum, aliquet id purus?<br>
				<b>Vraag 5: </b> Nam ipsum nisl, iaculis sit amet consectetur sit amet, aliquam eget ante. Sed eget nibh vitae velit vulputate tristique?
			</p>

		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns algemeenbeeldslider--group">
		<div class="row sliders-sub slider-gemiddeld">
			<div class="large-2 columns">Gemiddelde beoordeling</div>
			<div class="large-2 columns center">
				1 <br>
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				2 <br>
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				3 <br>
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				4 <br>
				<input type="range" class="algemeenbeeldslider" value="62">
			</div>
			<div class="large-2 columns center">
				5 <br>
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

	<div class="large-12 columns succesfactoren">
		<div class="row">
			<div class="large-12 succeesfactoren-titel">
				Succesfactoren
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns">
				1.
			</div>
			<div class="large-11 columns">
				Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns">
				2.
			</div>
			<div class="large-11 columns">
				Samenwerking met werkgevers niet als secundaire activiteit (‘erbij’), maar professioneel, door teinvesteren in kennis en relatie. Goed aansluiten op de context, belangen en taal van bedrijven) en zakelijk (open en eerlijk vooraf, goede begeleiding/ontzorgen tijdens, goede evaluatie bij afloop). 
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns">
				3.
			</div>
			<div class="large-11 columns">
				Proactief samenwerken met andere organisaties/intermediairs (werkgeversservicepunt, SBB, scholen onderling etc) voor maximale kansen voor het zien en pakken van kansen.
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns">
				4.
			</div>
			<div class="large-11 columns">
				Kennis van en vaardigheden voor professioneel ontzorgen en op maat inzet van instrumenten bij werkgevers: administratief, begeleiding, compensatie lagere productiviteit, proefperiode etc. Waar nodig inclusief een rol van arbeidstoeleidingsbedrijven.
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns">
				5.
			</div>
			<div class="large-11 columns">
				Beschikbaarheid van voldoende werkgevers om jongeren met LVB passende werkervaring te laten opdoen en kansen te geven.
			</div>
		</div>
	</div>
</div>
<div class="row ">
	<div class="large-4 column end page-next">	
		<p>
			Heeft iedereen zich kunnen voorstellen? <br />	
			Dan kunt u door naar de...	
		</p>
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