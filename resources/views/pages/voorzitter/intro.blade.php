@extends('layouts.master')

@section('content')

<div class="row page-heading">
	<div class="large-12 ">
		<h1>Introductie</h1>
		<fieldset class="fieldset">
  			<legend></legend>
			<p class=subheading>
				Hier een film ter introductie van de implementatiescan
			</p>
		</fieldset>
	</div>
</div>
<div class="row page-content">
	<iframe width="853" height="480" src="https://www.youtube.com/embed/P5_GlAOCHyE?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('wie') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
