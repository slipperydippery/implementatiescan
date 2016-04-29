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
			<a href=" {{ route('scans.show', $scan->id) }} "><h2>{{ $scan->title }}</h2></a>
			    
		@endforeach
		<a href=" {{ route('scans.create') }} " class="button">Maak een nieuwe scan aan</a>

	</div>
</div>

@stop


