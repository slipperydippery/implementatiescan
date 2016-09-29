@extends('layouts.admin', ['title' => 'bewerk scan ' . $scan->title])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Pas de scan aan</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-8 submitted-users">

		{!! Form::open(['route' => ['scans.updatetitle', $scan]]) !!}
			{!! Form::label('title', 'Naam:') !!}
			<div class="row">
				<div class="small-10 columns">
						{!! Form::text('title', $scan->title, ['class' => 'form-control']) !!}
				</div>
				<div class="small-2 columns">
					<div class="form-group">
					    {!! Form::submit('pas aan', ['class' => 'button form-control']) !!}
					</div>
								
				</div>
			</div>
		{!! Form::close() !!}

		{!! Form::open(['route' => ['scans.updateregio', $scan]]) !!}
			{!! Form::label('regio', 'Regio:') !!}
			<div class="row">
				<div class="small-10 columns">
					{!! Form::text('regio', $scan->regio, ['class' => 'form-control']) !!}
				</div>			
				<div class="small-2 columns">
					<div class="form-group">
					    {!! Form::submit('pas aan', ['class' => 'button form-control']) !!}
					</div>
				</div>
			</div>
		{!! Form::close() !!}

		{!! Form::open(['route' => ['scans.updatebeheerder', $scan]]) !!}
			{!! Form::label('beheerder_email', 'Email adress beheerder:') !!}
			<div class="row">
				<div class="small-10 columns">
					{!! Form::text('beheerder_email', $scan->beheerder->email, ['class' => 'form-control']) !!}
				</div>		
				<div class="small-2 columns">
					<div class="form-group">
					    {!! Form::submit('pas aan', ['class' => 'button form-control']) !!}
					</div>
				</div>
			</div>
		{!! Form::close() !!}


		{!! Form::open(['route' => ['scans.updateinstantie', $scan]]) !!}
		    {!! Form::label('instantie', 'Instantie van beheerder:') !!}
		    <div class="row">
		    	<div class="small-10 columns">
				    {!! Form::select('instantie', $scanmodels, $scan->beheerder->instanties->intersect($scan->instanties)->first()->id, ['class' => 'form-control']) !!}
		    	</div>
				<div class="small-2 columns">
					<div class="form-group">
					    {!! Form::submit('pas aan', ['class' => 'button form-control']) !!}
					</div>
				</div>
		    	
		    </div>
		{!! Form::close() !!}
	</div>


	<br>
		<a href=" {{ URL::route('scans.index') }} " class="button"> << Terug naar overzicht  </a>
</div>

@stop



@section('site-footer')


@stop