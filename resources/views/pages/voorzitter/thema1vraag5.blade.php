@extends('layouts.master')

@section('content')

<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema I: Focus op werk</h1>
		<h2>Kernvraag 5: beschikbaarheid werkgevers</h2>
		<fieldset class="fieldset">
  			<legend>Neem één minuut de tijd om de volgende vraag op uw eigen scherm te beantwoorden:</legend>
  				<div id="time">01:00</div>

			<p class=subheading>
				Beschikbaarheid van voldoende werkgevers om jongeren met LVB passende werkervaring te laten opdoen en kansen te geven.
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--participant">
		<input type="range" class="algemeenbeeldslider slider__breed" value="50">
		<span class="slider__label__left">
			0
		</span>
		<span class="slider__label__right">
			100
		</span>
	</div>
	<div class="large-12 columns pre-resultaat">

		<a class="button" href="{{ URL::to('thema1resultaat') }}">Verstuur antwoord</a><br>
				
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
    var oneMinute = 60,
        display = document.querySelector('#time');
    startTimer(oneMinute, display);
};
</script>

@stop

