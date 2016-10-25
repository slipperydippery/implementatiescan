@extends('layouts.scan', ['title' => 'Creeer extern betrokkene'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Maak een nieuwe Externe Betrokkene aan</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hier kunt u een nieuwe extern betrokkene aanmaken. 
  			</p>
		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-8 columns submitted-users">
	
		{!! Form::open(['route' => ['consultants.storewithscan', $scan]]) !!}
			@include('consultants.partials.form', ['submittext' => 'Maak betrokkene aan'])
		{!! Form::close() !!}

	</div>
</div>

@stop



@section('site-footer')

@stop