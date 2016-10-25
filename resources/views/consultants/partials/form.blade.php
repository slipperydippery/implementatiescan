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



<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>