@extends('layouts.master', ['title' => ' kennisbank'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Kennisbank</h1>
			<fieldset class="fieldset large-8">
			<legend>Een weelde aan informatie</legend>
	  			<p class="subheading subheading__time">
	  				Laat u inspireren en maak gebruik van eerder ontwikkelde programma’s en instrumenten. <br><br>

Hieronder vindt u informatie over de succesfactoren voor het begeleiden van jongeren met LVB naar werk. Experts hebben aangegeven dat deze veelal ook gelden voor andere kwetsbare jongeren. Kijk gerust rond tussen de instrumenten/tools, programma’s en praktijkvoorbeelden. En zie hoe je via de opgenomen hyperlinks in contact komt met andere kennisbanken en inspirerende omgevingen, die scholen, gemeenten en partners ook op weg kunnen helpen om jongeren zo goed mogelijk een werkende toekomst te geven. 

	  			</p>
			</fieldset>
		</div>
	</div>
</div>


<div class="row page-content">
	<div class="large-12 columns">
		<ul class="tabs" data-tabs id="example-tabs">
		  	<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Instrumenten</a></li>
		  	<li class="tabs-title"><a href="#panel2">Programma's</a></li>
		  	<li class="tabs-title"><a href="#panel3">Praktijkvoorbeelden</a></li>
		  	<li class="tabs-title"><a href="#panel4">PDFs</a></li>
		</ul>
		<div class="tabs-content" data-tabs-content="example-tabs">
		  	<div class="tabs-panel is-active" id="panel1">
				<instrumenten></instrumenten>
				<div class="row">
					@if(Auth::check())
						@if(Auth::user()->hasRole('admin'))
							<a href=" {{ route('instruments.create') }} " class="button float-right">Voeg een instrument toe</a>
						@endif
					@endif
				</div>
		  	</div>
		  	<div class="tabs-panel" id="panel2">
		    	<programmas></programmas>
				<div class="row">
					@if(Auth::check())
						@if(Auth::user()->hasRole('admin'))
							<a href=" {{ route('programmas.create') }} " class="button float-right">Voeg een programma toe</a>
						@endif
					@endif
				</div>
		  	</div>
		  	<div class="tabs-panel" id="panel3">
		    	<praktijkvoorbeelds></praktijkvoorbeelds>
				<div class="row">
					@if(Auth::check())
						@if(Auth::user()->hasRole('admin'))
							<a href=" {{ route('praktijkvoorbeelds.create') }} " class="button float-right">Voeg een praktijkvoorbeeld toe</a>
						@endif
					@endif
				</div>
		  	</div>
		  	<div class="tabs-panel" id="panel4">
		    	<pdfs></pdfs>
				<div class="row">
					@if(Auth::check())
						@if(Auth::user()->hasRole('admin'))
							<a href=" {{ route('praktijkvoorbeelds.create') }} " class="button float-right">Voeg een praktijkvoorbeeld toe</a>
						@endif
					@endif
				</div>
		  	</div>
		</div>
	</div>
	




</div>



	
@stop


