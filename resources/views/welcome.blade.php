@extends('layouts.master', ['title' => 'home'])

	<?php  
		$logged = false;
		$inrichten = false;
		$starten = false;
	?>
	@if(Auth::user())
		<?php
			$logged = true;
			if(count(Auth::user()->beheert)){
				$inrichten = true;
			}
			if(count(Auth::user()->scans)){
				$starten = true;
			}

		?>
	@endif
@section('content')

<div class="row page-heading">
	<div class="small-9 columns">
		<div class="row">
			<div class="small-12 ">
				<h1>Implementatiescan</h1>
				<h2>Focus op werk voor en talent van jongeren met LVB</h2>
				<fieldset class="fieldset">
					<p >
						<b>Gezamenlijke regionale Werkagenda</b><br>
						Jongeren met licht verstandelijke beperkingen (LVB) hebben het moeilijk op de arbeidsmarkt. De arbeidsmarkt  stelt steeds hogere eisen. En de WSW en de Wajong zijn geen alternatief meer. Dit leidt tot extra kans op werkloosheid en bijstand voor jongeren met LVB. VSO en PRO scholen willen jongeren zo goed mogelijk toerusten. Gemeenten willen dat ook: zij zijn onder de Participatiewet nu verantwoordelijk voor een voor hen nieuwe doelgroep. De Implementatiescan wil de bestaande kennis over kansvergroting ontsluiten: kennis omzetten in actie. Een regionale Werkagenda. De Implementatiescan als paperclip. In hechte verbindingen ligt de oplossing.
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
<div class="row page-content triblock--container">	
	<div class="small-9 columns">
		<div class="row">
			<div class="small-4 columns triblock">
				@if(!$logged)
					<a href="{{ URL::route('voorzitter.scans') }}" 
						role="button" 
						class="title_button has-tip muted"
						aria-haspopup="true" 
						data-disable-hover="false" 
						tabindex="1" title="Log in om scans in te kunnen richten"
					>
				@elseif($inrichten)
					<a href="{{ URL::route('voorzitter.scans') }}" 
						role="button" 
						class="title_button"
					>
				@else
					<a href="#" 
						role="button" 
						class="title_button muted has-tip"
						aria-haspopup="true" 
						data-disable-hover="false" 
						tabindex="1" title="U heeft geen scans om in te richten"
					>
				@endif
		    		<img src="{{asset('img/gearicon.png')}}">
					<span class="">Scan Inrichten </span>
					Voorzitter
				</a>
				<img src=" {{ asset('img/papertop.png') }} " class="paperclipper papertop ">
				<img src=" {{ asset('img/paperbottom.png') }} " class="paperclipper paperbottom">
			</div>
			<div class="small-4 columns triblock">
				@if(!$logged)
					<a href="{{ URL::route('scans.start') }}" 
						role="button" 
						class="title_button muted has-tip"
						aria-haspopup="true" 
						data-disable-hover="false" 
						tabindex="1" title="Log in om deel te nemen aan een scan"
					>
				@elseif($starten) 
					<a href="{{ URL::route('scans.start') }}" 
						role="button" 
						class="title_button"
					>
				@else
					<a href="#" 
						role="button" 
						class="title_button muted has-tip"
						aria-haspopup="true" 
						data-disable-hover="false" 
						tabindex="1" title="U heeft geen scans waar u aan kunt deelnemen"
					>
				@endif
		    		<img src="{{asset('img/scan.png')}}"><br>
					<span class="">Scan Starten </span>
					Deelnemer
				</a>
				<img src=" {{ asset('img/papertop.png') }} " class="paperclipper papertop ">
				<img src=" {{ asset('img/paperbottom.png') }} " class="paperclipper paperbottom">
			</div>
			<div class="small-4 columns end triblock">
				<a href="{{ URL::to('databank') }}" role="button" class="title_button">
		    		<img src="{{asset('img/books.png')}}"><br>
					<span class="">Kennisbank </span>
					Iedereen
				</a>
			</div>
		</div>
	</div>

</div>

@if(Auth::check())
	@if(count(Auth::user()->beheert->first()))
	<?php
		$beheerscan = Auth::user()->beheert->first();
	?>
	<div class="row page-content">
		<div class="small-4 colums">
			<h4>download videos:</h4>
			@foreach($beheerscan->scanmodel->themas as $thema )
				<a href="http://www.implementatiescan.nl/video/{{ $thema->video->download }}"> {{ $thema->video->title }} </a><br>
			@endforeach
		</div>
	</div>
	@endif
@endif



@stop
