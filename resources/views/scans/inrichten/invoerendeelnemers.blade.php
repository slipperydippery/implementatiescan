@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Invoeren deelnemersgegevens</h1>
		<fieldset class="fieldset large-8">
			<legend>Instructie om deelnemers uit te nodigen</legend>
			<p>
				Als initiatiefnemer voor de Implementiescan-sessie kunt u maximaal 12 deelnemers uitnodigen om gezamenlijk de scan uit te voeren. Met welke sleutelpersonen op management-/beleidsniveau uit uw (gewenste) netwerk wilt u in gesprek over verbetering van de aanpak? U kunt maximaal 2 netwerkpartners per ‘geleding’ uitnodigen. De zes geledingen zijn: (1) VSO/PRO, (2) Sociale Diensten/Werkbedrijf, (3) Leerplicht/SMW, (4) Werkgevers(vertegenwoordigers), (5) Zorg (bijv MEE, OBC) en (6) overig (bijv UWV of een regionale organisatie).  Vul van elke partij die u uitnodigt de naam van de organisatie, de naam van de deelnemer, en zijn of haar email in. Denk vooraf goed na over de regioafbakening: de keuze van de deelnemers moet passen bij de gewenste schaal van de gezamenlijke aanpak. <br><br>
				Na het invullen van alle deelnemers verstuurt het systeem een email met uitnodiging en inloggegevens aan alle genodigden.
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 gebruikers_aanmelden">
		<div class="row gebruikers_aanmelden--row">
			<div class="large-1 columns">
			.
			</div>
			<div class="large-2 columns">
				<span class="tablehead">Voornaam</span>
			</div>
			<div class="large-2 columns">
				<span class="tablehead">Achternaam</span>
			</div>
			<div class="large-3 columns">
				<span class="tablehead">Email</span>
			</div>
			<div class="large-2 columns">
				<span class="tablehead">Instantie</span>
			</div>
			<div class="large-2 columns">
				
			</div>
		</div>
		<invoeren-deelnemers></invoeren-deelnemers>
		<?php $participant = $scan->beheerder;?>
		@include('scans.inrichten.partials.participantrow', [$participant, $beheerder=true])
		@foreach($scan->instanties as $instantie)
			@foreach($instantie->participants as $participant)
				@if($participant->id != $scan->beheerder->id)
					@include('scans.inrichten.partials.participantrow', [$participant, $beheerder=false])
				@endif
			@endforeach
		@endforeach

		@if(count($instantieoptions) > 0 && ! isset($user))
			<div class="row gebruikers_aanmelden--row">
				{!! Form::open(['route' => ['scans.storedeelnemer', $scan]]) !!}
					<div class="large-1 columns" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Voeg een deelnemer toe">
						<img src="{{asset('img/user_dark.png')}}">
						<span class="plus">+</span>
					</div>
					<div class="large-2 columns">
						<!-- Voornaam Form Input -->
						<div class="form-group">
							{!! Form::text('name_first', null, ['class' => 'form-control', 'placeholder' => 'voornaam']) !!}
						</div>
					</div>
					<div class="large-2 columns">
						<!-- Achternaam Form Input -->
						<div class="form-group">
							{!! Form::text('name_last', null, ['class' => 'form-control', 'placeholder' => 'achternaam']) !!}
						</div>

					</div>
					<div class="large-3 columns">
						<!-- Email Form Input -->
						<div class="form-group">
							{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
						</div>

					</div>
					<div class="large-3 columns">
						<!-- Instantie Form Input -->
						<div class="form-group">
						    {!! Form::select('instantie', $instantieoptions, null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="large-1 columns">
						<!-- Add Submit Field -->
						<div class="form-group">
							<button onClick="this.form.submit()" class = "plussubmit" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Voeg gebruiker toe">+</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		@endif
	
	</div>
	
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('scans.controlerendeelnemers', $scan) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>


@stop
