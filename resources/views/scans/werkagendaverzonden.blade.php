@extends('layouts.master', ['title' => 'Werkagenda Verzonden'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Werkagenda gemaild</h1>
			<fieldset class="fieldset">
	  			<p class="subheading subheading__time">
	  				De resultaten van de werkagenda worden nu naar alle deelnemers verstuurd per email. 
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