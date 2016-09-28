@extends('layouts.beheer')

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>MAILEN VAN UITNODIGING </h1>
			<fieldset class="fieldset large-8">
	  			<legend>Verstuur nu een email naar de deelnemers die u heeft aangemeld</legend>
				<p class=subheading>
					Elke deelnemer die u heeft aangemeld krijgt de onderstaande email. U kunt de email eventueel aanpassen en/of uw eigen afzender toevoegen. Elke deelnemer krijgt in de email een eigen gebruikersnaam en inlog. Hiermee kan de deelnemer ter voorbereiding van de sessie alvast inloggen. <br><br>

					U ontvangt zelf een kopie van deze mail en de deelnemers die u heeft aangemeld.
				</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">

	<div class="large-12">
		

		{!! Form::open(['route' => ['senduitnodiging', $scan->id]]) !!}
			<!-- CC Form Input -->
			<div class="form-group">
				{!! Form::label('subject', 'Onderwerp:') !!}
				{!! Form::text('subject', 'Uitnodiging bijeenkomst Implementatiescan Werkagenda ', ['class' => 'form-control']) !!}
			</div>


			{!! Form::label('Aan', 'Aan:') !!}
				@foreach($scan->participants as $participant)
					{!! Form::checkbox('recipients[]', $participant->id, true) !!} {{ $participant->name_first }} {{ $participant->name_last }} - {{ $participant->email }}, <br>

				@endforeach
				<br>
			
			<!-- Email tekst Form Input -->
			<div class="form-group">
				{!! Form::label('mail_intro', 'Email tekst:') !!}
				
				&nbsp;&nbsp;Beste [deelnemer],
				<br><br>
				<?php 
					$username =  Auth::user()->name_first . ' ' . Auth::user()->name_last;
					$emailtext = "Graag wil ik je uitnodigen voor een bijeenkomst om met elkaar in gesprek te gaan over het vergroten van kansen op de arbeidsmarkt voor jongeren met LVB. Namelijk aan de hand van de Implementatiescan, een landelijke kennis- en procestool die regionale organisaties helpt om gezamenlijk de sterktes en zwaktes in de huidige aanpak en noodzakelijke verbeteracties te bepalen.  Deze scan is ontwikkeld op basis van de state of the art kennis over wat werkt. In opdracht van LECSO en in samenwerking met onder andere Divosa, UWV, MEE Nederland en SBB, die toepassing van de scan van harte aanbevelen. 

In alle regio`s gaan VSO-scholen daartoe in gesprek met gemeenten en andere verantwoordelijke organisaties, zoals SBB, MEE, werkgevers en UWV. Graag zou ik namens de scholen ook met jou in gesprek willen om gezamenlijk de analyse van verbeterkansen in onze regio te maken. Tijdens een Implementatiescan-sessie. Ik stuur je hierbij alvast jouw eigen inloggegevens zodat je alvast kunt kijken hoe de scan werkt. En ik neem binnenkort contact met je op om een afspraak in te plannen.

Met vriendelijke groeten,

" . $username . ",
VSO School";
				?>
				{!! Form::textarea('body', $emailtext, ['class' => 'form-control email_naar_participant', 'rows' => '14']) !!}
			</div>

			<!-- Add Submit Field -->
			<div class="form-group">
			    {!! Form::submit('Verzend uitnodiging', ['class' => 'button form-control float-right']) !!}
			</div>
		{!! Form::close() !!}
	</div>

</div>
@stop


