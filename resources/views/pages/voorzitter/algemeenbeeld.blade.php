@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Algemeen beeld</h1>
		<fieldset class="fieldset">
  			<legend>Doel</legend>
			<p class=subheading>
				Geef aan met de slider in algemene zin: hoe goed is onze huidige aanpak en samenwerking om jongeren met LVB aan het werk te helpen? 
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns pre-resultaat">

		<a class="button" href="{{ URL::to('algemeenbeeldresultaat') }}">door naar resultaat</a><br>
		<i>(dit gaat later automatisch zodra iedereen een antwoord heeft ingevuld)</i>

		
	</div>
</div>


@stop
