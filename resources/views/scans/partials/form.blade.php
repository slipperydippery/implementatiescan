<!-- Naam Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Naam:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Email adress beheerder Form Input -->
<div class="form-group">
	{!! Form::label('beheerder_email', 'Email adress beheerder:') !!}
	{!! Form::text('beheerder_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Intro video Form Input -->
<!-- <div class="form-group">
    {!! Form::label('video_id', 'Intro video:') !!}
    {!! Form::select('video_id', $videolist, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Hidden video_id Type Form Input -->
{!! Form::hidden('video_id', '1', null) !!}

<!-- Hidden scanmodel Type Form Input -->
{!! Form::hidden('scanmodel_id', '1', null) !!}

    


<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn form-control']) !!}
</div>