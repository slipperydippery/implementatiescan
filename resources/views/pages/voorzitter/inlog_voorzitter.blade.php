@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Inlog beheerder</h1>
		<fieldset class="fieldset large-8">
		<legend>Instructie voor de voorzitter</legend>
			<p >
				Als voorzitter kunt u hier de scan inrichten. Log eerst in met uw eigen inloggegevens die in de email staan. Daarna kunt u deelnemers uitnodigen om aan de scan mee te doen. Dit process wijst vanzelf. 
				
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

		<a class="button" href="{{ URL::to('regio_gemeente') }}">Log in</a><br>
	</div>
</div>


@stop
