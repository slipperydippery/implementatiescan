@extends('layouts.admin', ['title' => 'voeg een praktijkvoorbeeld toe'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Voeg een praktijkvoorbeeld toe</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-8 columns submitted-users">
	
		{!! Form::open(['route' => 'praktijkvoorbeelds.store']) !!}
			@include('praktijkvoorbeelds.partials.form', ['submittext' => 'Voeg Toe'])
		{!! Form::close() !!}

	</div>
</div>

@stop



@section('site-footer')

@stop