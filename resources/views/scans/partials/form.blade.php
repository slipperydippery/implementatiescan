<!-- Naam Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Naam:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Regio Form Input -->
<div class="form-group">
	{!! Form::label('regio', 'Regio:') !!}
	{!! Form::text('regio', null, ['class' => 'form-control']) !!}
</div>

<!-- Email adress beheerder Form Input -->
<div class="form-group">
	{!! Form::label('beheerder_email', 'Email adress beheerder:') !!}
	{!! Form::text('beheerder_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Instantie Form Input -->
<div class="form-group">
    {!! Form::label('instantie', 'Instantie van beheerder:') !!}
    {!! Form::select('instantie', $scanmodels, 'none', ['class' => 'form-control']) !!}
</div>

<!-- Hidden video_id Type Form Input -->
{!! Form::hidden('video_id', '1', null) !!}

<!-- Hidden scanmodel Type Form Input -->
{!! Form::hidden('scanmodel_id', '1', null) !!}

    


<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>