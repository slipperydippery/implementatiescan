@extends('layouts.scan', ['title' => 'Compleet'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Bedankt!</h1>
			<fieldset class="fieldset">
	  			<p class="subheading subheading__time">
	  				Op het centrale scherm kunt u gezamenlijk de verbeteracties kiezen. 
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