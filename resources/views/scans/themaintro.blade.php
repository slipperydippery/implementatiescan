@extends('layouts.master')

@section('content')

<div class="row page-heading">
	<div class="large-12 ">
		<h1> Thema {{ $thema_nr }}: {{ $thema->title }} </h1>
		<fieldset class="fieldset">
			<p class=subheading>
				Bekijk de korte film over  {{ $thema->title }} .
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
	<iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $thema->video->adress }}?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	

		<a href="{{ URL::route('scans.director', [$scan, $thema_nr, 1]) }}" class="button button-next">Volgende Stap</a>
	</div>

</div>

@stop
