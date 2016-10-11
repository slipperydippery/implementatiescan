@extends('layouts.beheer', ['title' => 'uitnodigen deelnemers'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>MAILEN VAN UITNODIGING </h1>
			<fieldset class="fieldset large-8">
	  			<legend>Verstuur nu een email naar de deelnemers die u heeft aangemeld</legend>
				<p class=subheading>
					U kunt onderstaande  email waar gewenst aanpassen en/of uw eigen afzender toevoegen. Elke deelnemer krijgt in de email een eigen gebruikersnaam en inlogcode. Hiermee kan de deelnemer ter voorbereiding van de sessie alvast inloggen.  <br><br>

					U ontvangt zelf een kopie van deze mail en de deelnemers die u heeft aangemeld.
				</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">

	<div class="large-12">
		

		{!! Form::open(['route' => ['senduitnodiging', $scan->id]]) !!}
			<!-- CC Form Input -->
			<div class="form-group">
				{!! Form::label('subject', 'Onderwerp:') !!}
				{!! Form::text('subject', 'Uitnodiging bijeenkomst Implementatiescan Werkagenda ', ['class' => 'form-control']) !!}
			</div>


			{!! Form::label('Aan', 'Aan:') !!}
			@foreach($scan->participants as $participant)
				{!! Form::checkbox('recipients[]', $participant->id, true) !!} {{ $participant->name_first }} {{ $participant->name_last }} - {{ $participant->email }}, <br>

			@endforeach
			<br>
			
			<!-- Email tekst Form Input -->
			<div class="form-group">
				{!! Form::label('mail_intro', 'Email tekst:') !!}
				
				&nbsp;&nbsp;Beste [deelnemer],
				<br><br>
				<?php 
					$username =  Auth::user()->name_first . ' ' . Auth::user()->name_last;
					$emailtext = "Graag wil ik u uitnodigen voor een bijeenkomst om met partijen in de regio in gesprek te gaan over het vergroten van kansen op de arbeidsmarkt voor jongeren met LVB en andere jongeren in een kwetsbare positie. Dit doen we aan de hand van de Implementatiescan, een landelijke kennis- en procestool die regionale organisaties helpt om gezamenlijk de sterktes en zwaktes in de huidige aanpak en noodzakelijke verbeteracties te bepalen.  Deze scan is ontwikkeld op basis van de state of the art kennis over wat werkt. De implementatiescan is tot stand gebracht in overleg met een landelijk samenwerkingsverband van  LECSO, VNG, Divosa, UWV, MEE NL, VOBC, SBB en INGRADO, die toepassing van de scan van harte aanbevelen. De scan is getest door scholen, gemeenten, zorginstellingen, MEE, SBB en RMC. 

In alle regio`s gaan VSO- en PRO-scholen , gemeenten en andere verantwoordelijke organisaties aan de hand van de implementatiescan met elkaar in gesprek over hoe de kansen van kwetsbare jongeren op de arbeidsmarkt  zo groot mogelijk gemaakt kunnen worden Graag zou ik namens de scholen ook u willen verzoeken  om bij te dragen aan de gezamenlijke  analyse van verbeterkansen in onze regio. Bij deze nodig ik u van harte uit voor een  Implementatiescan-sessie. Ik stuur u hierbij alvast  u eigen inloggegevens zodat u alvast kunt kijken hoe de scan werkt. En ik neem binnenkort contact met u op om de bijeenkomst in te plannen.

Met vriendelijke groeten,

" . $username . ",
(VSO/PRO school)";
				?>
				{!! Form::textarea('body', $emailtext, ['class' => 'form-control email_naar_participant', 'rows' => '14']) !!}
			</div>

			<!-- Add Submit Field -->
			<div class="form-group">
			    {!! Form::submit('Verzend uitnodiging', ['class' => 'button form-control float-right']) !!}
			</div>
		{!! Form::close() !!}
	</div>

</div>
@stop


