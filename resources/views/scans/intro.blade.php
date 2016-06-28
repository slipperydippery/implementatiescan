@extends('layouts.scan')

@section('content')

<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Introductiefilm</h1>
			<fieldset class="fieldset large-8">
				<p class=subheading>
					Bekijk de introductiefilm over het maken van de implementatiescan.
				</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">
	<div class="videocontainer">
		<img src="{{ asset('img/' . $scan->scanmodel->video->adress) }}" class="videostill">
		<img src="{{ asset('img/youtubeplay.png')}}" class="youtubeplay">
	</div>
	<div class="large-8">
		<div class="flex-video widescreen ">
			<iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $video->adress }}?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
	
</div>

@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('scans.kennismaken', $scan) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
