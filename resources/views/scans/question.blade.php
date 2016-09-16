@extends('layouts.scan')

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1> Thema {{ $thema_nr }}: {{ $thema->title }} </h1>
			<h2>Succesfactor {{$question_nr}}: {{ $question->title }}</h2>
			<fieldset class="fieldset large-8 columns">
	  			<legend>Neem één minuut de tijd om de volgende vraag op uw eigen scherm te beantwoorden:</legend>
				<p class=subheading>
	  			Neem één minuut de tijd om op uw eigen tablet of laptop aan te geven in hoeverre in uw regio wordt voldaan aan een uit onderzoek gebleken kritische succesfactor: <br>
					{{ $question->norm }} 
			
				</p>
			</fieldset>
			<div class="large-4 columns">
				<div id="time">01:00</div>	
			</div>
			
		</div>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--participant">
<?php
	$slidervalue = 0;
	$user = Auth::user();
	if(count($user->answers->intersect($question->answers)))
	{
		$slidervalue = $user->answers->intersect($question->answers)->first()->value;
	}
?>
		<div class="slider input_slider" data-slider data-initial-start="<?= $slidervalue ?>" data-options="start: 0; end: 10;">
			<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
			<span class="slider-fill" data-slider-fill></span>
		</div>

		<span class="slider__label__left">
			0
		</span>
		<span class="slider__label__right">
			10
		</span>

		<br>

		
		{!! Form::open(['route' => ['scans.storequestion', $scan, $thema_nr, $question_nr, $question]]) !!}
			<div class="row">
				<div class="small-8 columns">.</div>
				<div class="small-2 columns">
				uw inschatting:
				  <input type="number" name="value" id="sliderOutput2" value="<?= $slidervalue ?>">
				</div>		
	  			
				<div class="columns small-2 form-group">
				. <br>
					<!-- Add Submit Field -->
					<div class="form-group">
					    {!! Form::submit('Verstuur antwoord', ['class' => 'button']) !!}
					</div>
				</div>				
			</div>	
		{!! Form::close() !!}

		

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
    var oneMinute = 60,
        display = document.querySelector('#time');
    startTimer(oneMinute, display);
};
</script>

@stop