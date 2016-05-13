@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Gezamenlijke verbeteracties</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Tijdens de Implementatiescan-sessie zijn de volgende verbeteracties geformuleerd. Tijdens de tweede Werkagenda bijeenkomst wordt, met voorbereidend werk door de trekkers e.a., een definitieve keuze gemaakt voor de (formulering van) de verbeteracties die op de Werkagenda komen. Deze acties (met ruimte voor sub acties) kunt u hier invullen.
  			</p>

		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns actiepunten">

		@foreach($scan->scanmodel->themas as $thema)

			<div class="row">
				<div class="large-12">
					<div class="row">	
						<div class="large-3 actie-thema actie-thema-kop actiepunt-es columns"> {{ $thema->title }} </div>
						<div class="large-3 actie-thema actiepunt-es columns">Omschrijving</div>
						<div class="large-3 actie-thema actiepunt-es columns">Trekker</div>
						<div class="large-3 actie-thema actiepunt-es columns">Betrokkenen</div>

					</div>
					@foreach($thema->questions as $question)
						@if($question->verbeteractie == true)
							<div class="row actie-rij">	
								<div class="large-3 columns actie-omschrijving"> {{ $question->title }} </div>
								<div class="large-3 columns">
									<!-- 	actiepunt Form Input -->
									<div class="form-group">
										{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
									</div>	
								</div>
								<div class="large-3 columns">
									<!-- 	Trekker Form Input -->
									<div class="form-group">
									    {!! Form::select('trekker', $participantlist, 'selected', ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="large-3 columns">
									<!-- 	Trekker Form Input -->
									<span class="actiehelper">+</span>						
								</div>
							</div>
						@endif
					@endforeach
					<div class="row actie-rij">	
						<div class="large-3 columns actie-omschrijving">+</div>
						<div class="large-9 columns">

						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<div class="row">

	<div class="small-4 date__container">
	<label for="datepicker"><h4>Datum scan deel 2:</h4></label>
    <input type="text" id="datepicker">



	</div>

	<div class="large-12 columns thema-submit-container">

		<a class="button thema-submit" href="{{ URL::route('scans.actiesmailen', [$scan]) }}">Verbeteracties Mailen</a><br>
				
	</div>	


</div>
@stop

@section('additional-scripts')
    <script src="{{ URL::asset('js/pikaday.js') }}"></script>
    <script>

    var picker = new Pikaday(
    {
        field: document.getElementById('datepicker'),
        firstDay: 1,
        format: 'D MMM YY',
        minDate: new Date(2000, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020]
    });

    </script>

@stop

