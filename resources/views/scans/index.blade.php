@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Scans</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Hier is een overzicht van all uw scans

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
	
		@foreach($scans as $scan)
			<a href=" {{ route('scans.show', $scan->id) }} "><h2>{{ $scan->name }}</h2></a>
			    
		@endforeach

	</div>
</div>

@stop



@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('algemeenbeeld') }}" class="button button-next">Scan Starten</a>
	</div>
</div>

@stop


