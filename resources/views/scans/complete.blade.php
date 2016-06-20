@extends('layouts.scan')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Bedankt!</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Er zijn geen vragen meer te beantwoorden. Ontzettend bedankt voor uw input, tot ziens bij de ImplementatieScan deel 2!
  			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">

	<div class="small-12 center">
		<a href="{{ URL::route('home') }}" class="button answered">
			Ga terug naar de Home pagina
		</a>

	</div>

</div>
@stop



@section('additional-scripts')


@stop