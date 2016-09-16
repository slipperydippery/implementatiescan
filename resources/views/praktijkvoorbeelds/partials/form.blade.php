<!-- Titel Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Titel:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Beschrijving Form Input -->
<div class="form-group">
	{!! Form::label('description', 'Beschrijving:') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Form Input -->
<div class="form-group">
	{!! Form::label('adress', 'Link:') !!}
	{!! Form::text('adress', null, ['class' => 'form-control']) !!}
</div>

<!-- Thema Form Input -->
	<div class="form-group">
		{{ Form::checkbox('bedrijven', true, null) }} bedrijven
	</div>
	<div class="form-group">
		{{ Form::checkbox('scholen', true, null) }} scholen
	</div>
	<div class="form-group">
		{{ Form::checkbox('gemeenten', true, null) }} gemeenten
	</div>
	<div class="form-group">
		{{ Form::checkbox('overig', true, null) }} overig
	</div>

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>