@extends('layouts.scan')

@section('content')

<div class="row page-heading">
	<div class="large-12 ">
		<h1>Introductiefilm</h1>
		<fieldset class="fieldset">
			<p class=subheading>
				Bekijk de introductiefilm over het maken van de implementatiescan.
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
{{ $scan->scanmodel->video->adress }}
	<div class="videocontainer">
		<img src="{{ asset('img/' . $scan->scanmodel->video->adress) }}" class="videostill">
		<img src="{{ asset('img/youtubeplay.png')}}" class="youtubeplay">
	</div>
	<iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $video->adress }}?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>

@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('scans.kennismaken', $scan) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
