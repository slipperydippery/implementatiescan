@extends('layouts.beheer', ['title' => 'controleren deelnemersgegevens'])

@section('content')
<div class="page-heading--container">
	<div class="row page-heading">
		<div class="large-12 ">
			<h1>Controleren deelnemersgegevens</h1>
			<fieldset class="fieldset large-8">
	  			<legend>Dit zijn de geselecteerde netwerkpartners</legend>
				<p class=subheading>
					Hieronder ziet u het overzicht van de door u geselecteerde sleutelpersonen binnen uw (gewenste) netwerk. Controleer of het overzicht compleet is (bij voorkeur maximaal 12) en of de gegevens juist zijn. De scan is nu bijna klaar voor gebruik. Op de volgende pagina staat een email met een uitnodiging klaar die u eventueel kunt aanpassen en aan de deelnemers kunt versturen. 

				</p>
			</fieldset>
		</div>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
		<div class="row">
			<div class="large-12">
				<h4>Aangemelde Deelnemers: </h4>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
			@if ($errors->any())
				<div class="alert callout" data-closable>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }} </li>
						@endforeach
					</ul>
					<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
					    <span aria-hidden="true">&times;</span>
					  </button>
				</div>
			@endif
				<controleren-deelnemers></controleren-deelnemers>

					@if(count(Auth::user()->beheert->intersect([$scan])))
						<div class="large-2 column end submitted-user">
							<a data-open="addParticipantModal"> <span class="add_submitted_user">+</span> </a>
							<div class="reveal" id="addParticipantModal" data-reveal>
							 	<h1>Voeg gebruiker toe</h1>

								{!! Form::open(['route' => ['scans.addparticipant', $scan]]) !!}
									<!-- Voornaam Form Input -->
									<div class="form-group">
										{!! Form::label('name_first', 'Voornaam:') !!}
										{!! Form::text('name_first', null, ['class' => 'form-control']) !!}
									</div>

									<!-- Achternaam Form Input -->
									<div class="form-group">
										{!! Form::label('name_last', 'Achternaam:') !!}
										{!! Form::text('name_last', null, ['class' => 'form-control']) !!}
									</div>

									<!-- Email Form Input -->
									<div class="form-group">
										{!! Form::label('email', 'Email:') !!}
										{!! Form::text('email', null, ['class' => 'form-control']) !!}
									</div>

									<!-- Instantie Form Input -->
									<div class="form-group">
									    {!! Form::label('instantie', 'Instantie:') !!}
									    {!! Form::select('instantie', $instantieoptions, 'none', ['class' => 'form-control']) !!}
									</div>

									<!-- Hidden prescan Type Form Input -->
									{!! Form::hidden('prescan', true, null) !!}

									<!-- Add Submit Field -->
									<div class="form-group">
									    {!! Form::submit('Voeg toe', ['class' => 'button form-control']) !!}
									</div>
								{!! Form::close() !!}

								<button class="close-button" data-close aria-label="Close reveal" type="button">
								    <span aria-hidden="true">&times;</span>
								 </button>
							</div>

						</div>
					@endif

			</div>
		</div>
		
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column page-next">	

		<a href="{{ URL::route('scans.inrichten.uitnodigendeelnemers', $scan) }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
