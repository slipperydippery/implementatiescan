@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Deelnemers uitnodigen</h1>
		<fieldset class="fieldset large-8">
			<legend>Instructie om deelnemers uit te nodigen</legend>
			<p>
				Als voorzitter van de school kunt u meerdere deelnemers uitnodigen voor het uitvoeren van de scan. Op uw initiatief kunt u maximaal 6 netwerkpartners uitnodigen. Van elke netwerkpartner kunnen 2 vertegenwoordigers aan tafel schuiven. Netwerkpartners zijn onder andere Gemeenten, Werkgevers, Zorg, Arbeidsreïntegratiebureaus, etc. Vul van elke partij die u uitnodigt de naam van de organisatie, de naam van de deelnemer, en zijn of haar email in. Vul ook de regio in waarin de partijen werkzaam zijn. <br><br>
				Na het invullen van alle deelnemers versturen dit systeem een email met uitnodiging en inloggegevens aan alle genodigden. 
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
	<div class="large-12 gebruikers_aanmelden">
		<div class="row">
			<div class="large-1 columns ">
				<img src="{{asset('img/user_dark.png')}}"> <br><br>
			</div>
			<div class="large-3 columns">
				<!-- voornaam Form Input -->
				<div class="form-group">
					{!! Form::text('voornaam', null, ['class' => 'form-control', 'placeholder' => 'voornaam']) !!}
				</div>
			</div>
			<div class="large-3 columns">
				<!-- voornaam Form Input -->
				<div class="form-group">
					{!! Form::text('voornaam', null, ['class' => 'form-control', 'placeholder' => 'achternaam']) !!}
				</div>
			</div>
			<div class="large-3 columns">
				<!-- voornaam Form Input -->
				<div class="form-group">
					{!! Form::text('voornaam', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
				</div>
				
			</div>
			<div class="large-2 columns">
				<!-- voornaam Form Input -->
				<div class="form-group">
					{!! Form::text('voornaam', null, ['class' => 'form-control', 'placeholder' => 'organisatie']) !!}
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns ">
				<img src="{{asset('img/user_dark.png')}}" class="">
				<span class="plus">+</span>
			</div>
			<div class="large-11 columns"></div>
		</div>		
	</div>
	
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	
		<a href="{{ URL::to('deelnemers_overzicht') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
