@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema {{ $thema->title }} Video</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Edit de thema video

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns">
		{!! Form::open(['route' => ['themas.updatevideo', $thema]]) !!}
			<!-- Video Form Input -->
			<div class="form-group">
			    {!! Form::label('video_id', 'Video:') !!}
			    {!! Form::select('video_id', $videolist, $thema->video_id, ['class' => 'form-control']) !!}
			</div>

			<!-- Add Submit Field -->
			<div class="form-group">
			    {!! Form::submit('pas aan', ['class' => 'btn form-control']) !!}
			</div>
		{!! Form::close() !!}

	</div>
</div>

@stop


