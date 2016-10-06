@extends('layouts.scan', ['title' => 'Uitnodiging Verzonden'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Uw mail is verzonden naar de deelnemers</h1>
			<fieldset class="fieldset">
	  			<p class="subheading subheading__time">
	  				Op dit moment krijgen alle deelenemrs de uitnodiging in hun mailbox.
	  			</p>
			</fieldset>
		</div>
	</div>
</div>

@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('home') }}" class="button answered">
			Home
		</a>
	</div>
</div>


@stop