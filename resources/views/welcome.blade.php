@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Implementatiescan</h1>
		<h2>de paperclip van school naar werk</h2>
		<fieldset class="fieldset large-8">
			<p >
				<b>Regionale werk agenda</b><br>
				Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
				<br><br>
<b>Aan tafel</b><br>
Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.
			</p>
		</fieldset>
	</div>
</div>
<div class="row triblock--container">	
	<div class="large-4 columns triblock">
		<a href="{{ URL::to('inlog_voorzitter') }}">Scan Inrichten >></a>
	</div>
	<div class="large-4 columns triblock">
		<a href="{{ URL::to('intro') }}">Scan Uitvoeren >></a>
	</div>
	<div class="large-4 columns triblock">	
		<a href="{{ URL::to('databank') }}">Databank >></a>
	</div>
</div>



@stop
