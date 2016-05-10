@extends('layouts.master')

@section('content')

<div class="row page-heading">
	<div class="large-12 ">
		<h1> Thema {{ $thema_nr }}: {{ $thema->title }} </h1>
		<h2>Kernvraag {{$question_nr}}: {{ $question->title }}</h2>
		<fieldset class="fieldset">
  			<legend>Neem één minuut de tijd om de volgende vraag op uw eigen scherm te beantwoorden:</legend>

			<p class=subheading>
				{{ $question->norm }} 
		
		<br><br>

				Bij {{ $question->title }} zijn de volgende onderwerpen van belang:
				
				{!! $question->weergave_succesfactor !!}

			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--participant">

		<div class="slider input_slider" data-slider data-initial-start="0">
			<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
			<span class="slider-fill" data-slider-fill></span>
		</div>



		<span class="slider__label__left">
			0
		</span>
		<span class="slider__label__right">
			100
		</span>

		<br><br>

  			<div id="time">01:00</div>
		<div class="row">
			<div class="small-8 columns">.</div>
			<div class="small-2 columns">
			  <input type="number" name="value" id="sliderOutput2">
			</div>		
  			
			<div class="columns small-2 form-group">
				<a class="button " href="{{ URL::route('scans.director', [$scan, $thema_nr, ($question_nr + 1)]) }}">Verstuur antwoord</a><br>
			</div>				
		</div>	
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