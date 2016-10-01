@extends('layouts.scan', ['title' => 'werkagenda'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Werkagenda Samenstellen</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Tijdens de Implementatiescan-sessie hebben we de volgende verbeterpunten vastgesteld. Deze vormden het huiswerk voor de door ons benoemde trekkers in samenwerking met anderen, ter voorbereiding op de, tweede en afrondende Werkagenda sessie. Vandaag bespreken we het huiswerk en stellen we definitieve verbeteracties vast, die tezamen onze gezamenlijke Werkagenda vormen. Vooringevuld zijn de voorlopige verbeteracties uit de eerste, Implementatiescan sessie. Vandaag maken we deze ‘SMART’. Ook kunnen eventueel sub acties worden geformuleerd (bijvoorbeeld als er twee verbeteracties ter realisatie van één Succesfactor nodig zijn).
  			</p>

		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns actiepunten">
		<acties></acties>
	
	
	</div>

	<div class="large-12 columns thema-submit-container">

		<a class="button thema-submit" href="{{ URL::route('scans.werkagendamailen', [$scan]) }}">Werkagenda Mailen</a><br>
				
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
            timer = 0;
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