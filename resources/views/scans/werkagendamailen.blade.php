@extends('layouts.scan', ['title' => 'Werkagenda Mailen'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Werkagenda Mailen</h1>
		<fieldset class="fieldset">
  			<legend>Verstuur de verbeteracties, die tezamen de gezamenlijke Werkagenda vormen, naar de deelnemers</legend>
			<p class=subheading>
				Nadat u de vastgestelde Werkagenda ter versterking van de arbeidsmarktkansen van jongeren met LVB heeft vastgesteld, worden deze met een druk op de knop automatisch verzonden naar de deelnemers.
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">

	{!! Form::open(['route' => ['email.verzendwerkagenda', $scan]]) !!}
		
		<!-- CC Form Input -->
		<div class="form-group">
			{!! Form::label('cc', 'Onderwerp:') !!}
			{!! Form::text('cc', 'Werkagenda Implementatiescan', ['class' => 'form-control']) !!}
		</div>

		<!-- CC Form Input -->
		<div class="form-group">
			{!! Form::label('cc', 'Aan:') !!}
			{!! Form::text('cc', $scan->beheerder->email, ['class' => 'form-control']) !!}
		</div>


		{!! Form::label('cc', 'BCC:') !!}
		@foreach($scan->participants as $participant)
			{!! Form::checkbox('recipients[]', $participant->id, true) !!} {{ $participant->name_first }} {{ $participant->name_last }} - {{ $participant->email }}, <br>
		@endforeach
		<br>
		<!-- Email tekst Form Input -->
			<?php 
				$emailtext = "Beste deelnemers,

	Bedankt en gefeliciteerd! Tijdens de Werkagenda sessie Implementatiescan Jongeren met LVB hebben we de volgende verbeterpunten vastgesteld. Deze vormen de Werkagenda, waar we gezamenlijk en ieder voor zich mee aan de slag gaan in het komende jaar. Dat doen we als volgt:";
			?>
		<div class="form-group">
			{!! Form::label('mail_intro', 'Email tekst:') !!}
			{!! Form::textarea('mail_intro', $emailtext, ['class' => 'form-control email_naar_participant']) !!}
		</div>

		<div class="verbeteractietext form-group">
			{!! $werkagendatext !!}
		</div>

		<!-- Hidden werkagendatext Type Form Input -->
		{!! Form::hidden('werkagendatext', $werkagendatext, null) !!}

		<!-- Add Submit Field -->
		<div class="form-group">
		    {!! Form::submit('Verzend werkagenda', ['class' => 'button form-control']) !!}
		</div>

	{!! Form::close() !!}

	<a href="{{ URL::route('scans.verbeteracties_bedankt', $scan) }}" class="button float-right">Verzend Werkagenda</a>
</div>
@stop


