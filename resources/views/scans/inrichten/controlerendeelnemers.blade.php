@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Controleren deelnemersgegevens</h1>
		<fieldset class="fieldset">
  			<legend>Dit zijn de geselecteerde netwerkpartners</legend>
			<p class=subheading>
				Hieronder ziet u het overzicht van de door u geselecteerde sleutelpersonen binnen uw (gewenste) netwerk. Controleer of het overzicht compleet is (maximaal 12) en of de gegevens juist zijn. De scan is nu bijna klaar voor gebruik. En dan kunt u via het systeem alle geselecteerde deelnemers uitnodigen. <br><br>

Op de volgende pagina staat een email klaar die u eventueel kunt aanpassen en aan de deelnemers kunt versturen

			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
		<h4>Aangemelde Deelnemers: </h4>

		@foreach($scan->instanties as $instantie)
			@foreach($instantie->users as $participant)
				<div class="large-2 column submitted-user">
					<img src="{{asset('img/user.png')}}"> <br><br>
					<span class="first"> {{ $participant->name_first ? $participant->name_first : "---" }} </span> 
					<span class="last"> {{ $participant->name_last ? $participant->name_last : "---" }} </span> 
					<span class="functie"> {{ $instantie->title }} </span>
					<span class="close_submitted_user">x</span>
				</div>
			@endforeach
		@endforeach

		<div class="large-2 column end submitted-user">
			<span class="add_submitted_user">+</span>
		</div>

		
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column page-next">	

		<a href="{{ URL::route('scans.uitnodigendeelnemers', $scan) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
