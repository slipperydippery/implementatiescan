@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Werkagenda Samenstellen</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Tijdens de Implementatiescan-sessie hebben we de volgende verbeterpunten vastgesteld. Deze vormden het huiswerk voor de door ons benoemde trekkers in samenwerking met anderen, ter voorbereiding op de, tweede en afrondende Werkagenda sessie. Vandaag bespreken we het huiswerk en stellen we definitieve verbeteracties vast, die tezamen onze gezamenlijke Werkagenda vormen. Vooringevuld zijn de voorlopige verbeteracties uit de eerste, Implementatiescan sessie. Vandaag maken we deze ‘SMART’. Ook kunnen eventueel sub acties worden geformuleerd (bijvoorbeeld als er twee verbeteracties ter realisatie van één Succesfactor nodig zijn).
  			</p>

		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns actiepunten">
		<acties></acties>
	
	
	</div>

	<div class="large-12 columns thema-submit-container">

		<a class="button thema-submit" href="{{ URL::route('scans.werkagendamailen', [$scan]) }}">Werkagenda Mailen</a><br>
				
	</div>	

</div>
@stop


