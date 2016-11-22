@extends('layouts.master', ['title' => 'overzicht van uw scans'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht van uw scans</h1>
		<fieldset class="fieldset large-8">
		<legend>Instructie voor de voorzitter</legend>
			<p >
				Als voorzitter kunt u hier de scan inrichten. Kies eerst welke scan u wilt inrichten. Daarna kunt u de deelnemers aan de Implementatiescan-sessie uitnodigen om mee te doen. 
				<br>
				Dit proces wijst zichzelf.
			</p>
		</fieldset>
	</div>
</div>
<div class="row">
	<div class="large-4 columns">
		<h2>Overzicht scans</h2>
		<ul>
			@foreach($scans as $scan)
				<li><a href="{{ URL::route('scans.inrichten.invoerendeelnemers', $scan) }}"> {{ $scan->title }}, {{ $scan->regio }} </a></li>
			@endforeach
		</ul>
	</div>
</div>

@stop