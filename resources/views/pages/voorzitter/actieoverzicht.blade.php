@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Gezamenlijke verbeteracties</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Hieronder ziet u de 6 actiepunten die u in de voorgaande thema's hebt gekozen. Is er nog eentje die absoluut niet mag ontbreken? Eventueel kunt u eentje toevoegen of vervangen. 
  			</p>

		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns actiepunten">
		<div class="row">
			<div class="large-12">
				<div class="row">	
					<div class="large-3 actie-thema actie-thema-kop actiepunt-es columns">Focus op werk en talent</div>
					<div class="large-3 actie-thema actiepunt-es columns">Omschrijving</div>
					<div class="large-3 actie-thema actiepunt-es columns">Trekker</div>
					<div class="large-3 actie-thema actiepunt-es columns">Betrokkenen</div>

				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Werkend Leren</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['', 'piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<span class="actiehelper">+</span>
					</div>
				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Samenwerking Werkgevers</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['', 'piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
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

		<div class="row">
			<div class="large-12">
				<div class="row">	
					<div class="large-3 actie-thema actie-thema-kop actiepunt-es columns">Focus op werk en talent</div>
					<div class="large-3 actie-thema actiepunt-es columns">Omschrijving</div>
					<div class="large-3 actie-thema actiepunt-es columns">Trekker</div>
					<div class="large-3 actie-thema actiepunt-es columns">Betrokkenen</div>

				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Werkend Leren</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['', 'piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<span class="actiehelper">+</span>
					</div>
				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Samenwerking Werkgevers</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['', 'piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
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

		<div class="row">
			<div class="large-12">
				<div class="row">	
					<div class="large-3 actie-thema actie-thema-kop actiepunt-es columns">Focus op werk en talent</div>
					<div class="large-3 actie-thema actiepunt-es columns">Omschrijving</div>
					<div class="large-3 actie-thema actiepunt-es columns">Trekker</div>
					<div class="large-3 actie-thema actiepunt-es columns">Betrokkenen</div>

				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Werkend Leren</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['', 'piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<span class="actiehelper">+</span>
					</div>
				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Samenwerking Werkgevers</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['', 'piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
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
		<div class="row datumrow">
			<div class="large-4 datum">
				<!-- datum Form Input -->
				<div class="form-group">
					{!! Form::label('datum', 'Plan sessie twee', ['class' => 'datumlabel']) !!}
					{!! Form::date('datum', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>


	</div>

	<div class="large-12 columns thema-submit-container">

		<a class="button thema-submit" href="{{ URL::to('verbeteracties_mailen') }}">Verbeteracties Mailen</a><br>
				
	</div>	


</div>
@stop

@section('site-footer')


@stop

