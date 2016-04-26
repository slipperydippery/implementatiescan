@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Scansmodellen</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Hier is een overzicht van all uw scansmodellen

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
	
		@foreach($scanmodels as $scanmodel)
			<a href=" {{ route('scanmodels.show', $scanmodel->id) }} "><h2>{{ $scanmodel->title }}</h2></a>
			    
		@endforeach
		<a href=" {{ route('scanmodels.create') }} " class="button">Create new Scan</a>

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


