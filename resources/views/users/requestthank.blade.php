@extends('layouts.master', ['title' => 'Verbeteracties Verzonden'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Verzoek gemaild</h1>
			<fieldset class="fieldset">
	  			<p class="subheading subheading__time">
	  				Uw verzoek is verstuurd per email. 
	  			</p>
			</fieldset>
		</div>
	</div>
</div>

@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 columns page-next">	
		<a href="{{ URL::route('home') }}" class="button answered">
			Home
		</a>
	</div>
</div>


@stop