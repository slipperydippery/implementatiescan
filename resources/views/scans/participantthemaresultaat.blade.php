@extends('layouts.scan')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Participant Thema {{ $thema_nr }} : resultaat</h1>
		<h2> {{ $thema->title }} </h2>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Op het centrale scherm ziet u de resultaten zodra iedereen alle vragen van het thema heeft ingevuld. Na het bespreken van de resultaten en het kiezen van de belangrijkste verbeterpunten kunt u door gaan naar het volgende thema.  
  			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
<div class="small-12 center">
	<a href="{{ URL::route('scans.director', [$scan, $thema_nr, ($question_nr + 1)]) }}" class="button answered">
		Ga door naar het volgende thema
	</a>

</div>
</div>
@stop



@section('additional-scripts')

@stop