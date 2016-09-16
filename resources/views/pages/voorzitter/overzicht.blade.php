@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Titel</h1>
		<fieldset class="fieldset">
  			<legend>Stukje</legend>
			<p class=subheading>
				Intro tekst
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
		content
</div>
<div class="row ">
	<div class="large-4 column end page-next">	
		<p>
			Heeft u uw gemeente gevonden? <br />	
			Dan kunt u door naar de...	
		</p>
		<a href="{{ URL::to('wie') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
