@extends('layouts.master')

@section('content')

<div class="row page-heading">
	<div class="large-12 ">
		<h1>Thema I: Vraag 4</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="prequestion">
  				Geef aan met de slider hoe U denkt over de volgende vraag:
  			</p>
			<p class=subheading>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec dui auctor ante vulputate efficitur ut id nisi?
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
</div>
<div class="row ">
	<div class="large-4 column end page-next">	
		<p>
			Heeft u uw gemeente gevonden? <br />	
			Dan kunt u door naar de...	
		</p>
		<a href="{{ URL::to('thema1vraag5') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
