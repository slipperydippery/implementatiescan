@extends('layouts.master')

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

	<!-- CC Form Input -->
	<div class="form-group">
		{!! Form::label('cc', 'Onderwerp:') !!}
		{!! Form::text('cc', 'Verbeteracties Implementatiescan', ['class' => 'form-control']) !!}
	</div>

	<!-- CC Form Input -->
	<div class="form-group">
		{!! Form::label('cc', 'Aan:') !!}
		{!! Form::text('cc', 'mijnemail@adress.com', ['class' => 'form-control']) !!}
	</div>


	{!! Form::label('cc', 'BCC:') !!}
	<textarea name="BCC:" id="" cols="30" rows="8">
<Gerard de Groot>gerard@gmail.com,
<Piet Janssen>piet@mee.nl,
<Henk de Graaf>henk@bouwservice.nl,
<Gerard de Groot>gerard@gmail.com,
<Piet Janssen>piet@mee.nl,
<Henk de Graaf>henk@bouwservice.nl,
<Gerard de Groot>gerard@gmail.com,
<Piet Janssen>piet@mee.nl,
<Henk de Graaf>henk@bouwservice.nl,
	</textarea>

	<!-- Email tekst Form Input -->
	<div class="form-group">
		{!! Form::label('mail_intro', 'Email tekst:') !!}
		<?php 
			$emailtext = "Beste <voornaam>, 

Beste <voornaam>,

Bedankt en gefeliciteerd! Tijdens de Werkagenda sessie Implementatiescan Jongeren met LVB hebben we de volgende verbeterpunten vastgesteld. Deze vormen de Werkagenda, waar we gezamenlijk en ieder voor zich mee aan de slag gaan in het komende jaar. Dat doen we als volgt:

Focus op werk en talent
1. Werkend leren 
   - Te quo fabulas impedit laboramus. Est sententiae reprimique ne.
   - Trekker: Irene deLouvre
   - Betrokkenen: Piet Klaas, Olivia Komreij, Douwe Benthulip

2. etc...

Datum volgende bijeenkomst: 16 October 2016

Met vriendelijke groeten,

Karel Janssen
VSO School
 ";
		?>
		{!! Form::textarea('mail_intro', $emailtext, ['class' => 'form-control email_naar_participant', 'rows' => '18']) !!}
	</div>

	<a href="{{ URL::route('scans.verbeteracties_bedankt', $scan) }}" class="button float-right">Verzend Werkagenda</a>
</div>
@stop


