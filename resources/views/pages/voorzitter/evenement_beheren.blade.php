@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Evenement Beheren</h1>
		<fieldset class="fieldset">
  			<legend>Dit is de email die u aan de deelnemers kunt sturen</legend>
			<p class=subheading>
				Elke deelnemer die u heeft aangemeld krijgt de onderstaande email. U kunt de email eventueel aanpassen en/of uw eigen afzender toevoegen. Elke deelnemer krijgt in de email een eigen gebruikersnaam en inlog. Hiermee kan de deelnemer ter voorbereiding van de sessie alvast inloggen. <br><br>

				U ontvangt zelf een kopie van deze mail en de deelnemers die u heeft aangemeld.
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">

	<div class="large-4">
		<h4>Geplande datum en locatie voor het uitvoeren van de scan</h4>
		<br>
		<!-- Locatie Form Input -->
		<div class="form-group">
			{!! Form::label('locatie', 'Locatie:') !!}
			{!! Form::text('locatie', null, ['class' => 'form-control']) !!}
		</div>
		{!! Form::label('locatie', 'Datum:') !!}
		<input type="date">
		<br>
		<a href="#" class="button">update data</a><br>
		<br>
		<br>
		<a href="#" class="button">verzend evenement info</a>
	</div>

</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('deelnemers_uitnodigen') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
