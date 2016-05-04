@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>{{ $user->name_first }} {{ $user->name_last }} </h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				

  			</p>

		</fieldset>
	</div>
</div>



<div class="row page-content">
	<div class="large-12 columns">
		<h2>Beheerder van Scans:</h2>
		<ul>
			@foreach($user->beheert as $scan)
				<li>{{ $scan->title }}</li>
			@endforeach
		</ul>
		<h2>Participant in Scans:</h2>
		<ul>
			@foreach($user->scans as $scan)
				<li>{{ $scan->title }}</li>
			@endforeach
			@if(count($user->scans) == 0)
				<li>Gebruiker heeft geen scans</li>
			@endif

		</ul>



	</div>
</div>



@stop

