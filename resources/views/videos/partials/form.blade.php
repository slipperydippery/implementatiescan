<!-- Video Titel Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Video Titel:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Beschrijving Form Input -->
<div class="form-group">
	{!! Form::label('blurb', 'Beschrijving:') !!}
	{!! Form::text('blurb', null, ['class' => 'form-control']) !!}
</div>

<!-- Video Link Form Input -->
<div class="form-group">
	{!! Form::label('adress', 'Video Link:') !!}
	{!! Form::text('adress', null, ['class' => 'form-control']) !!}
</div>

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn form-control']) !!}
</div>