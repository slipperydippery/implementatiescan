@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="small-9 columns">
		<div class="row">
			<div class="small-12 ">
				<h1>Implementatiescan</h1>
				<h2>Focus op werk voor en talent van kwetsbare jongeren</h2>
				<fieldset class="fieldset">
					<p >
						<b>Gezamenlijke regionale Werkagenda</b><br>
						Jongeren met licht verstandelijke beperkingen (LVB) hebben het moeilijk op de arbeidsmarkt. De arbeidsmarkt  stelt steeds hogere eisen. En de WSW en de Wajong zijn geen alternatief meer. Dit leidt tot extra kans op werkloosheid en bijstand voor kwetsbare jongeren. VSO en PRO scholen willen jongeren zo goed mogelijk toerusten. Gemeenten willen dat ook: zij zijn onder de Participatiewet nu verantwoordelijk voor een voor hen nieuwe doelgroep. De Implementatiescan wil de bestaande kennis over kansvergroting ontsluiten: kennis omzetten in actie. Een regionale Werkagenda. De Implementatiescan als paperclip. In hechte verbindingen ligt de oplossing.
						<br><br>
						<b>Aan tafel</b><br>
						We weten veel over wat werkt om de kansen voor jongeren in het VSO en PRO te vergroten. Management en beleid van scholen, gemeenten en andere netwerkpartners zijn verantwoordelijk voor het scheppen van goede randvoorwaarden voor de uitvoering binnen en tussen hun organisaties. Anders maken we het moeilijk voor docenten, klantmanagers en begeleiders om hun werk goed en efficiënt te kunnen doen. Het kan zoveel beter. Daarom om tafel. In open dialoog kansen benoemen en acties afspreken.
					</p>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="small-3 columns">
	</div>
</div>
<div class="row triblock--container">	
	<div class="small-9 columns">
		<div class="row">
			<div class="small-4 columns triblock">
				<a href="{{ URL::to('inlog_voorzitter') }}" role="button" class="title_button">
		    		<img src="{{asset('img/gearicon.png')}}">
					<span class="">Scan Inrichten </span>
				</a>
			</div>
			<div class="small-4 columns triblock">
				<a href="{{ URL::route('scans.intro', [2]) }}" role="button" class="title_button">
		    		<img src="{{asset('img/scan.png')}}"><br>
					<span class="">Scan Starten </span>
				</a>
			</div>
			<div class="small-4 columns end triblock">
				<a href="{{ URL::to('databank') }}" role="button" class="title_button">
		    		<img src="{{asset('img/books.png')}}"><br>
					<span class="">Databank </span>
				</a>
			</div>
		</div>
	</div>

</div>



@stop
