@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Even wachten	</h1>
		<fieldset class="fieldset">
  			<legend></legend>
			<p class=subheading>
				Het volgende scherm verschijnt zo meteen vanzelf.
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns pre-resultaat">

		<a class="button" href="{{ URL::to('algemeenbeeld_participant') }}">volgende scherm</a><br>
		<i>(dit gaat later automatisch)</i>

		
	</div>
</div>

@stop
