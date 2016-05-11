@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Gezamenlijke verbeteracties</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hieronder ziet u de 6 actiepunten die u in de voorgaande thema's hebt gekozen. Is er nog eentje die absoluut niet mag ontbreken? Eventueel kunt u eentje toevoegen of vervangen. 
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
					<div class="row actie-rij">	
						<div class="large-3 columns actie-omschrijving"> {{ $thema->questions->first()->title }} </div>
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
					<div class="row actie-rij">	
						<div class="large-3 columns actie-omschrijving"> {{ $thema->questions->last()->title }} </div>
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

