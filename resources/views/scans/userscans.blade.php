@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht van uw scans</h1>
		<fieldset class="fieldset large-8">
		<legend>Instructie voor de deelnemer</legend>
			<p >
				Hieronder ziet u een overzicht van de scans waarvoor u bent uitgenodigd om aan deel te nemen. 
				
			</p>
		</fieldset>
	</div>
</div>
<div class="row">
	<div class="large-4">
		<h2>Overzicht scans</h2>
		<ul>
			@foreach($scans as $scan)
				<li><a href="{{ URL::route('scans.intro', $scan) }}"> {{ $scan->title }}, {{ $scan->regio }} </a></li>
			@endforeach
		</ul>

	</div>
</div>


@stop
