@extends('layouts.master', ['title' => 'Overzicht van uw scans'])

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
		@foreach($scans as $scan)
			<h5>{{ $scan->title }}, {{ $scan->regio }}</h5>
			<ul>
				<li><a href="{{ URL::route('scans.intro', $scan) }}" class="visible_link">{{ $scan->title }} - scan deel 1</a></li>
				<li><a href="{{ URL::route('scans.werkagenda', $scan) }}" class="visible_link">{{ $scan->title }} - scan deel 2</a></li>
				
			</ul>
		@endforeach

	</div>
</div>


@stop
