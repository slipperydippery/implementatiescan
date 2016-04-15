@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Email versturen</h1>
		<fieldset class="fieldset">
  			<legend>Verstuur nu een email naar de deelnemers die u heeft aangemeld</legend>
			<p class=subheading>
				Elke deelnemer die u heeft aangemeld krijgt de onderstaande email. U kunt de email eventueel aanpassen en/of uw eigen afzender toevoegen. Elke deelnemer krijgt in de email een eigen gebruikersnaam en inlog. Hiermee kan de deelnemer ter voorbereiding van de sessie alvast inloggen. <br><br>

				U ontvangt zelf een kopie van deze mail en de deelnemers die u heeft aangemeld.
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">

	<!-- CC Form Input -->
	<div class="form-group">
		{!! Form::label('cc', 'Onderwerp:') !!}
		{!! Form::text('cc', 'Uitnodiging implementatiescan', ['class' => 'form-control']) !!}
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

Alle VSO scholen zijn bezig met het vergroten van de kans op succes om leerlingen van school naar werk te begeleiden. Hiervoor is een implementatiescan ontwikkeld met als doel met elkaar kennis te delen en samenwerking te optimaliseren. Graag wil ik je uitnodigen om samen met een aantal andere netwerkpartners deze scan uit te voeren. Ik heb jou uitgenodigd, en (stichting MEE, gemeente Alkmaar, IJmond werkt, reïntegratiebureau, en een regionale werkgever).
Ik stuur je hierbij alvast jouw eigen inloggegevens zodat je alvast kunt kijken wat de scan omvat. En ik neem binnenkort contact met je op om een afspraak in te plannen. 

<inlog en password aanmaak link>

Met vriendelijke groeten,

Karel Janssen
VSO School
 ";
		?>
		{!! Form::textarea('mail_intro', $emailtext, ['class' => 'form-control email_naar_participant', 'rows' => '18']) !!}
	</div>

	<a href="" class="button right">Verzend uitnodiging</a>
</div>
@stop


