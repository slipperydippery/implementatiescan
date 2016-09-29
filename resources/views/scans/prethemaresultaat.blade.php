@extends('layouts.scan', ['title' => 'thema ' . $thema_nr . ' pre-resultaat'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Thema {{ $thema_nr }} : resultaat</h1>
			<h2> {{ $thema->title }} </h2>
			<fieldset class="fieldset large-8">
	  			<p class="subheading subheading__time">
	  				Hieronder kunt u zien wat iedereen zojuist heeft ingevuld. Wat valt u op? Bespreek de resultaten de komende 15 minuten, en selecteer dan de in uw ogen belangrijkste 2 verbeterpunten.
	  			</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">


	<pre-thema-resultaat></pre-thema-resultaat>


</div>
@stop



@section('additional-scripts')


@stop