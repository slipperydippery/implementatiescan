@extends('layouts.master')

@section('content')

<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema I: Focus op werk</h1>
		<h2>Kernvraag 2: samenwerking werkgevers</h2>
		<fieldset class="fieldset">
  			<legend>Neem één minuut de tijd om de volgende vraag op uw eigen scherm te beantwoorden:</legend>

			<p class=subheading>
				Samenwerking met werkgevers niet als secundaire activiteit (‘erbij’), maar professioneel, door te investeren in kennis en relatie. Goed aansluiten op de context, belangen en taal van bedrijven) en zakelijk (open en eerlijk vooraf, goede begeleiding/ontzorgen tijdens, goede evaluatie bij afloop).
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--participant">
		<div id="time">01:00</div>
		<input type="range" class="algemeenbeeldslider slider__breed" value="50">
		<span class="slider__label__left">
			0
		</span>
		<span class="slider__label__right">
			100
		</span>
	</div>
	<div class="large-12 columns thema-submit-container">

		<a class="button thema-submit" href="{{ URL::to('thema1vraag3') }}">Verstuur antwoord</a><br>
				
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
