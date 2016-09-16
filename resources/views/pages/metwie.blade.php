@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Met wie aan tafel</h1>
		<fieldset class="fieldset">
  			<legend>Even controleren</legend>
			<p class=subheading>
				Hieronder kunt u controleren of uw gegevens kloppen en die eventueel nog aanpassen.
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-4 columns submitted-users">
		<h4>Uw gegevens: </h4>
		<!-- Partij Form Input -->
		<div class="form-group">
			{!! Form::label('partij', 'Partij:') !!}
			{!! Form::text('partij', 'overig', ['class' => 'form-control']) !!}
		</div>

		<!-- Naam Form Input -->
		<div class="form-group">
			{!! Form::label('naam', 'Naam:') !!}
			{!! Form::text('naam', 'Gerrit Monroe', ['class' => 'form-control']) !!}
		</div>

		<!-- Organisatie Form Input -->
		<div class="form-group">
			{!! Form::label('organisatie', 'Organisatie:') !!}
			{!! Form::text('organisatie', 'UWV', ['class' => 'form-control']) !!}
		</div>

		<!-- Uw email adress Form Input -->
		<div class="form-group">
			{!! Form::label('email', 'Uw email adress:') !!}
			{!! Form::text('email', 'gerrit@uwv.nl', ['class' => 'form-control']) !!}
		</div>


		
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('wacht_pre_algemeen') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
