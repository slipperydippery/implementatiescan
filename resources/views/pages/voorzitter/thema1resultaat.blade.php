@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema 1: resultaat</h1>
		<h2>Focus op werk en talent</h2>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Hieronder kunt u zien wat iedereen zojuist heeft ingevuld. Wat valt u op? Bespreek de resultaten de komende 15 minuten, en selecteer dan de in uw ogen belangrijkste 2 verbeterpunten.
				
  			</p>


		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns algemeenbeeldslider--group">
		<div class="row sliders-sub slider-gemiddeld__thema">
			<div class="large-2 columns slider-empty">.
			 </div>
			<div class="large-2 columns center slider-columnhead">
			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.">Werkend leren</span>
					
			</div>
			<div class="large-2 columns center slider-columnhead">
			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.">Samenwerking werkgevers</span>
			</div>
			<div class="large-2 columns center slider-columnhead">
			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.">Samenwerking andere organisaties</span>
			</div>
			<div class="large-2 columns center slider-columnhead">
			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.">Ontzorgen werkgevers</span>
			</div>
			<div class="large-2 columns center slider-columnhead">
			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Werkend leren centraal, ook op school: jongeren met LVB leren het meest en best via learning by doing. Niet schools en simulatie, maar – ‘zo reëel en realistisch mogelijk’ – praktijk centraal: oefenen, (liefst gecertificeerde) werkervaring en vaardigheden opdoen, ontdekken, groeien door iets kunnen en steeds meer (blijken te) kunnen.">Beschikbaarheid werkgevers</span>
			</div>
		</div>
		<div class="row sliders-sub sliders-sub__thema ">
			<div class="large-2 columns">Gemiddeld</div>
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
		<div class="row sliders-sub sliders-sub__thema slider-onderwijs">
			<div class="large-2 columns">Onderwijs</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider " value="80">
			</div>
		</div>
		<div class="row sliders-sub sliders-sub__thema slider-gemsd">
			<div class="large-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="sociale dienst en werkbedrijf/intermediair.">Gemeenten</span>
				</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="45">
			</div>
		</div>
		<div class="row sliders-sub sliders-sub__thema slider-gemsmw">
			<div class="large-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="leerplicht / SMW.">Gemeenten</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="50">
			</div>
		</div>
		<div class="row sliders-sub sliders-sub__thema slider-werk">
			<div class="large-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="weerkgevers (vertegenwoordigers).">Werk</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="90">
			</div>
		</div>
		<div class="row sliders-sub sliders-sub__thema slider-zorg">
			<div class="large-2 columns">
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="bijv MEE, Jeugdzorg.">Zorg</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="43">
			</div>
		</div>
		<div class="row sliders-sub sliders-sub__thema slider-overig">
			<div class="large-2 columns">
			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="bijv UWV, Projectorganisaties.">Overig</span></div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
			</div>
			<div class="large-2 columns">
				<input type="range" class="algemeenbeeldslider" value="65">
			</div>
		</div>

		<div class="row sliders-sub slider-verbeterpunten">
			<div class="large-2 columns"><span class="left"><b>Verbeterpunten</b></span></div>
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

	<div class="large-12 columns thema-submit-container">

		<a class="button thema-submit" href="{{ URL::to('actieoverzicht') }}">Bevestig verbeterpunten</a><br>
				
  		<div id="time">01:00</div>
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