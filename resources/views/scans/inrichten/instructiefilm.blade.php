@extends('layouts.scan', ['title' => 'instructiefilm'])

@section('content')

<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Instructiefilm voorzitter</h1>
			<fieldset class="fieldset large-8">
				<p class=subheading>
					Bekijk hieronder de instructiefilm om de implementatiescan in te richten. In deze film laten wij u stap voor stap zien hoe de implementatiescan werkt.
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
			<iframe width="853" height="480" src="https://www.youtube.com/embed/yoP5QS2XJIE?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>


@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('scans.inrichten.invoerendeelnemers', $scan) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
