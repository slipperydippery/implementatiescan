@extends('layouts.admin')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Maak een nieuwe gebruiker aan</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hier kunt u een nieuwe gebruiker aanmaken. Deze gebruiker zal een email ontvangen met daarin de inloggegevens.
  			</p>
		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-8 columns submitted-users">
	
		{!! Form::open(['route' => 'users.store']) !!}
			@include('users.partials.form', ['submittext' => 'Maak gebruiker aan'])
		{!! Form::close() !!}

	</div>
</div>

@stop



@section('site-footer')

@stop