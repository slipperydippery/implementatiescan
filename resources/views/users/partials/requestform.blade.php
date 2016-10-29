<!-- Naam Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Naam school:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Regio Form Input -->
<div class="form-group">
	{!! Form::label('regio', 'Regio / vestigingsplaats:') !!}
	{!! Form::text('regio', null, ['class' => 'form-control']) !!}
</div>

<!-- Voornaam voorzitter Form Input -->
<div class="form-group">
	{!! Form::label('name_first', 'Voornaam voorzitter:') !!}
	{!! Form::text('name_first', null, ['class' => 'form-control']) !!}
</div>

<!-- Achternaam voorzitter Form Input -->
<div class="form-group">
	{!! Form::label('name_last', 'Achternaam voorzitter:') !!}
	{!! Form::text('name_last', null, ['class' => 'form-control']) !!}
</div>

<!-- Email adress beheerder Form Input -->
<div class="form-group">
	{!! Form::label('beheerder_email', 'Email adres voorzitter:') !!}
	{!! Form::text('beheerder_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Instantie Form Input -->
<div class="form-group">
    {!! Form::label('instantie', 'Instantie van voorzitter:') !!}
    {!! Form::select('instantie', $scanmodels, 'none', ['class' => 'form-control']) !!}
</div>

<!-- Test scan Form Input -->
<div class="form-group">
	{!! Form::label('testscan', 'Is het een test scan?:') !!}
	{!! Form::checkbox('testscan', 1, true, ['class' => 'form-control']) !!}
</div>


<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>