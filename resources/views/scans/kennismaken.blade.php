@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Kennismaken</h1>
		<fieldset class="fieldset">
  			<legend>Even voorstellen</legend>
			<p class=subheading>
				Vaak zal niet iedereen elkaar kennen. Daarom een voorstelrondje, waarbij iedereen aangeeft: wie ben je? namens welke organisatie, je rol/functie en wat je hoopt dat uit deze sessie komt (wens of droom).<br><br>
				Hieronder kunt u zien wie is aangemeld. Klopt dit 
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
		<h4>Aangemeldde Deelnemers: </h4>

		@foreach($scan->instanties as $instantie)
			@foreach($instantie->users as $participant)
				@if($participant->id == Auth::user()->id)
					<div class="large-2 column submitted-user callout success">
				@else
					<div class="large-2 column submitted-user callout">
				@endif

					<button class="close-button" aria-label="Close alert" type="button">
					    <span aria-hidden="true">&times;</span>
					</button>
					<img src="{{asset('img/user_dark.png')}}"> <br><br>
					<span class="first">{{ $participant->name_first ? $participant->name_first : "---" }}</span> 
					<span class="last">{{ $participant->name_last ? $participant->name_last : "---" }}</span> 
					<span class="functie"> {{ $instantie->title }} </span>
				</div>
			@endforeach
		@endforeach

		<div class="large-2 column end submitted-user">
			<span class="add_submitted_user">+</span>
		</div>

		
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	

		<a href="{{ URL::route('scans.algemeenbeeld', $scan) }}" class="button button-next">Scan Starten</a>
	</div>
</div>

@stop
