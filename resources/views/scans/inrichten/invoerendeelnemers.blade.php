@extends('layouts.beheer', ['title' => 'invoeren deelnemersgegevens'])

@section('content')
<div class="page-heading--container">
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
</div>

<div class="row page-content">
	<div class="small-12 textual_table gebruikers_aanmelden">
		<div class="row textual_table--row textual_table--header gebruikers_aanmelden--row">
			<div class="small-2 small-offset-1 columns">
				Voornaam
			</div>
			<div class="small-2 columns">
				Achternaam
			</div>
			<div class="small-3 columns">
				Email
			</div>
			<div class="small-2 columns">
				Instantie
			</div>
			<div class="small-2 columns">
				
			</div>
		</div>

		<invoeren-deelnemers></invoeren-deelnemers>
	
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
