@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Werkagenda Samenstellen</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Commune iudicabit neglegentur mel et, vim hinc consetetur eu. Ei commune delicata per, est causae ancillae ut. No timeam praesent qui. An dicam hendrerit vis, cu cum diam corrumpit. Id his idque ullum nostro, mei minim postea debitis ea
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
							{!! Form::textarea('actiepunt', 'Omschrijving uit de vorige sessie', ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<span class="actiehelper">+</span>
					</div>
				</div>
			<div class="row actie-rij actie-rij__subactie">	
				<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">&bull; Hier is een subactie</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::text('actiepunt', 'Hier is een subactie omschrijving.', ['class' => 'form-control','placeholder' => 'actie omschrijving']) !!}
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
						
						<input type="date" class="smalldate">
					</div>
				</div>	
				<div class="row actie-rij actie-rij__subactie">	
					<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">+</div>
					<div class="large-9 columns">
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
				<div class="row actie-rij actie-rij__subactie">	
					<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">+</div>
					<div class="large-9 columns">
					</div>
				</div>	
			</div>
		</div>

<div class="row">
			<div class="large-12">
				<div class="row">	
					<div class="large-3 actie-thema actie-thema-kop actiepunt-es columns">Begeleiding op naar werk</div>
					<div class="large-3 actie-thema actiepunt-es columns">Omschrijving</div>
					<div class="large-3 actie-thema actiepunt-es columns">Trekker</div>
					<div class="large-3 actie-thema actiepunt-es columns">Betrokkenen</div>

				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Werkend Leren</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', 'Omschrijving uit de vorige sessie', ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<span class="actiehelper">+</span>
					</div>
				</div>
			<div class="row actie-rij actie-rij__subactie">	
				<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">&bull; Hier is een subactie</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::text('actiepunt', 'Hier is een subactie omschrijving.', ['class' => 'form-control','placeholder' => 'actie omschrijving']) !!}
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
						<input type="date" class="smalldate">
					</div>
				</div>	
				<div class="row actie-rij actie-rij__subactie">	
					<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">+</div>
					<div class="large-9 columns">
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
				<div class="row actie-rij actie-rij__subactie">	
					<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">+</div>
					<div class="large-9 columns">
					</div>
				</div>	
			</div>
		</div>


<div class="row">
			<div class="large-12">
				<div class="row">	
					<div class="large-3 actie-thema actie-thema-kop actiepunt-es columns">Kwaliteit van de samenwerking</div>
					<div class="large-3 actie-thema actiepunt-es columns">Omschrijving</div>
					<div class="large-3 actie-thema actiepunt-es columns">Trekker</div>
					<div class="large-3 actie-thema actiepunt-es columns">Betrokkenen</div>

				</div>
				<div class="row actie-rij">	
					<div class="large-3 columns actie-omschrijving">Werkend Leren</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::textarea('actiepunt', 'Omschrijving uit de vorige sessie', ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
						</div>	
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<div class="form-group">
						    {!! Form::select('trekker', ['piet', 'gerard'], 'selected', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="large-3 columns">
						<!-- 	Trekker Form Input -->
						<span class="actiehelper">+</span>
					</div>
				</div>
			<div class="row actie-rij actie-rij__subactie">	
				<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">&bull; Hier is een subactie</div>
					<div class="large-3 columns">
						<!-- 	actiepunt Form Input -->
						<div class="form-group">
							{!! Form::text('actiepunt', 'Hier is een subactie omschrijving.', ['class' => 'form-control','placeholder' => 'actie omschrijving']) !!}
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
						<input type="date" class="smalldate">
					</div>
				</div>	
				<div class="row actie-rij actie-rij__subactie">	
					<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">+</div>
					<div class="large-9 columns">
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
				<div class="row actie-rij actie-rij__subactie">	
					<div class="large-3 columns actie-omschrijving actie-omschrijving__subactie">+</div>
					<div class="large-9 columns">
					</div>
				</div>	
			</div>
		</div>

	
	</div>


</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('actieoverzicht') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop

