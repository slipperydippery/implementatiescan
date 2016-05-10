@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema {{ $thema_nr }} : resultaat</h1>
		<h2> {{ $thema->title }} </h2>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hieronder kunt u zien wat iedereen zojuist heeft ingevuld. Wat valt u op? Bespreek de resultaten de komende 15 minuten, <br> en selecteer dan de in uw ogen belangrijkste 2 verbeterpunten.
  			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--group">
		<div class="row sliders-sub slider-gemiddeld__thema">
			<div class="large-2 small-2 columns slider-empty">.
			 </div>
			 @foreach($thema->questions as $question)	
			 	<div class="large-2 small-2 columns center slider-columnhead">
			 		<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title=" {{ $question->norm }} "> {{ $question->title }} </span>
			 	</div>	
			 @endforeach
		</div>
		<div class="row sliders-sub sliders-sub__thema ">
			<div class="large-2 small-2 columns">Gemiddeld</div>
			<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
			</div>
			<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
			</div>
			<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
			</div>
			<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
			</div>
			<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
			</div>
		</div>
		@foreach($scan->instanties as $instantie)
			<div class="row sliders-sub slider-{{$instantie->instantiemodel->id}} ">
				<div class="large-2 small-2 columns"> {{ $instantie->title }} </div>
				<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
				</div>
				<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
				</div>
				<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
				</div>
				<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
				</div>
				<div class="large-2 small-2 columns center">
				<div class="slider" data-slider data-initial-start="50">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
					<span class="slider-fill" data-slider-fill></span>
				</div>
				</div>
			</div>
		@endforeach
		<div class="row sliders-sub slider-verbeterpunten">
			<div class="large-2 small-2 columns">Verbeterpunten</div>
			@foreach($thema->questions as $question)
				<div class="large-2 small-2 columns checkinput">
					<input type="checkbox" class="verbetercheck">
				</div>
			@endforeach
		</div>
	</div>

	


	<div class="large-12 columns thema-submit-container">
		
		<a class="button thema-submit" href="{{ URL::route('scans.director', [$scan, $thema_nr, ($question_nr + 1)]) }}">Bewaar verbeterpunten</a><br>
				
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