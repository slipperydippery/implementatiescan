@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>email verstuurd</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Uw email is verstuurd naar alle deelnemers! <br>
  				Op ---- kunt u verder gaan met de werkagenda

  			</p>

		</fieldset>
	</div>
	<div class="large-12 columns thema-submit-container">

	<a class="button thema-submit" href="{{ URL::to('werkagenda') }}">Nu naar de werkagenda</a><br>
				
	</div>	
</div>
@stop


