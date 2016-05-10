@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Inlog beheerder</h1>
		<fieldset class="fieldset large-8">
		<legend>Instructie voor de voorzitter</legend>
			<p >
				Als voorzitter kunt u hier de scan inrichten. Log eerst in met uw eigen inloggegevens die in de email staan. Daarna kunt u de deelnemers aan de Implementatiescan-sessie uitnodigen om mee te doen. 
				<br>
				Dit proces wijst zichzelf.
				
			</p>
		</fieldset>
	</div>
</div>
<div class="row">
	<div class="large-4">
		Voorzitter log in
		<!-- email Form Input -->
		<div class="form-group">
			{!! Form::label('email', 'email:') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>

		<!-- wachtwoord Form Input -->
		<div class="form-group">
			{!! Form::label('wachtwoord', 'wachtwoord:') !!}
			{!! Form::text('wachtwoord', null, ['class' => 'form-control']) !!}
		</div>

		<a href="{{ URL::route('scans.invoerendeelnemers', 2) }}" class="button">Log in</a>
	</div>
</div>


@stop
