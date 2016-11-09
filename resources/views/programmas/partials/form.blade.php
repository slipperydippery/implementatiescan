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
	{!! Form::text('adress', 'http://www.implementatiescan.nl/pdf/', ['class' => 'form-control']) !!}
</div>


<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>