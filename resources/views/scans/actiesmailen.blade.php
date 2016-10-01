@extends('layouts.scan', ['title' => 'verbeteracties mailen'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Verbeteracties Mailen</h1>
			<fieldset class="fieldset large-8">
	  			<legend>Verstuur de verbeteracties naar de deelnemers </legend>
				<p class=subheading>
					Nadat u de voorlopige verbeteracties heeft vastgesteld, worden deze met een druk op de knop automatisch verzonden naar de deelnemers.
				</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">

	<!-- CC Form Input -->
	<div class="form-group">
		{!! Form::label('cc', 'Onderwerp:') !!}
		{!! Form::text('cc', 'Verbeteracties Implementatiescan', ['class' => 'form-control']) !!}
	</div>

	<!-- CC Form Input -->
	<div class="form-group">
		{!! Form::label('to', 'Aan:') !!}
		{!! Form::text('to', $scan->beheerder->email, ['class' => 'form-control']) !!}
	</div>


	{!! Form::label('cc', 'CC:') !!}
	<textarea name="CC:" id="" cols="30" rows="8">
@foreach($scan->participants as $participant)<{{$participant->name_first}} {{$participant->name_last}}>{{$participant->email}},
@endforeach
	</textarea>

	<!-- Email tekst Form Input -->
	<div class="form-group">
		{!! Form::label('mail_intro', 'Email tekst:') !!}
		{!! Form::textarea('mail_intro', $emailtext, ['class' => 'form-control email_naar_participant']) !!}
	</div>
	<div class="verbeteractietext">
		{!! $verbeteractietext !!}
	</div>

	<a href="{{ URL::route('scans.verbeteracties_bedankt', $scan) }}" class="button float-right">Verzend verbeteracties</a>
</div>
@stop


