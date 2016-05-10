@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Kennismaken</h1>
		<fieldset class="fieldset">
  			<legend>Even voorstellen</legend>
			<p class=subheading>
				Vaak zal niet iedereen elkaar kennen. Daarom een voorstelrondje, waarbij iedereen aangeeft: wie ben je, namens welke organisatie doe je mee, je rol/functie en wat je hoopt dat uit deze sessie komt (wens of droom).<br><br>
				Hieronder kunt u zien wie is aangemeld. Klopt dit?
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
		<h4>Aan deze scan doen mee: </h4>

		@foreach($scan->instanties as $instantie)
			@foreach($instantie->users as $participant)
				@if($participant->id == Auth::user()->id)
					<a data-open="userModal"> 
            		<div class="large-2 column submitted-user callout success">
				@else
					<div class="large-2 column submitted-user callout">
					<a href=" {{ URL::route('scans.removeuser', [$scan, $participant]) }} " class="close-button" aria-label="Close alert" type="button">
					    <span aria-hidden="true">&times;</span>
					</a>
				@endif

					<img src="{{asset('img/user.png')}}"> 

					<div class="participant_info">
						<span class="name">{{ $participant->name_first ? $participant->name_first : "---" }} {{ $participant->name_last ? $participant->name_last : "" }}</span> 
						<span class="functie"> {{ $instantie->title }} </span>
					</div>
				</div>
				@if($participant->id == Auth::user()->id)
					</a>
				@endif
			@endforeach
		@endforeach

		@if(count($scan->participants) < 12)
			<div class="large-2 column end submitted-user">
				<a data-open="addParticipantModal"> <span class="add_submitted_user">+</span> </a>
				<div class="reveal" id="addParticipantModal" data-reveal>
				 	<h1>Voeg gebruiker toe</h1>

					{!! Form::open(['route' => ['scans.addparticipant', $scan]]) !!}
						<!-- Voornaam Form Input -->
						<div class="form-group">
							{!! Form::label('name_first', 'Voornaam:') !!}
							{!! Form::text('name_first', null, ['class' => 'form-control']) !!}
						</div>

						<!-- Achternaam Form Input -->
						<div class="form-group">
							{!! Form::label('name_last', 'Achternaam:') !!}
							{!! Form::text('name_last', null, ['class' => 'form-control']) !!}
						</div>

						<!-- Email Form Input -->
						<div class="form-group">
							{!! Form::label('email', 'Email:') !!}
							{!! Form::text('email', null, ['class' => 'form-control']) !!}
						</div>

						<!-- Instantie Form Input -->
						<div class="form-group">
						    {!! Form::label('instantie', 'Instantie:') !!}
						    {!! Form::select('instantie', $instantieoptions, 'none', ['class' => 'form-control']) !!}
						</div>

						<!-- Add Submit Field -->
						<div class="form-group">
						    {!! Form::submit('Voeg toe', ['class' => 'button form-control']) !!}
						</div>
					{!! Form::close() !!}
					<button class="close-button" data-close aria-label="Close reveal" type="button">
					    <span aria-hidden="true">&times;</span>
					 </button>
				</div>

			</div>
		@endif

		
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
