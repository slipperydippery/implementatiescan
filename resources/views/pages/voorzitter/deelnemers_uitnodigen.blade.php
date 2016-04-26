@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>MAILEN VAN UITNODIGING </h1>
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
		{!! Form::text('cc', 'Uitnodiging bijeenkomst Implementatiescan Werkagenda ', ['class' => 'form-control']) !!}
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
			$emailtext = "Beste …,

Graag wil ik je uitnodigen voor een bijeenkomst om met elkaar in gesprek te gaan over het vergroten van kansen op de arbeidsmarkt voor kwetsbare jongeren. Namelijk aan de hand van de Implementatiescan, een landelijke kennis- en procestool die regionale organisaties helpt om gezamenlijk de sterktes en zwaktes in de huidige aanpak en noodzakelijke verbeteracties te bepalen.  Deze scan is ontwikkeld op basis van de state of the art kennis over wat werkt. In opdracht van LECSO en in samenwerking met onder andere Divosa, UWV, MEE Nederland en SBB, die toepassing van de scan van harte aanbevelen. 

In alle regio’s gaan VSO-scholen daartoe in gesprek met gemeenten en andere verantwoordelijke organisaties, zoals SBB, MEE, werkgevers en UWV. Graag zou ik namens de scholen ook met jou in gesprek willen om gezamenlijk de analyse van verbeterkansen in onze regio te maken. Tijdens een Implementatiescan-sessie.  Ik stuur je hierbij alvast jouw eigen inloggegevens zodat je alvast kunt kijken hoe de scan werkt. En ik neem binnenkort contact met je op om een afspraak in te plannen.

<inlog en password aanmaak link>

Met vriendelijke groeten,

………………,
VSO School

 ";
		?>
		{!! Form::textarea('mail_intro', $emailtext, ['class' => 'form-control email_naar_participant', 'rows' => '18']) !!}
	</div>

	<a href="{{ URL::to('bedankt') }}" class="button right">Verzend uitnodiging</a>
</div>
@stop


