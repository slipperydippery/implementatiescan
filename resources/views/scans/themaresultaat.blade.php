@extends('layouts.scan', ['title' => 'thema ' . $thema_nr . ' resultaat'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading align-bottom">
		<div class="large-12 ">
			<h1>Thema {{ $thema_nr }}: resultaat</h1> 
			<h2> {{ $thema->title }} </h2>
			<fieldset class="fieldset large-8 column">
	  			<p class="subheading subheading__time">
	  				Hieronder kunt u zien wat iedereen zojuist heeft ingevuld. Wat valt u op? Bespreek de resultaten de komende 15 minuten, en selecteer dan de in uw ogen belangrijkste 2 verbeterpunten. 
	  			</p>
			</fieldset>
			<div class="large-4 columns">
				@if(count(Auth::user()->beheert->intersect([$scan])))
					<div id="time">15:00</div>	
				@endif
			</div>
		</div>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns algemeenbeeldslider--group">
		<div class="row sliders-sub slider-gemiddeld__thema">
			<div class="large-2 small-2 columns slider-empty">.
			 </div>
			 @foreach($thema->questions as $question)	
			 	<div class="large-2 small-2 columns slider-columnhead">
			 		<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title=" {{ $question->norm }} "> {{ $question->title }} <i class="float-right iclass">i</i></span> 
			 	</div>	
			 @endforeach
		</div>
		<div class="row sliders-sub sliders-sub__thema ">
			<div class="large-2 small-2 columns">Gemiddeld</div>
			@foreach($themasaverage as $themaaverage_id => $themaaverage)
				<div class="large-2 small-2 columns center">
					<div class="rangeresult" >
						<div class="rangeresult__value" style="width: <?= $themaaverage * 10 ?>%">
						</div>
					</div>
				</div>
			@endforeach
		</div>
		@foreach($scan->instanties as $instantie)
			@if(count($instantie->participants))
				<div class="row sliders-sub slider-{{$instantie->instantiemodel->id}} ">
					<div class="large-2 small-2 columns"> {{ $instantie->title }} </div>
					@foreach($thema->questions as $question)
						<div class="large-2 small-2 columns center">
<?php 
$answercount = 0;
$value = 0;
foreach($instantie->participants as $participant)
{	
	if(count($participant->answers->intersect($question->answers)))
	{
		$value += $participant->answers->intersect($question->answers)->first()->value;
		$answercount++;
	}
}
($answercount > 0) ? $average = $value / $answercount : $average = 0;

?>
							@if($answercount >0)
								<div class="rangeresult" >
									<div class="rangeresult__value" style="width: <?= $average * 10 ?>%">
									</div>
								</div>
							@endif
						</div>
					@endforeach
				</div>
			@endif
		@endforeach
		<thema-resultaat></thema-resultaat>
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
	<?php $question_nr = 1000 ?>
		{{-- <a href=" {{ URL::route('scans.invoerendeelnemers', $scan) }} " class="button button-nextbutton button-next">Volgende Stap</a> --}}
		{{-- <a href="{{ URL::route('scans.director', $scan, $thema_nr, $question_nr) }}" class="button button-next">Volgende Stap</a> --}}
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