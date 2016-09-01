@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Kennisbank</h1>
		<fieldset class="fieldset">
  			<legend>Een weelde aan informatie</legend>
			<p class=subheading>
				Hieronder vindt u informatie over de succesfactoren voor het begeleiden van jongeren met LVB naar werk. <br>
				Kijk gerust rond tussen de praktijkvoorbeelden, tools/interventies en hyperlinks die inspirerend kunnen zijn om mee te nemen voor het verbeteren van de situatie in uw omgeving. 
			</p>
		</fieldset>
	</div>
</div>


<div class="row page-content">
	<div class="large-8 columns">
		
	</div>
	<div class="large-4 columns">
		<!-- zoek Form Input -->
		<div class="searchfield">
			{!! Form::text('zoek', null, ['class' => 'form-control', 'placeholder' => 'zoek']) !!}
		</div>
	</div>
	</div>
	
<div class="row databank">
	<div class="large-12">
		<div class="row succesfactorrow">
			<div class="large-2 columns columnhead">
				Naam
			</div>
			<div class="large-8 columns columnhead">
				Beschrijving
			</div>
			<div class="large-2 columns columnhead">
				Link
			</div>
		</div>
		<div class="row succesfactorrow">
			<div class="large-2 columns ">
				Dariuz works wegwijzer
			</div>
			<div class="large-8 columns ">
				<div class="large-12">De Dariuz Works Wegwijzer maakt het mogelijk slimme beleidskeuzes te maken ten aanzien van alle cliënten in het bestand. De Wegwijzer geeft op een methodische manier inzicht in het arbeidspotentieel van het individu en de totale populatie. U kunt daarmee op basis van inzicht keuzes maken op welke manier energie en middelen zo efficiënt en effectief mogelijk geïnvesteerd kunnen worden.
				</div>

			</div>
			<div class="large-2 columns ">
				<div class="large-12"> <a href="http://www.dariuz.nl/dariuz-works/intake-matching/dariuz-works-wegwijzer/">website</a></div>
			</div>
		</div>

		<div class="row succesfactorrow">
			<div class="large-2 columns ">
				Dariuz works wegwijzer
			</div>
			<div class="large-8 columns ">
				<div class="large-12">De Dariuz Works Wegwijzer maakt het mogelijk slimme beleidskeuzes te maken ten aanzien van alle cliënten in het bestand. De Wegwijzer geeft op een methodische manier inzicht in het arbeidspotentieel van het individu en de totale populatie. U kunt daarmee op basis van inzicht keuzes maken op welke manier energie en middelen zo efficiënt en effectief mogelijk geïnvesteerd kunnen worden.
				</div>

			</div>
			<div class="large-2 columns ">
				<div class="large-12">website</div>
			</div>
		</div>

		<div class="row succesfactorrow">
			<div class="large-2 columns ">
				Dariuz works wegwijzer
			</div>
			<div class="large-8 columns ">
				<div class="large-12">De Dariuz Works Wegwijzer maakt het mogelijk slimme beleidskeuzes te maken ten aanzien van alle cliënten in het bestand. De Wegwijzer geeft op een methodische manier inzicht in het arbeidspotentieel van het individu en de totale populatie. U kunt daarmee op basis van inzicht keuzes maken op welke manier energie en middelen zo efficiënt en effectief mogelijk geïnvesteerd kunnen worden.
				</div>

			</div>
			<div class="large-2 columns ">
				<div class="large-12">website</div>
			</div>
		</div>
	</div>
</div>

</div>
@stop

