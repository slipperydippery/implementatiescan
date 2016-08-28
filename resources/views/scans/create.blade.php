@extends('layouts.admin')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Maak een nieuwe scan aan</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Als administrator kunt u hier nieuwe scans aanmaken zodat scholen een sessie kunnen organiseren. Met het aanmaken van de scan kiest u een voorzitter die verantwoordelijk is voor het inrichten van de scan. De voorzitter krijgt een eigen inlogcode waarmee hij of zij deelnemers kan uitnodigen.  

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-8 columns submitted-users">
	
		{!! Form::open(['route' => 'scans.store']) !!}
			@include('scans.partials.form', ['submittext' => 'Maak scan aan'])
		{!! Form::close() !!}

	</div>
</div>

@stop



@section('site-footer')

@stop