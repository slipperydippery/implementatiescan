<!-- Naam Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Naam school:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Regio Form Input -->
<div class="form-group">
	{!! Form::label('regio', 'Regio:') !!}
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
	{!! Form::label('beheerder_email', 'Email adress voorzitter:') !!}
	{!! Form::text('beheerder_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Instantie Form Input -->
<div class="form-group">
    {!! Form::label('instantie', 'Instantie van voorzitter:') !!}
    {!! Form::select('instantie', $scanmodels, 'none', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('datepicker', 'Datum scan:') !!}
	<input type="text" id="datepicker">
</div>

<!-- Email Bericht Form Input -->
<div class="form-group">
	{!! Form::label('email_bericht', 'Email Bericht:') !!}
	{!! Form::textarea('email_bericht', 'pim pam pet', ['class' => 'form-control']) !!}
</div>

<!-- Hidden video_id Type Form Input -->
{!! Form::hidden('video_id', '1', null) !!}

<!-- Hidden scanmodel Type Form Input -->
{!! Form::hidden('scanmodel_id', '1', null) !!}

    


<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>