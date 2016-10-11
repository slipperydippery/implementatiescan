@extends('layouts.scan', ['title' => 'thema ' . $thema_nr . ' resultaat'])

@section('content')

<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Thema {{ $thema_nr }} : resultaat</h1>
			<h2> {{ $thema->title }} </h2>
			<fieldset class="fieldset large-8">
	  			<p class="subheading subheading__time">
	  				Op het centrale scherm ziet u de resultaten zodra iedereen alle vragen van het thema heeft ingevuld. Na het bespreken van de resultaten en het kiezen van de belangrijkste verbeterpunten kunt u door gaan naar het volgende thema.  
	  			</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">
	<span class="unanswered">Op het centrale scherm kunt u de gemeenschappelijke resultaten bekijken. </span>

</div>
@stop


@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('scans.director', [$scan, $thema_nr, ($question_nr + 1)]) }}" class="button button-next">
			Volgende stap
		</a>
	</div>
</div>
@stop

@section('additional-scripts')

@stop