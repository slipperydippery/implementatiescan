@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>{{ $scan->name }} </h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				bla

  			</p>

		</fieldset>
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


