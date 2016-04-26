<!-- Naam Form Input -->
<div class="form-group">
	{!! Form::label('name', 'Naam:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email adress beheerder Form Input -->
<div class="form-group">
	{!! Form::label('beheerder_email', 'Email adress beheerder:') !!}
	{!! Form::text('beheerder_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Intro video Form Input -->
<div class="form-group">
    {!! Form::label('video_id', 'Intro video:') !!}
    {!! Form::select('video_id', $videolist, null, ['class' => 'form-control']) !!}
</div>

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn form-control']) !!}
</div>