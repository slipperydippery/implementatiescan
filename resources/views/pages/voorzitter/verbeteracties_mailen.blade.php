@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Verbeteracties Mailen</h1>
		<fieldset class="fieldset">
  			<legend>Verstuur de verbeteracties naar de deelnemers </legend>
			<p class=subheading>
				Mea debet consul option ea, eu malis graece repudiandae eam, est virtute iuvaret similique eu. Per labitur omnesque efficiantur ut, sed utamur urbanitas eu. Ea expetendis intellegebat duo, eum verterem repudiare aliquando eu, pro ut malorum alienum appetere. Te quo fabulas impedit laboramus. Est sententiae reprimique ne.
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

Per labitur omnesque efficiantur ut, sed utamur urbanitas eu. Ea expetendis intellegebat duo, eum verterem repudiare aliquando eu, pro ut malorum alienum appetere. Te quo fabulas impedit laboramus. Est sententiae reprimique ne.

Overzicht Verbeteracties:

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

	<a href="{{ URL::to('verbeteracties_bedankt') }}" class="button right">Verzend verbeteracties</a>
</div>
@stop


