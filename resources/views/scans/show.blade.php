@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>{{ $scan->title }} </h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				bla

  			</p>

		</fieldset>
	</div>
</div>



<div class="row page-content">
	<div class="large-12 columns">
		@foreach($scan->themas as $thema)
			{{ $thema->title }} <br>
		@endforeach

		{!! Form::open(['route' => 'scans.addthemas']) !!}
			<!-- Add Thema Form Input -->
			<div class="form-group">
			    {!! Form::label('thema_id', 'Voeg Thema toe:') !!}
			    {!! Form::select('thema_id', $themalist, null, ['class' => 'form-control']) !!}
			</div>

			<!-- Hidden scan_id Type Form Input -->
			{!! Form::hidden('scan_id', $scan->id, null) !!}
			
			    
			<!-- Add Submit Field -->
			<div class="form-group">
			    {!! Form::submit('add Thema', ['class' => 'btn form-control']) !!}
			</div>
		{!! Form::close() !!}

	</div>
</div>



@stop



