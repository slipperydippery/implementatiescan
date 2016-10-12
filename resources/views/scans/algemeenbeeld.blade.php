@extends('layouts.scan', ['title' => 'algemeen beeld'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>ALGEMEEN BEELD </h1>
			<h2>HUIDIGE gezamenlijke AANPAK</h2>
			<fieldset class="fieldset large-8 columns">
	  			<legend>Beoordeel de huidige gezamenlijke aanpak </legend>
				<p class=subheading>
					Hieronder ziet u een schuif van 0 tot 10. Kunt u in algemene zin met een rapportcijfer aangeven op uw eigen scherm hoe goed onze regio het volgens u doet voor wat betreft de huidige gezamenlijke aanpak om jongeren in een kwetsbare positie zoals jongeren met LVB, tijdens en na hun schoolloopbaan goed te begeleiden naar werk? Nul is ‘we doen dat als regio slecht’ en tien is ‘we doen dat als regio perfect’.

				</p>
			</fieldset>
			<div class="large-4 columns">
				@if(count(Auth::user()->beheert->intersect([$scan])))
					<div id="time">01:00</div>	
				@endif
			</div>
		</div>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--participant">

		{!! Form::open(['route' => ['scans.store_algemeenbeeld', $scan]]) !!}
			<!-- bal Form Input -->


			  <div class="slider input_slider" data-slider data-initial-start="0" data-options="start: 0; end: 10;">
			    <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
			    <span class="slider-fill" data-slider-fill></span>
			  </div>
				<span class="slider__label__left">
					0
				</span>
				<span class="slider__label__right">
					10
				</span>


			<br><br>

			<div class="row">
				<div class="small-8 columns">.</div>
				<div class="small-2 columns">
				  <input type="number" name="value" id="sliderOutput2" v-model="number">
				</div>

				<!-- Add Submit Field -->
				<div class="columns small-2 form-group">
				    {!! Form::submit('Verstuur antwoord', ['class' => 'button']) !!}
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
