@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Edit</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Maak een nieuwe video
  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
	
		{!! Form::model($video, ['route' => ['videos.update', $video->id]]) !!}
			@include('videos.partials.form', ['submittext' => 'Sla veranderingen op'])
		{!! Form::close() !!}

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


