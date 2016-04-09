@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Who is scanning?</h1>
		<p class=subheading>Om een goed beeld te krijgen over uw school willen we graag weten in welke school uw regio zich bevind. </p>
	</div>
</div>
<div class="row page-content">
	<div class="large-7 columns kaart ">
		<h4>1. Selecteer een provincie:</h4>
		{!! HTML::image('/img/kaart.png') !!}
	</div>
	<div class="large-5 columns verfijning">
		<h4>2. Selecteer één of meerdere gemeenten</h4>
<input type="checkbox"> Aalsmeer<br>
<input type="checkbox"> Alkmaar<br>
<input type="checkbox"> Amstelveen<br>
<input type="checkbox"> Amsterdam<br>
<input type="checkbox"> Beemster<br>
<input type="checkbox"> Bergen<br>
<input type="checkbox"> Beverwijk<br>
<input type="checkbox"> Blaricum<br>
<input type="checkbox"> Bloemendaal<br>
<input type="checkbox"> Castricum<br>
<input type="checkbox"> Den Helder<br>
<input type="checkbox"> Diemen<br>
<input type="checkbox"> Drechterland<br>
<input type="checkbox"> Edam-Volendam<br>
<input type="checkbox"> Enkhuizen<br>
<input type="checkbox"> Gooise Meren<br>
<input type="checkbox"> Haarlem<br>
<input type="checkbox"> Haarlemmerliede en Spaarnwoude<br>
<input type="checkbox"> Haarlemmermeer<br>
<input type="checkbox"> Heemskerk<br>
<input type="checkbox"> Heemstede<br>
<input type="checkbox"> Heerhugowaard<br>
<input type="checkbox"> Heiloo<br>
<input type="checkbox"> Hilversum<br>
<input type="checkbox"> Hollands Kroon<br>
<input type="checkbox"> Hoorn<br>
<input type="checkbox"> Huizen<br>
<input type="checkbox"> Koggenland<br>
<input type="checkbox"> Landsmeer<br>
<input type="checkbox"> Langedijk<br>
<input type="checkbox"> Laren<br>
<input type="checkbox"> Medemblik<br>
<input type="checkbox"> Oostzaan<br>
<input type="checkbox"> Opmeer<br>
<input type="checkbox"> Ouder-Amstel<br>
<input type="checkbox"> Purmerend<br>
<input type="checkbox"> Schagen<br>
<input type="checkbox"> Stede Broec<br>
<input type="checkbox"> Texel<br>
<input type="checkbox"> Uitgeest<br>
<input type="checkbox"> Uithoorn<br>
<input type="checkbox"> Velsen<br>
<input type="checkbox"> Waterland<br>
<input type="checkbox"> Weesp<br>
<input type="checkbox"> Wijdemeren<br>
<input type="checkbox"> Wormerland<br>
<input type="checkbox"> Zaanstad<br>
<input type="checkbox"> Zandvoort<br>
	</div>
</div>
<div class="row ">
	<div class="large-4 column end page-next">	
		<p>
			Heeft u uw gemeente gevonden? <br />	
			Dan kunt u door naar de...	
		</p>
		<a href="{{ URL::to('metwie') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
